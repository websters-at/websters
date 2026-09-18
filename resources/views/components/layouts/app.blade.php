<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="websters">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    {!! SEO::generate() !!}
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-WREHCH7Q7Y');
    </script>

    @vite(['resources/js/app.js'])
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

