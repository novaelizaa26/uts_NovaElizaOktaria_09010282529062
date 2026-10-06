<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk - Perpustakaan</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=playfair-display:600,700|figtree:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
   <style>
    .font-serif-display { font-family: 'Playfair Display', Georgia, serif; }
    .bg-library {
        background-image:
            url('/images/library-bg.jpg'),
            linear-gradient(135deg, #3b2314 0%, #6b3f1d 50%, #2a1709 100%);
        background-size: cover;
        background-position: center;
    }
</style>
</head>
<body class="font-sans antialiased">
<div class="relative min-h-screen bg-library">
    <!-- Overlay gelap hangat -->
    <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/40 to-amber-950/50"></div>

    <div class="relative min-h-screen grid lg:grid-cols-2 items-center gap-10 px-6 py-10 lg:px-20">

        <!-- Teks sambutan -->
        <div class="text-white max-w-lg">
            <svg class="w-14 h-14 text-white/90" fill="none" stroke="currentColor" stroke-width="1.4" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.25v13m0-13C10.8 5.5 9.2 5 7.5 5S4.2 5.5 3 6.25v13C4.2 18.5 5.8 18 7.5 18s3.3.5 4.5 1.25m0-13C13.2 5.5 14.8 5 16.5 5s3.3.5 4.5 1.25v13C19.8 18.5 18.2 18 16.5 18s-3.3.5-4.5 1.25"/>
            </svg>
            <h1 class="mt-6 font-serif-display font-bold text-4xl sm:text-5xl leading-tight">
                Selamat Datang
                <span class="block font-semibold text-[#e8c08a]">di Perpustakaan</span>
            </h1>
            <p class="mt-5 text-base sm:text-lg text-white/85 leading-relaxed">
                Temukan buku favoritmu, perluas wawasan, dan mulai perjalanan literasimu di sini.
            </p>
            <div class="mt-5 h-1 w-24 rounded-full bg-gradient-to-r from-[#e8c08a] to-transparent"></div>
        </div>

        <!-- Kartu login -->
        <div class="w-full max-w-md justify-self-center lg:justify-self-end">
            <div class="relative rounded-3xl bg-[#fbf5ea]/95 backdrop-blur-md p-8 sm:p-10 shadow-2xl shadow-black/40 ring-1 ring-white/40">

                <svg class="absolute top-8 right-8 w-14 h-14 text-[#b08a62]" fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 7l8-3 8 3-8 3-8-3zM4 7v4l8 3 8-3V7M4 11v4l8 3 8-3v-4"/>
                </svg>

                <h2 class="font-serif-display font-bold text-3xl text-[#3b2314]">Silakan Masuk</h2>
                <p class="mt-1 mb-8 text-sm text-[#6b5848]">Akses akun perpustakaan Anda</p>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-[#3b2314]">Email</label>
                        <div class="relative mt-2">
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-[#7a5a3a]" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 7l9 6 9-6M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                            </svg>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                                autocomplete="username" placeholder="admin@example.com"
                                class="w-full rounded-xl border border-[#d9c6ab] bg-[#fffaf2] pl-12 pr-4 py-3 text-sm text-[#3b2314] placeholder-[#a8957e] focus:border-[#7a4320] focus:ring-[#7a4320]">
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-[#3b2314]">Password</label>
                        <div class="relative mt-2">
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-[#7a5a3a]" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V8a4 4 0 00-8 0v3M6 11h12a1 1 0 011 1v7a1 1 0 01-1 1H6a1 1 0 01-1-1v-7a1 1 0 011-1z"/>
                            </svg>
                            <input id="password" type="password" name="password" required
                                autocomplete="current-password" placeholder="••••••••"
                                class="w-full rounded-xl border border-[#d9c6ab] bg-[#fffaf2] pl-12 pr-4 py-3 text-sm text-[#3b2314] placeholder-[#a8957e] focus:border-[#7a4320] focus:ring-[#7a4320]">
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember + lupa password -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2 text-[#6b5848]">
                            <input type="checkbox" name="remember"
                                class="rounded border-[#d9c6ab] text-[#7a4320] focus:ring-[#7a4320]">
                            Ingat saya
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-[#8a5a2b] underline underline-offset-2 hover:text-[#5b3517]">
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 rounded-xl bg-[#7a4320] py-3.5 text-white font-semibold shadow-lg shadow-[#7a4320]/40 hover:bg-[#633418] transition">
                        Masuk
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 6l6 6-6 6"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>