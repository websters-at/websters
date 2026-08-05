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
    <link rel="preload" as="font" href="{{ Vite::asset('resources/fonts/Poppins-Black.woff2') }}" type="font/woff2" crossorigin>

    <!-- Async CSS: preload then swap to stylesheet (removes render-blocking) -->
    <link
        rel="preload"
        as="style"
        href="{{ Vite::asset('resources/css/app.css') }}"
        onload="this.onload=null;this.rel='stylesheet'"
    >
    <noscript>
        <link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}">
    </noscript>

    {{-- GTM, Livewire and cookie-consent are deferred until the first real user interaction
         (pointer/keyboard/touch/scroll). Their JS bundles (gtag ~50KB, livewire ~150KB,
         cookie-consent ~63KB) never parse during the load window, keeping the main thread
         free for first paint. Scripts are cache-warmed right after window load so the first
         interaction costs ~nothing. --}}
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-WREHCH7Q7Y');
        (function () {
            var scripts = [
                {
                    src: {!! json_encode($livewireSrc) !!},
                    attrs: {
                        'data-navigate-once': 'true',
                        'data-csrf': {!! json_encode(csrf_token()) !!},
                        'data-update-uri': {!! json_encode($livewireUpdateUri) !!}
                    },
                    guard: function () { return window.Livewire; }
                },
                {
                    src: {!! json_encode($cookieConsentSrc) !!},
                    attrs: {}
                }
            ];
            var injected = {};
            var events = ['pointerdown', 'pointermove', 'mousemove', 'wheel', 'keydown', 'touchstart', 'scroll', 'click', 'submit', 'visibilitychange'];
            function inject(cfg) {
                if (injected[cfg.src] || (cfg.guard && cfg.guard())) return;
                injected[cfg.src] = true;
                var s = document.createElement('script');
                s.src = cfg.src;
                for (var k in cfg.attrs) s.setAttribute(k, cfg.attrs[k]);
                document.body.appendChild(s);
            }
            function loadAll() {
                scripts.forEach(inject);
            }
            function warm() {
                scripts.forEach(function (cfg) {
                    var l = document.createElement('link');
                    l.rel = 'preload';
                    l.as = 'script';
                    l.href = cfg.src;
                    document.head.appendChild(l);
                });
            }
            window.addEventListener('load', warm, { once: true });
            events.forEach(function (e) { window.addEventListener(e, loadAll, { passive: true }); });
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

