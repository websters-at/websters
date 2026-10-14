<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="websters">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    {!! SEO::generate() !!}
    {{-- 404 must never be indexed (crawl budget, soft-404 risk) --}}
    <meta name="robots" content="noindex, follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" href="{{ asset('assets/apple-touch.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/favicon.png') }}">

    <!-- No third-party origins on error pages: everything is same-origin so
         strict corporate firewalls render the 404 exactly like everywhere else. -->
    <script>if (typeof CSSPropertyRule === 'undefined') { document.documentElement.classList.add('no-at-property'); }</script>
    {{-- Cookieless analytics via the same-origin /stats proxy (see app layout). --}}
    <script defer src="/stats/script.js" data-website-id="49c74336-0f48-46b5-82d7-16d4f34e625a" data-host-url="https://websters.at/stats"></script>

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

