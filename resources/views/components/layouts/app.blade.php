<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="websters">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    {!! SEO::generate() !!}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" href="{{ asset('assets/apple-touch.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/favicon.png') }}">

    <!-- Preconnect to critical origins -->
    <link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>

    <!-- Preload critical fonts (LCP text uses Poppins Black + body Regular) -->
    <link rel="preload" as="font" href="{{ Vite::asset('resources/fonts/Poppins-Regular.woff2') }}" type="font/woff2" crossorigin>
    <link rel="preload" as="font" href="{{ Vite::asset('resources/fonts/Poppins-Black.woff2') }}" type="font/woff2" crossorigin>
    <link rel="preload" as="font" href="{{ Vite::asset('resources/fonts/Poppins-Bold.woff2') }}" type="font/woff2" crossorigin>

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

    <!-- GTM - lazy loaded after page load to keep critical path clear -->
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-WREHCH7Q7Y');
        (function() {
            var s = document.createElement('script');
            s.async = true;
            s.src = 'https://www.googletagmanager.com/gtag/js?id=G-WREHCH7Q7Y';
            if (window.requestIdleCallback) {
                window.requestIdleCallback(function(){ document.head.appendChild(s); }, { timeout: 3000 });
            } else {
                window.addEventListener('load', function(){ document.head.appendChild(s); });
            }
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

