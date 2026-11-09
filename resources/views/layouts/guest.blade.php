@props(['maxWidth' => 'sm:max-w-md'])

@php
    $isLogin = request()->routeIs('login');
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
    <body class="font-sans antialiased {{ $isLogin ? 'bg-[#0b1d4d] text-slate-100 selection:bg-cyan-400 selection:text-slate-950' : 'bg-gray-100 text-gray-900 selection:bg-indigo-500 selection:text-white' }}">
        <div class="min-h-screen flex flex-col justify-center items-center px-4 sm:px-6 md:px-8 py-6 sm:py-10 md:py-12">
            <div class="flex justify-center mb-4 sm:mb-6">
                <a href="/" class="transition hover:scale-105 transform duration-300">
                    <x-application-logo class="w-16 h-16 sm:w-20 sm:h-20 fill-current {{ $isLogin ? 'text-cyan-300 drop-shadow-[0_0_20px_rgba(56,189,248,0.7)]' : 'text-indigo-600' }}" />
                </a>
            </div>

            <div class="w-full {{ $isLogin ? 'max-w-6xl' : $maxWidth }} mx-auto {{ $isLogin ? 'p-0 bg-[#0f286b] border-2 border-sky-400/60 shadow-2xl shadow-sky-500/20 rounded-3xl overflow-hidden' : 'px-5 sm:px-8 md:px-12 py-6 sm:py-10 md:py-12 bg-white shadow-xl overflow-hidden rounded-2xl border border-gray-100 my-4 md:my-8 lg:my-10' }}">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
