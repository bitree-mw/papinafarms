<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', config('app.name'))</title>
        <meta name="description" content="Papina Farms connects Malawian farmer groups and cooperatives with production support, agricultural markets and value addition.">
        <meta name="theme-color" content="#075c38">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/papina-favicon.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/papina-apple-touch-icon.png') }}">
        <link rel="preload" href="{{ asset('fonts/inter-0.woff2') }}" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="{{ asset('fonts/jakarta-0.woff2') }}" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="{{ asset('fonts/symbols-0.woff2') }}" as="font" type="font/woff2" crossorigin>
        @if (request()->routeIs('website.home'))
            <link rel="preload" href="{{ asset('images/malawi-landscape.webp') }}" as="image" fetchpriority="high">
        @endif
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-surface font-body-md text-on-surface antialiased">
        <a href="#main-content" class="skip-link">Skip to content</a>
        @include('partials.header')
        <main id="main-content" tabindex="-1" class="w-full pt-20 bg-surface min-h-[calc(100dvh-80px)]">
            @yield('content')
        </main>
        @include('partials.footer')
    </body>
</html>
