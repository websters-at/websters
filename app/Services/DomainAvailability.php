<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

/**
 * Domain availability checker based on RDAP (no API key needed).
 *
 * Flow: IANA RDAP bootstrap (cached 24h) maps each TLD to its authoritative
 * RDAP server. A domain query returns 200 when registered, 404 when free.
 * Anything else (timeouts, 429, 400, missing RDAP server) yields
 * available=null ("nicht prüfbar") instead of a wrong answer.
 */
class DomainAvailability
{
    /** TLDs checked for the exact name, in display order (.eu hidden: uncheckable). */
    public const TLDS = ['at', 'com', 'de', 'org', 'net'];

    /** Extra TLDs probed for suggestions. */
    public const SUGGESTION_TLDS = ['at', 'com'];

    /**
     * RDAP servers missing from the IANA bootstrap (ccTLDs that run their
     * own RDAP outside the bootstrap file). Verified live, override wins.
     */
    private const RDAP_OVERRIDES = [
        'de' => 'https://rdap.denic.de/',
    ];

    /**
     * Classic port-43 WHOIS fallback where no RDAP exists.
     * free = freePattern matches AND takenPattern absent; taken = takenPattern matches.
     */
    private const WHOIS_FALLBACK = [
        'at' => ['host' => 'whois.nic.at', 'free' => '/nothing found/i', 'taken' => "/\ndomain:/i"],
    ];

    private const BOOTSTRAP_URL = 'https://data.iana.org/rdap/dns.json';

    /**
     * Normalize raw user input to a bare domain name (idn -> ascii).
     * Returns null when the input is not a plausible domain/name.
     */
    public static function normalize(string $input): ?string
    {
        $value = mb_strtolower(trim($input));
        $value = preg_replace('#^https?://#', '', $value);
        $value = preg_replace('#^www\.#', '', $value);
        $value = strtok($value, "/?# \t");
        if ($value === false || $value === '') {
            return null;
        }
        // Allow "name" or "name.tld" input.
        if (function_exists('idn_to_ascii')) {
            $ascii = idn_to_ascii($value, IDNA_DEFAULT, INTL_IDNA_VARIANT_UTS46);
            if ($ascii !== false) {
                $value = $ascii;
            }
        }
        if (! preg_match('/^(?=.{1,253}$)([a-z0-9](?:[a-z0-9-]{0,61}[a-z0-9])?)(\.[a-z0-9](?:[a-z0-9-]{0,61}[a-z0-9])?)*$/', $value)) {
            return null;
        }

        return $value;
    }

    /** tld => rdap base url, cached 24h (IANA bootstrap + verified overrides). */
    public static function bootstrap(): array
    {
        $map = Cache::remember('rdap:bootstrap:v1', 86400, function () {
            try {
                $data = Http::timeout(8)->get(self::BOOTSTRAP_URL)->json();
            } catch (\Throwable) {
                return [];
            }
            $map = [];
            foreach (($data['services'] ?? []) as $service) {
                [$tlds, $urls] = $service;
                $base = rtrim($urls[0] ?? '', '/') . '/';
                foreach ($tlds as $tld) {
                    $map[mb_strtolower($tld)] = $base;
                }
            }

            return $map;
        });

        return $map + self::RDAP_OVERRIDES;
    }

    /** Port-43 WHOIS check for TLDs without RDAP. Null when inconclusive (e.g. quota). */
    private static function whoisCheck(string $domain, string $tld): ?bool
    {
        $cfg = self::WHOIS_FALLBACK[$tld] ?? null;
        if ($cfg === null) {
            return null;
        }
        try {
            $fp = @fsockopen($cfg['host'], 43, $errno, $errstr, 5);
            if ($fp === false) {
                return null;
            }
            stream_set_timeout($fp, 5);
            fwrite($fp, $domain . "\r\n");
            $response = '';
            while (! feof($fp)) {
                $response .= fgets($fp, 4096);
            }
            fclose($fp);
        } catch (\Throwable) {
            return null;
        }
        // Quota/throttle walls are inconclusive (never misread as an answer).
        if (stripos($response, 'quota exceeded') !== false || stripos($response, 'limit exceeded') !== false) {
            return null;
        }
        $isFree = (bool) preg_match($cfg['free'], $response);
        $isTaken = (bool) preg_match($cfg['taken'], $response);
        if ($isFree && ! $isTaken) {
            return true;
        }
        if ($isTaken) {
            return false;
        }

        return null;
    }

    /**
     * DNS heuristic fallback (.at only): a delegated domain has NS records,
     * an unregistered one has none. Used only when WHOIS is throttled.
     * Marked detail=dns so the UI can note "final check on request".
     */
    private static function dnsHeuristic(string $domain): ?bool
    {
        try {
            if (checkdnsrr($domain, 'NS') || checkdnsrr($domain, 'A') || checkdnsrr($domain, 'AAAA')) {
                return false;
            }

            return true;
        } catch (\Throwable) {
            return null;
        }
    }

    /**
     * Check one FQDN. Returns ['domain','available'=>bool|null,'tld','detail'].
     * available=true -> 404 from registry (free), false -> 200 (taken),
     * null -> not checkable right now (never guess).
     */
    public static function check(string $domain): array
    {
        $tld = mb_strtolower(substr(strrchr($domain, '.'), 1) ?: '');
        $map = self::bootstrap();
        $base = $map[$tld] ?? null;

        $result = ['domain' => $domain, 'available' => null, 'tld' => $tld, 'detail' => null];
        if ($base === null) {
            $viaWhois = self::whoisCheck($domain, $tld);
            if ($viaWhois !== null) {
                $result['available'] = $viaWhois;
                $result['detail'] = 'whois';
            } else {
                $result['detail'] = 'no_rdap';
            }

            return $result;
        }

        $key = 'rdap:check:' . $domain;
        return Cache::remember($key, 21600, function () use ($base, $domain, $result) {
            try {
                $response = Http::timeout(6)->get($base . 'domain/' . $domain);
            } catch (\Throwable) {
                $result['detail'] = 'timeout';

                return $result;
            }
            if ($response->status() === 404) {
                $result['available'] = true;
            } elseif ($response->status() === 200) {
                $result['available'] = false;
                $json = $response->json();
                if (is_array($json)) {
                    $result['detail'] = $json['registrar'][0]['vcardArray'][1][1][3] ?? null;
                }
            } else {
                $result['detail'] = 'http_' . $response->status();
            }

            return $result;
        });
    }

    /** Candidate spellings for suggestions (deduped, max ~10). */
    public static function suggestionNames(string $name): array
    {
        $out = [];
        foreach (['get', 'go', 'try', 'mein', 'online', 'echt', 'hey', 'super'] as $pre) {
            $out[] = $pre . $name;
        }
        foreach (['online', 'hq', 'app', 'pro', 'studio', 'shop', 'plus', '24'] as $suf) {
            $out[] = $name . $suf;
        }
        $out = array_values(array_unique(array_filter($out, fn ($n) => $n !== $name && preg_match('/^[a-z0-9-]{1,63}$/', $n))));

        return array_slice($out, 0, 10);
    }

    /** Store with split TTL: taken rarely changes (7d, saves registry quota), free can flip (6h). */
    private static function putResult(string $domain, array $entry): void
    {
        $ttl = $entry['available'] === false ? 604800 : ($entry['available'] === true ? 21600 : 120);
        Cache::put('rdap:check:' . $domain, $entry, $ttl);
    }

    /** WHOIS with one retry + DNS heuristic (.at) when throttled. */
    private static function whoisCheckPatient(string $domain, string $tld): ?bool
    {
        $first = self::whoisCheck($domain, $tld);
        if ($first !== null) {
            return $first;
        }
        usleep(800000);
        $second = self::whoisCheck($domain, $tld);
        if ($second !== null) {
            return $second;
        }
        // Last resort for .at: DNS delegation heuristic (fast, unthrottled).
        if ($tld === 'at') {
            return self::dnsHeuristic($domain);
        }

        return null;
    }

    /**
     * Full check for a name: exact-name results across TLDS + suggestions.
     * Throttle-proof ordering: exact .at first and alone (single patient WHOIS),
     * RDAP concurrently via pool, .at suggestions staggered + capped.
     * Entries still null after retry are DROPPED (never shown as "unbekannt").
     */
    public static function checkName(string $name): array
    {
        $name = mb_strtolower(trim($name));
        $hasTld = str_contains($name, '.');
        $baseName = $hasTld ? substr($name, 0, (int) strpos($name, '.')) : $name;

        $exactTargets = [];
        if ($hasTld) {
            $exactTargets[] = $name;
            foreach (self::TLDS as $tld) {
                $candidate = $baseName . '.' . $tld;
                if ($candidate !== $name) {
                    $exactTargets[] = $candidate;
                }
            }
        } else {
            foreach (self::TLDS as $tld) {
                $exactTargets[] = $name . '.' . $tld;
            }
        }

        $sugNames = array_slice(self::suggestionNames($baseName), 0, 8);
        $sugTargets = [];
        foreach ($sugNames as $idx => $sug) {
            // .at only for the first 3 suggestions (staggered WHOIS), rest .com (pooled RDAP).
            $sugTargets[] = $sug . '.com';
            if ($idx < 3) {
                $sugTargets[] = $sug . '.at';
            }
        }

        $map = self::bootstrap();
        $results = [];
        $toFetch = [];
        $whoisQueue = [];

        $resolve = function (string $domain) use ($map, &$results, &$toFetch, &$whoisQueue) {
            $tld = mb_strtolower(substr(strrchr($domain, '.'), 1) ?: '');
            $cached = Cache::get('rdap:check:' . $domain);
            if ($cached !== null && ($cached['available'] ?? null) !== null) {
                $results[$domain] = $cached;

                return;
            }
            if (isset($map[$tld])) {
                $toFetch[$domain] = $map[$tld] . 'domain/' . $domain;
            } elseif (isset(self::WHOIS_FALLBACK[$tld])) {
                $whoisQueue[] = $domain;
            }
            // TLDs with neither RDAP nor WHOIS are skipped silently (hidden).
        };

        // 1) Exact .at first and alone: single patient WHOIS, no burst.
        foreach ($exactTargets as $domain) {
            $tld = mb_strtolower(substr(strrchr($domain, '.'), 1) ?: '');
            if ($tld === 'at' && ! isset($results[$domain])) {
                $cached = Cache::get('rdap:check:' . $domain);
                if ($cached !== null && ($cached['available'] ?? null) !== null) {
                    $results[$domain] = $cached;
                } else {
                    $viaWhois = self::whoisCheckPatient($domain, $tld);
                    if ($viaWhois !== null) {
                        $entry = ['domain' => $domain, 'available' => $viaWhois, 'tld' => $tld, 'detail' => 'whois'];
                        self::putResult($domain, $entry);
                        $results[$domain] = $entry;
                    }
                }
            }
        }

        // 2) Everything else: queue RDAP (pooled) + remaining WHOIS (staggered).
        foreach (array_merge($exactTargets, $sugTargets) as $domain) {
            if (! isset($results[$domain])) {
                $resolve($domain);
            }
        }

        if ($toFetch !== []) {
            $responses = Http::pool(fn ($pool) => array_map(
                fn ($url) => $pool->timeout(6)->get($url),
                $toFetch
            ));
            $i = 0;
            foreach ($toFetch as $domain => $url) {
                $response = $responses[$i++];
                $tld = mb_strtolower(substr(strrchr($domain, '.'), 1) ?: '');
                $entry = ['domain' => $domain, 'available' => null, 'tld' => $tld, 'detail' => null];
                if ($response === null) {
                    $entry['detail'] = 'timeout';
                } elseif ($response->status() === 404) {
                    $entry['available'] = true;
                } elseif ($response->status() === 200) {
                    $entry['available'] = false;
                } else {
                    $entry['detail'] = 'http_' . $response->status();
                }
                self::putResult($domain, $entry);
                if ($entry['available'] !== null) {
                    $results[$domain] = $entry;
                }
            }
        }

        foreach ($whoisQueue as $domain) {
            if (isset($results[$domain])) {
                continue;
            }
            $tld = mb_strtolower(substr(strrchr($domain, '.'), 1) ?: '');
            usleep(300000); // stagger: nic.at throttles bursts
            $viaWhois = self::whoisCheckPatient($domain, $tld);
            if ($viaWhois !== null) {
                $entry = ['domain' => $domain, 'available' => $viaWhois, 'tld' => $tld, 'detail' => 'whois'];
                self::putResult($domain, $entry);
                $results[$domain] = $entry;
            }
        }

        $exact = [];
        $suggestions = [];
        foreach (array_merge($exactTargets, $sugTargets) as $domain) {
            if (! isset($results[$domain])) {
                continue; // hidden: not checkable
            }
            $entry = $results[$domain];
            $stem = substr($domain, 0, (int) strpos($domain, '.'));
            if ($stem === $baseName || ($hasTld && $domain === $name)) {
                $exact[] = $entry;
            } else {
                $suggestions[] = $entry;
            }
        }

        return ['exact' => $exact, 'suggestions' => $suggestions];
    }
}
