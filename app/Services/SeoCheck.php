<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

/**
 * Lightweight on-page SEO self-check for any public URL.
 * SSRF-hardened: http(s) only, no private/loopback/link-local targets,
 * short timeouts, capped body size.
 */
class SeoCheck
{
    public static function normalizeUrl(string $input): ?string
    {
        $value = trim($input);
        if ($value === '') {
            return null;
        }
        if (! preg_match('#^https?://#i', $value)) {
            $value = 'https://' . $value;
        }
        $parts = parse_url($value);
        if ($parts === false || empty($parts['host'])) {
            return null;
        }
        $host = mb_strtolower($parts['host']);
        // Block non-public targets (SSRF).
        if ($host === 'localhost' || str_ends_with($host, '.localhost') || str_ends_with($host, '.local') || str_ends_with($host, '.internal')) {
            return null;
        }
        $ips = array_filter([gethostbyname($host)]);
        foreach ($ips as $ip) {
            if (! filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                return null;
            }
        }

        return 'https://' . $host . ($parts['path'] ?? '/') . (isset($parts['query']) ? '?' . $parts['query'] : '');
    }

    public static function analyze(string $url): array
    {
        $started = microtime(true);
        try {
            $response = Http::timeout(12)->withHeaders(['User-Agent' => 'WebstersSEOCheck/1.0'])->get($url);
        } catch (\Throwable) {
            return ['ok' => false, 'error' => 'Seite nicht erreichbar (Timeout oder Verbindungsfehler).'];
        }
        $ms = (int) round((microtime(true) - $started) * 1000);
        if ($response->status() >= 400) {
            return ['ok' => false, 'error' => 'Seite antwortet mit HTTP ' . $response->status() . '.'];
        }
        $html = substr($response->body(), 0, 1500000);
        $head = str_contains($html, '</head>') ? substr($html, 0, (int) strpos($html, '</head>')) : substr($html, 0, 60000);

        $get = fn ($pattern, $subject) => preg_match($pattern, $subject, $m) ? html_entity_decode(trim($m[1]), ENT_QUOTES, 'UTF-8') : null;
        $title = $get('/<title[^>]*>(.*?)<\/title>/is', $head);
        $desc = $get('/<meta[^>]+name=["\']description["\'][^>]+content=["\']([^"\']*)["\']/i', $head)
            ?? $get('/<meta[^>]+content=["\']([^"\']*)["\'][^>]+name=["\']description["\']/i', $head);
        $canon = $get('/<link[^>]+rel=["\']canonical["\'][^>]+href=["\']([^"\']*)["\']/i', $head);
        $h1count = preg_match_all('/<h1[\s>]/i', $html);
        $imgTotal = preg_match_all('/<img[\s>]/i', $html);
        $imgAlt = preg_match_all('/<img(?=[^>]*\salt=)[^>]*>/i', $html);
        $hasOg = (bool) preg_match('/<meta[^>]+property=["\']og:/i', $head);
        $hasLd = str_contains($html, 'application/ld+json');
        $sizeKb = (int) round(strlen($response->body()) / 1024);

        $checks = [];
        $pass = fn ($label, $ok, $hint) => ['label' => $label, 'ok' => $ok, 'hint' => $hint];
        $checks[] = $pass('HTTPS', str_starts_with($url, 'https://'), 'Verschlüsselte Verbindung aktiv.');
        $checks[] = $pass('Title vorhanden', $title !== null && $title !== '', $title ? '„' . mb_substr($title, 0, 70) . '" (' . mb_strlen($title) . ' Zeichen, ideal 50–60).' : 'Kein <title> gefunden – kritisch für Google.');
        $checks[] = $pass('Title-Länge ok', $title !== null && mb_strlen($title) >= 30 && mb_strlen($title) <= 65, 'Google kürzt längere Titel in den Ergebnissen.');
        $checks[] = $pass('Meta-Description', $desc !== null && $desc !== '', $desc ? mb_strlen($desc) . ' Zeichen (ideal 120–155).' : 'Fehlt – Google erfindet dann selbst eine Vorschau.');
        $checks[] = $pass('Genau eine H1', $h1count === 1, $h1count . ' H1 gefunden (ideal: genau eine mit Keyword).');
        $checks[] = $pass('Bilder mit Alt-Text', $imgTotal === 0 || $imgAlt >= $imgTotal, $imgTotal . ' Bilder, ' . ($imgTotal - $imgAlt) . ' ohne Alt-Text.');
        $checks[] = $pass('Canonical gesetzt', $canon !== null, $canon ? 'Zeigt auf ' . mb_substr($canon, 0, 60) : 'Fehlt – Duplicate-Content-Risiko.');
        $checks[] = $pass('Open Graph (Social)', $hasOg, $hasOg ? 'Vorschaubilder für WhatsApp & Co. vorhanden.' : 'Fehlt – hässliche Link-Vorschau beim Teilen.');
        $checks[] = $pass('Strukturierte Daten', $hasLd, $hasLd ? 'JSON-LD gefunden – gut für Rich Snippets & KI.' : 'Fehlt – verschenktes Potenzial.');
        $checks[] = $pass('Antwortzeit ok', $ms < 1500, $ms . ' ms bis zur Antwort (Ziel < 1,5 s).');
        $checks[] = $pass('Seitengröße ok', $sizeKb < 1500, $sizeKb . ' KB HTML (Ziel < 1,5 MB).');

        $score = (int) round(100 * count(array_filter($checks, fn ($c) => $c['ok'])) / count($checks));

        return ['ok' => true, 'score' => $score, 'checks' => $checks, 'url' => $url, 'ms' => $ms];
    }
}
