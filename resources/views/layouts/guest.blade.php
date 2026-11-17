@props(['maxWidth' => 'sm:max-w-4xl'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'J & K Designs Academy') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[#081538] text-slate-100 selection:bg-cyan-400 selection:text-slate-950">
        <!-- Exact Landing Page Theme: Zero white, Deep Midnight Blue (#081538) with Cyan and Sky Accents -->
        <div class="min-h-screen flex flex-col justify-center items-center px-4 sm:px-6 md:px-8 py-6 sm:py-10 md:py-12 bg-[#081538] relative overflow-hidden">
            <!-- Background Glows matching Landing Page -->
            <div class="absolute -top-32 -left-32 w-96 h-96 bg-cyan-400/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-sky-400/10 rounded-full blur-3xl pointer-events-none"></div>

            <div class="flex justify-center mb-6 relative z-10">
                <a href="/" class="flex items-center gap-3 transition hover:scale-105 transform duration-300 group text-decoration-none">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-cyan-400 to-sky-600 flex items-center justify-center font-black text-2xl text-slate-950 border-2 border-cyan-300 shadow-xl shadow-cyan-400/30">
                        JK
                    </div>
                    <div>
                        <span class="font-black text-xl text-white block leading-tight">J &amp; K Designs</span>
                        <span class="text-xs font-black text-cyan-300 uppercase tracking-widest block">Academy Portal</span>
                    </div>
                </a>
            </div>

            <div class="w-full {{ $maxWidth }} mx-auto p-6 sm:p-8 md:p-10 bg-[#0f286b] border-2 border-sky-400/60 shadow-2xl shadow-sky-500/20 rounded-3xl overflow-hidden text-white relative z-10">
                {{ $slot }}
            </div>

            <!-- Footer Return Link -->
            <div class="mt-6 text-center text-xs text-sky-200 font-bold relative z-10">
                <a href="/" class="hover:text-cyan-300 transition flex items-center justify-center gap-2">
                    <span>&larr; Return to J &amp; K Academy Landing Page</span>
                </a>
            </div>
        </div>
    </body>
</html>
