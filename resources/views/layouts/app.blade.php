@php
    $isDarkTheme = request()->routeIs('student.dashboard', 'teacher.dashboard', 'admin.dashboard') || (auth()->check() && (auth()->user()->isStudent() || auth()->user()->isTeacher() || auth()->user()->isAdmin()) && request()->routeIs('dashboard', 'admin.dashboard'));
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen {{ $isDarkTheme ? 'bg-[#071330]' : 'bg-gray-100' }}">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="{{ $isDarkTheme ? 'bg-[#081538] border-b-2 border-orange-500/40 shadow-xl' : 'bg-white shadow' }}">
                    <div class="max-w-7xl mx-auto {{ $isDarkTheme ? 'p-0' : 'py-6 px-4 sm:px-6 lg:px-8' }}">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
