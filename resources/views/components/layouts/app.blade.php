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
        $livewireManifest = json_decode(file_get_contents(base_path('vendor/livewire/livewire/dist/manifest.json')), true);
        $livewireHash = $livewireManifest['/livewire.js'] ?? '';
    @endphp

    <!-- Preload critical fonts (LCP text uses Poppins Black + body Regular) -->
    <link rel="preload" as="font" href="{{ Vite::asset('resources/fonts/Poppins-Regular.woff2') }}" type="font/woff2" crossorigin>
    <link rel="preload" as="font" href="{{ Vite::asset('resources/fonts/Poppins-Black.woff2') }}" type="font/woff2" crossorigin>

    <!-- Preload Livewire core (downloads early, executes right after HTML parse, off the TBT window) -->
    <link rel="preload" as="script" href="/livewire/livewire.min.js?id={{ $livewireHash }}">

    <!-- Preload LCP image (team.png) - only on home page -->
    @stack('head-preloads')

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

    <!-- GTM - deferred until first user interaction to keep the main thread clear during load -->
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-WREHCH7Q7Y');
        (function() {
            var events = ['scroll', 'pointerdown', 'keydown', 'touchstart', 'visibilitychange'];
            var load = function() {
                if (window.__gtmLoaded) return;
                window.__gtmLoaded = true;
                events.forEach(function(e) { window.removeEventListener(e, load); });
                var s = document.createElement('script');
                s.async = true;
                s.src = 'https://www.googletagmanager.com/gtag/js?id=G-WREHCH7Q7Y';
                document.head.appendChild(s);
            };
            events.forEach(function(e) { window.addEventListener(e, load, { passive: true }); });
        })();
    </script>

    @cookieconsentscripts

    @vite(['resources/js/app.js'])
</head>

<body class="flex flex-col min-h-screen">

<livewire:components.nav/>


<main class="flex-1">
    {{ $slot }}
</main>

<livewire:components.footer/>
@livewireScripts(['navigate' => true])
{{--  TOAST area --}}
<x-toast/>

@cookieconsentview

</body>
</html>

