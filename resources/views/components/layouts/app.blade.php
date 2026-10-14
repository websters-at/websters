<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="websters">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    {!! SEO::generate() !!}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Globale Structured Data: Organisation + Website. Gilt für alle Seiten,
         versorgt Google Rich Snippets UND KI-Suchen (Perplexity, ChatGPT,
         Gemini) mit zitierfähigen Fakten: Wer, Wo, Was, Wie erreichbar. --}}
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@graph": [
            {
                "@@type": "Organization",
                "@@id": "https://websters.at/#organization",
                "name": "Websters",
                "url": "https://websters.at",
                "logo": "https://websters.at/assets/websters-full-logo.png",
                "description": "Websters aus Engerwitzdorf (Oberösterreich): Webdesign ab 990€, individuelle Softwareentwicklung ab 3.490€ und IT-Consulting für Unternehmen und Startups in Österreich und Deutschland.",
                "email": "office@websters.at",
                "telephone": "+43 677 63177763",
                "address": {
                    "@@type": "PostalAddress",
                    "streetAddress": "Libellenweg 13",
                    "addressLocality": "Engerwitzdorf",
                    "postalCode": "4209",
                    "addressRegion": "Oberösterreich",
                    "addressCountry": "AT"
                },
                "areaServed": [
                    {"@@type": "Country", "name": "Österreich"},
                    {"@@type": "Country", "name": "Deutschland"}
                ],
                "knowsAbout": ["Webdesign", "Webentwicklung", "Individualsoftware", "Custom Software", "IT-Consulting", "WordPress", "Laravel", "Suchmaschinenoptimierung", "Digitalisierung"],
                "sameAs": [
                    "https://github.com/websters-at",
                    "https://www.instagram.com/websters.at/",
                    "https://www.facebook.com/profile.php?id=61569509807621"
                ],
                "contactPoint": {
                    "@@type": "ContactPoint",
                    "telephone": "+43 677 63177763",
                    "email": "office@websters.at",
                    "contactType": "sales",
                    "areaServed": ["AT", "DE"],
                    "availableLanguage": ["de", "en"]
                }
            },
            {
                "@@type": "WebSite",
                "@@id": "https://websters.at/#website",
                "url": "https://websters.at",
                "name": "Websters",
                "inLanguage": "de-AT",
                "publisher": {"@@id": "https://websters.at/#organization"}
            }
        ]
    }
    </script>

    <link rel="apple-touch-icon" href="{{ asset('assets/apple-touch.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/favicon.png') }}">

    @php
        // Mark Livewire's script tag as "rendered" so Livewire doesn't auto-inject it
        // at DOMContentLoaded; it is injected on first user interaction instead (see below).
        \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(['navigate' => true]);
        $livewireManifest = json_decode(file_get_contents(base_path('vendor/livewire/livewire/dist/manifest.json')), true);
        $livewireSrc = url(app(\Livewire\Mechanisms\FrontendAssets\FrontendAssets::class)->javaScriptRoute->uri) . '?id=' . ($livewireManifest['/livewire.js'] ?? '');
        $livewireUpdateUri = app('livewire')->getUpdateUri();
        $cookieConsentSrc = route('cookieconsent.script') . '?id=' . md5((string) @filemtime(base_path('vendor/whitecube/laravel-cookie-consent/dist/script.js')));
    @endphp

    <!-- Preload LCP image (team.png) - only on home page -->
    @stack('head-preloads')

    <!-- Preload critical fonts (Poppins Fallback is metric-matched, so swaps don't shift layout) -->
    <link rel="preload" as="font" href="{{ Vite::asset('resources/fonts/Roboto-Variable.woff2') }}" type="font/woff2" crossorigin fetchpriority="high">
    <link rel="preload" as="font" href="{{ Vite::asset('resources/fonts/Poppins-Regular.woff2') }}" type="font/woff2" crossorigin>
    <link rel="preload" as="font" href="{{ Vite::asset('resources/fonts/Poppins-Medium.woff2') }}" type="font/woff2" crossorigin>
    <link rel="preload" as="font" href="{{ Vite::asset('resources/fonts/Poppins-SemiBold.woff2') }}" type="font/woff2" crossorigin>
    <link rel="preload" as="font" href="{{ Vite::asset('resources/fonts/Poppins-Bold.woff2') }}" type="font/woff2" crossorigin>
    <link rel="preload" as="font" href="{{ Vite::asset('resources/fonts/Poppins-ExtraBold.woff2') }}" type="font/woff2" crossorigin>

    <script>if (typeof CSSPropertyRule === 'undefined') { document.documentElement.classList.add('no-at-property'); }</script>
    <!-- Render-blocking CSS: guarantees the first paint uses the styled layout.
         Async (preload+onload) CSS caused a flaky CLS ~1.0 when the stylesheet
         landed after first paint (page collapsed from unstyled 19078px to 5404px).
         Tailwind's own preflight (in @layer base) provides the reset; utilities
         must stay in higher-priority layers, so no inline unlayered reset here. -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}">

    {{-- Cookie consent library: real <script defer> in the head so
         window.LaravelCookieConsent is guaranteed to exist before the banner's
         inline script attaches its submit handlers (which call it at click time).
         URL carries a content-hash ?id= cache-buster, so it's cacheable forever. --}}
    <script src="{{ $cookieConsentSrc }}" defer></script>

    {{-- Livewire loads eagerly but deferred (non-blocking for first paint): its
         bundled Alpine must be the ONLY Alpine instance on the page. app.js
         reuses window.Alpine for its collapse/intersect plugins and never calls
         Alpine.start() itself — Livewire.start() owns startup. (Loading Livewire
         lazily on first interaction created a second Alpine instance instead:
         Livewire overwrote window.Alpine, warned, and never booted any component,
         silently breaking every $wire form with zero console errors.) --}}
    <script src="{{ $livewireSrc }}" data-navigate-once="true" data-csrf="{{ csrf_token() }}" data-update-uri="{{ $livewireUpdateUri }}" defer></script>

    @vite(['resources/js/app.js'])
{{-- Privacy-friendly analytics (self-hosted Umami, cookieless) proxied via
     same-origin /stats so strict corporate firewalls that block third-party
     tracking subdomains still load the page identically. data-host-url pins
     the beacon endpoint to the same proxy path. --}}
<script defer src="/stats/script.js" data-website-id="49c74336-0f48-46b5-82d7-16d4f34e625a" data-host-url="https://websters.at/stats"></script>
</head>

<body class="flex flex-col min-h-screen">

<livewire:components.nav/>


<main class="flex-1">
    {{ $slot }}
</main>

<livewire:components.footer/>

{{--  TOAST area --}}
<x-toast/>

@cookieconsentview

</body>
</html>

