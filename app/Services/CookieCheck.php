<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

/**
 * DSGVO Cookie/Tracker self-check: fetches a public URL (SSRF-hardened via
 * SeoCheck::normalizeUrl) and lists third-party hosts + known trackers.
 * No legal verdict — a factual inventory with plain-language guidance.
 */
class CookieCheck
{
    private const TRACKERS = [
        'google-analytics.com' => 'Google Analytics',
        'googletagmanager.com' => 'Google Tag Manager',
        'doubleclick.net' => 'Google/DoubleClick Werbung',
        'facebook.net' => 'Meta/Facebook Pixel',
        'connect.facebook.net' => 'Meta/Facebook Pixel',
        'hotjar.com' => 'Hotjar',
        'clarity.ms' => 'Microsoft Clarity',
        'matomo.cloud' => 'Matomo Cloud',
        'stripe.com' => 'Stripe (Zahlung)',
        'paypal.com' => 'PayPal',
        'youtube.com' => 'YouTube-Einbettung',
        'youtu.be' => 'YouTube-Einbettung',
        'vimeo.com' => 'Vimeo-Einbettung',
        'maps.google' => 'Google Maps',
        'google.com/maps' => 'Google Maps',
        'cal.com' => 'Cal.com Booking',
        'app.cal.com' => 'Cal.com Booking',
        'intercom.io' => 'Intercom Chat',
        'hubspot.com' => 'HubSpot',
        'linkedin.com' => 'LinkedIn Insight',
        'tiktok.com' => 'TikTok Pixel',
        'snapchat.com' => 'Snapchat Pixel',
        'pinterest.com' => 'Pinterest Tag',
    ];

    public static function analyze(string $url): array
    {
        try {
            $response = Http::timeout(12)->withHeaders(['User-Agent' => 'WebstersCookieCheck/1.0'])->get($url);
        } catch (\Throwable) {
            return ['ok' => false, 'error' => 'Seite nicht erreichbar (Timeout oder Verbindungsfehler).'];
        }
        if ($response->status() >= 400) {
            return ['ok' => false, 'error' => 'Seite antwortet mit HTTP ' . $response->status() . '.'];
        }
        $host = mb_strtolower((string) parse_url($url, PHP_URL_HOST));
        $html = substr($response->body(), 0, 1500000);

        // Nur Ressourcen, die der Browser automatisch nachlädt (keine reinen
        // Text-Links wie Social-Profile – die übertragen nichts von selbst).
        preg_match_all('/(?:src|data-src|action|poster|srcset)=["\'](https?:\/\/[^"\']+)/i', $html, $m);
        $srcHosts = [];
        $gatedHosts = [];
        foreach (($m[1] ?? []) as $link) {
            // srcset kann mehrere URLs enthalten – erste reicht.
            $link = trim(explode(',', $link)[0]);
            $h = mb_strtolower((string) parse_url($link, PHP_URL_HOST));
            if ($h === '' || $h === $host || str_ends_with($h, '.' . $host)) {
                continue;
            }
            if (in_array($h, ['www.w3.org', 'schema.org'], true)) {
                continue;
            }
            // data-src (+ Consent-Box im HTML) = 2-Klick-Lösung: lädt erst nach Einwilligung.
            $full = 'src="' . $link . '"';
            if (str_contains($html, 'data-src="' . $link . '"') && ! str_contains($html, $full)) {
                $gatedHosts[$h] = true;
            }
            $srcHosts[$h] = ($srcHosts[$h] ?? 0) + 1;
        }
        // Stylesheets ebenfalls (Fonts!): link rel=stylesheet|preload|icon.
        preg_match_all('/<link[^>]+rel=["\'](?:stylesheet|preload|preconnect|dns-prefetch|icon|apple-touch-icon)[^>]*>/i', $html, $lm);
        foreach ($lm[0] as $tag) {
            if (preg_match('/href=["\'](https?:\/\/[^"\']+)["\']/i', $tag, $hm)) {
                $h = mb_strtolower((string) parse_url($hm[1], PHP_URL_HOST));
                if ($h !== '' && $h !== $host && ! str_ends_with($h, '.' . $host)) {
                    $srcHosts[$h] = ($srcHosts[$h] ?? 0) + 1;
                }
            }
        }
        arsort($srcHosts);
        $third = $srcHosts;

        $cookies = [];
        foreach ($response->headers()['Set-Cookie'] ?? [] as $setCookie) {
            $parts = explode(';', (string) $setCookie);
            $cookies[] = trim($parts[0]);
        }

        $found = [];
        $haystack = mb_strtolower($html . ' ' . implode(' ', array_keys($third)));
        foreach (self::TRACKERS as $needle => $label) {
            if (str_contains($haystack, $needle)) {
                $found[$label] = true;
            }
        }

        // Tracker, die nur hinter Consent-Gating vorkommen (data-src/Platzhalter),
        // sind technisch sauber gelöst – sie zählen nicht als Verstoß.
        $gatedLabels = [];
        $gatedByHost = [
            'app.cal.com' => 'Cal.com Booking',
            'www.google.com' => 'Google Maps',
        ];
        foreach ($gatedByHost as $gatedHost => $label) {
            if (isset($found[$label]) && isset($gatedHosts[$gatedHost])) {
                $gatedLabels[$label] = true;
            }
        }
        $ungatedTrackers = array_values(array_filter(array_keys($found), fn ($l) => ! isset($gatedLabels[$l])));
        $hasConsentUi = str_contains($html, 'consent-box') || str_contains($html, 'consent-btn');

        if (count($ungatedTrackers) > 0) {
            $level = 'red';
        } elseif (count($gatedLabels) > 0 || (count($third) > 0 && $hasConsentUi)) {
            $level = 'yellow';
        } elseif (count($third) > 0) {
            $level = 'yellow';
        } else {
            $level = 'green';
        }

        return [
            'ok' => true, 'url' => $url, 'level' => $level,
            'third' => array_slice($third, 0, 20, true),
            'thirdCount' => count($third),
            'trackers' => $ungatedTrackers,
            'gated' => array_keys($gatedLabels),
            'cookies' => array_slice(array_values(array_unique($cookies)), 0, 20),
        ];
    }
}
