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

    <script>window.deferLoadingAlpine = true;</script>
    <!-- Render-blocking CSS: guarantees the first paint uses the styled layout.
         Async (preload+onload) CSS caused a flaky CLS ~1.0 when the stylesheet
         landed after first paint (page collapsed from unstyled 19078px to 5404px).
         Tailwind's own preflight (in @layer base) provides the reset; utilities
         must stay in higher-priority layers, so no inline unlayered reset here. -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}">

    <script>
      // Cookie consent: load immediately (not deferred until click) – the banner's
      // inline script calls `window.LaravelCookieConsent` at click time.
      (function() {
        var s = document.createElement('script');
        s.src = {{ json_encode($cookieConsentSrc) }};
        s.defer = true;
        document.head.appendChild(s);
      })();
    </script>

    {{-- GTM and Livewire are deferred until the first real user interaction
         (pointer/keyboard/touch/scroll). Their JS bundles (gtag ~50KB, livewire ~150KB)
         never parse during the load window, keeping the main thread free for first paint. --}}
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-WREHCH7Q7Y');
        (function () {
            var livewireCfg = {
                src: {!! json_encode($livewireSrc) !!},
                attrs: {
                    'data-navigate-once': 'true',
                    'data-csrf': {!! json_encode(csrf_token()) !!},
                    'data-update-uri': {!! json_encode($livewireUpdateUri) !!}
                },
                guard: function () { return window.Livewire; }
            };
            var injected = false;
            var events = ['pointerdown', 'pointermove', 'mousemove', 'wheel', 'keydown', 'touchstart', 'scroll', 'click', 'submit'];
            function inject() {
                if (injected || livewireCfg.guard()) return;
                injected = true;
                var s = document.createElement('script');
                s.src = livewireCfg.src;
                for (var k in livewireCfg.attrs) s.setAttribute(k, livewireCfg.attrs[k]);
                document.body.appendChild(s);
            }
            events.forEach(function (e) { window.addEventListener(e, inject, { passive: true }); });
        })();
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

