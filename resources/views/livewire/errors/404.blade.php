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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>

    <!-- GTM - defer to avoid blocking -->
    <script>if (typeof CSSPropertyRule === 'undefined') { document.documentElement.classList.add('no-at-property'); }</script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-WREHCH7Q7Y');
    </script>
    <script defer src="https://www.googletagmanager.com/gtag/js?id=G-WREHCH7Q7Y"></script>

    @cookieconsentscripts

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col min-h-screen">

<livewire:components.nav/>


<main class="flex-1">
    <livewire:errors.volt-error-page/>
</main>

<livewire:components.footer/>
@livewireScripts(['navigate' => true])
{{--  TOAST area --}}
<x-toast/>

@cookieconsentview

</body>
</html>

