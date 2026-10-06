<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=playfair-display:600,700|figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    <style>
        [x-cloak]{display:none !important}
        .font-serif-display { font-family: 'Playfair Display', Georgia, serif; }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-[#f6efe3] text-[#3b2314]">
<div x-data="{ sidebar: false }" class="min-h-screen">

    <div x-show="sidebar" x-cloak @click="sidebar = false"
        class="fixed inset-0 z-30 bg-black/60 backdrop-blur-sm lg:hidden"></div>

    <!-- Sidebar -->
    <aside :class="sidebar ? 'translate-x-0' : '-translate-x-full'"
        class="fixed inset-y-0 left-0 z-40 w-64 flex flex-col bg-gradient-to-b from-[#2a1709] via-[#3b2314] to-[#4a2a14] text-[#d9c6ab] transition-transform duration-200 lg:translate-x-0">

        <div class="flex items-center gap-3 px-6 h-20">
            <div class="w-10 h-10 rounded-xl bg-[#7a4320] flex items-center justify-center shadow-lg shadow-black/30 ring-1 ring-[#e8c08a]/30">
                <svg class="w-5 h-5 text-[#e8c08a]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.25v13m0-13C10.8 5.5 9.2 5 7.5 5S4.2 5.5 3 6.25v13C4.2 18.5 5.8 18 7.5 18s3.3.5 4.5 1.25m0-13C13.2 5.5 14.8 5 16.5 5s3.3.5 4.5 1.25v13C19.8 18.5 18.2 18 16.5 18s-3.3.5-4.5 1.25"/></svg>
            </div>
            <div>
                <p class="font-serif-display text-white font-bold leading-tight">Perpustakaan</p>
                <p class="text-xs text-[#b08a62]">Manajemen Buku</p>
            </div>
        </div>

        <nav class="flex-1 px-4 py-4 space-y-1">
            <p class="px-3 mb-2 text-xs font-semibold tracking-wider text-[#b08a62] uppercase">Menu</p>

            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition
                {{ request()->routeIs('dashboard') ? 'bg-[#7a4320] text-white shadow-lg shadow-black/30 ring-1 ring-[#e8c08a]/20' : 'hover:bg-white/5 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3v-6h6v6h3a1 1 0 001-1V10"/></svg>
                Dashboard
            </a>

            <a href="{{ route('books.index') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition
                {{ request()->routeIs('books.*') ? 'bg-[#7a4320] text-white shadow-lg shadow-black/30 ring-1 ring-[#e8c08a]/20' : 'hover:bg-white/5 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.25v13m0-13C10.8 5.5 9.2 5 7.5 5S4.2 5.5 3 6.25v13C4.2 18.5 5.8 18 7.5 18s3.3.5 4.5 1.25m0-13C13.2 5.5 14.8 5 16.5 5s3.3.5 4.5 1.25v13C19.8 18.5 18.2 18 16.5 18s-3.3.5-4.5 1.25"/></svg>
                Data Buku
            </a>
        </nav>

        <form method="POST" action="{{ route('logout') }}" class="p-4 border-t border-white/10">
            @csrf
            <button type="submit"
                class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-[#b08a62] hover:bg-red-500/10 hover:text-red-300 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"/></svg>
                Logout
            </button>
        </form>
    </aside>

    <!-- Konten -->
    <div class="lg:pl-64">
        <header class="sticky top-0 z-20 h-16 flex items-center justify-between px-4 sm:px-8 bg-[#fbf5ea]/85 backdrop-blur border-b border-[#eadcc6]">
            <button @click="sidebar = true" class="lg:hidden p-2 -ml-2 rounded-lg text-[#6b5848] hover:bg-[#f3e6d0]">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
            <div class="hidden lg:block text-sm text-[#6b5848]">{{ now()->translatedFormat('l, d F Y') }}</div>

            <div class="flex items-center gap-3">
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-semibold leading-tight">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-[#6b5848]">{{ Auth::user()->email }}</p>
                </div>
                <span class="w-10 h-10 rounded-full bg-[#7a4320] text-[#e8c08a] flex items-center justify-center font-bold shadow-md ring-2 ring-[#e8c08a]/40">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </span>
            </div>
        </header>

        <main class="p-4 sm:p-8">
            @isset($header)
                <div class="mb-6">{{ $header }}</div>
            @endisset
            {{ $slot }}
        </main>
    </div>
</div>
</body>
</html>