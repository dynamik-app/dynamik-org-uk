<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @php
            $appName = config('app.name', 'DYNAMIK');
            $pageTitle = $title ?? null;

            if (! $pageTitle && isset($header)) {
                $pageTitle = strip_tags((string) $header);
            }

            $fullTitle = $pageTitle ? $pageTitle . ' | ' . $appName : $appName . ' - The Power to Connect';
        @endphp

        <title>{{ $fullTitle }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-gray-950 text-gray-100">
        <x-banner />

        <div class="min-h-screen flex flex-col bg-gradient-to-br from-gray-950 via-gray-900 to-gray-950">
            @include('layouts.partials.header')

            @if (isset($header))
                <header class="relative isolate overflow-hidden py-10 sm:py-14">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(79,70,229,0.15),_transparent_45%)]"></div>
                    <div class="relative max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
                        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-300">{{ $appName }}</p>
                        <h1 class="text-3xl sm:text-4xl font-bold text-white">{{ $header }}</h1>
                        <p class="text-base text-gray-300">Access your Dynamik account with the same look and feel as the rest of the site.</p>
                    </div>
                </header>
            @endif

            <main class="flex-1 flex items-center justify-center px-4 pb-12 sm:px-6 lg:px-8">
                {{ $slot }}
            </main>
        </div>

        @include('layouts.partials.footer')

        @livewireScripts
    </body>
</html>
