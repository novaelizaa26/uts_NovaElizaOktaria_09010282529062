<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-slate-800">
<div class="min-h-screen grid lg:grid-cols-2">

    <!-- Panel kiri -->
    <div class="relative hidden lg:flex flex-col items-center justify-center overflow-hidden bg-gradient-to-br from-indigo-600 via-violet-600 to-purple-700 p-12 text-white">
        <div class="absolute -top-24 -left-24 w-96 h-96 rounded-full bg-white/10 blur-2xl"></div>
        <div class="absolute -bottom-32 -right-20 w-[28rem] h-[28rem] rounded-full bg-fuchsia-400/20 blur-3xl"></div>

        <div class="relative text-center max-w-sm">
            <div class="mx-auto w-20 h-20 rounded-2xl bg-white/15 backdrop-blur flex items-center justify-center ring-1 ring-white/30 shadow-xl">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.25v13m0-13C10.8 5.5 9.2 5 7.5 5S4.2 5.5 3 6.25v13C4.2 18.5 5.8 18 7.5 18s3.3.5 4.5 1.25m0-13C13.2 5.5 14.8 5 16.5 5s3.3.5 4.5 1.25v13C19.8 18.5 18.2 18 16.5 18s-3.3.5-4.5 1.25"/></svg>
            </div>
            <h1 class="mt-6 text-4xl font-extrabold tracking-tight">Perpustakaan</h1>
            <p class="mt-3 text-indigo-100">Aplikasi pengelolaan data buku yang simpel, rapi, dan cepat.</p>
        </div>
    </div>

    <!-- Panel kanan -->
    <div class="flex items-center justify-center p-6 bg-slate-50">
        <div class="w-full max-w-md bg-white rounded-3xl shadow-xl shadow-slate-200/70 ring-1 ring-slate-100 p-8 sm:p-10">
            {{ $slot }}
        </div>
    </div>
</div>
</body>
</html>