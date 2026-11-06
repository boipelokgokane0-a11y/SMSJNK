@props(['maxWidth' => 'sm:max-w-md'])

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
    <body class="font-sans text-gray-900 antialiased bg-gray-100 selection:bg-indigo-500 selection:text-white">
        <div class="min-h-screen flex flex-col justify-center items-center px-4 sm:px-6 md:px-8 py-8 sm:py-12 md:py-16 lg:py-20">
            <div class="flex justify-center mb-4 sm:mb-6">
                <a href="/" class="transition hover:opacity-80">
                    <x-application-logo class="w-16 h-16 sm:w-20 sm:h-20 fill-current text-indigo-600" />
                </a>
            </div>

            <div class="w-full {{ $maxWidth }} mx-auto px-5 sm:px-8 md:px-12 py-6 sm:py-10 md:py-12 bg-white shadow-xl overflow-hidden rounded-2xl border border-gray-100 my-4 md:my-8 lg:my-10">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
