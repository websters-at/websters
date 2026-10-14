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

        preg_match_all('/(?:src|href|action|data-src)=["\'](https?:\/\/[^"\']+)["\']/i', $html, $m);
        $third = [];
        foreach (($m[1] ?? []) as $link) {
            $h = mb_strtolower((string) parse_url($link, PHP_URL_HOST));
            if ($h === '' || $h === $host || str_ends_with($h, '.' . $host)) {
                continue;
            }
            // Ignore schema/CDN noise that carries no tracking.
            if (in_array($h, ['www.w3.org', 'schema.org'], true)) {
                continue;
            }
            $third[$h] = ($third[$h] ?? 0) + 1;
        }
        arsort($third);

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

        $level = count($found) > 0 ? 'red' : (count($third) > 0 ? 'yellow' : 'green');

        return [
            'ok' => true, 'url' => $url, 'level' => $level,
            'third' => array_slice($third, 0, 20, true),
            'thirdCount' => count($third),
            'trackers' => array_keys($found),
            'cookies' => array_slice(array_values(array_unique($cookies)), 0, 20),
        ];
    }
}
