<x-app-layout>
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#2a1709] via-[#4a2a14] to-[#7a4320] p-8 text-white shadow-xl shadow-[#3b2314]/25">
        <div class="absolute -right-10 -top-10 w-56 h-56 rounded-full bg-[#e8c08a]/10"></div>
        <div class="absolute right-24 -bottom-16 w-40 h-40 rounded-full bg-[#e8c08a]/10"></div>
        <p class="relative text-[#e8c08a] text-sm">Dashboard</p>
        <h2 class="relative mt-1 font-serif-display text-3xl font-bold">
            Selamat datang, <span class="text-[#e8c08a]">{{ Auth::user()->name }}</span>!
        </h2>
        <p class="relative mt-2 text-white/80">Kelola data buku perpustakaan dengan mudah.</p>
        <div class="relative mt-4 h-1 w-24 rounded-full bg-gradient-to-r from-[#e8c08a] to-transparent"></div>
    </div>

    <div class="grid gap-5 mt-6 sm:grid-cols-3">
        <div class="bg-[#fbf5ea] rounded-2xl p-6 shadow-sm ring-1 ring-[#eadcc6] flex items-center gap-4 hover:shadow-md transition">
            <div class="w-14 h-14 rounded-2xl bg-[#7a4320] text-[#e8c08a] flex items-center justify-center shadow-lg shadow-[#7a4320]/30">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.25v13m0-13C10.8 5.5 9.2 5 7.5 5S4.2 5.5 3 6.25v13C4.2 18.5 5.8 18 7.5 18s3.3.5 4.5 1.25m0-13C13.2 5.5 14.8 5 16.5 5s3.3.5 4.5 1.25v13C19.8 18.5 18.2 18 16.5 18s-3.3.5-4.5 1.25"/></svg>
            </div>
            <div>
                <p class="text-sm text-[#6b5848]">Total Buku</p>
                <p class="font-serif-display text-3xl font-bold text-[#3b2314]">{{ $totalBooks }}</p>
            </div>
        </div>

        <div class="bg-[#fbf5ea] rounded-2xl p-6 shadow-sm ring-1 ring-[#eadcc6] flex items-center gap-4 hover:shadow-md transition">
            <div class="w-14 h-14 rounded-2xl bg-[#e8c08a] text-[#3b2314] flex items-center justify-center shadow-lg shadow-[#e8c08a]/40">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7.5A2.25 2.25 0 015.25 5.25h4.19a2.25 2.25 0 011.59.66l1.06 1.06a2.25 2.25 0 001.59.66h5.07A2.25 2.25 0 0121 9.88v7.87A2.25 2.25 0 0118.75 20H5.25A2.25 2.25 0 013 17.75V7.5z"/></svg>
            </div>
            <div>
                <p class="text-sm text-[#6b5848]">Total Kategori</p>
                <p class="font-serif-display text-3xl font-bold text-[#3b2314]">{{ $totalCategories }}</p>
            </div>
        </div>

        <a href="{{ route('books.create') }}"
            class="rounded-2xl p-6 bg-[#3b2314] text-white flex items-center gap-4 hover:bg-[#2a1709] transition shadow-sm">
            <div class="w-14 h-14 rounded-2xl bg-white/10 flex items-center justify-center text-[#e8c08a]">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M12 5v14M5 12h14"/></svg>
            </div>
            <div>
                <p class="text-sm text-[#b08a62]">Aksi cepat</p>
                <p class="font-bold">Tambah Buku</p>
            </div>
        </a>
    </div>

    <div class="mt-6 bg-[#fbf5ea] rounded-2xl shadow-sm ring-1 ring-[#eadcc6] overflow-hidden">
        <div class="flex items-center justify-between px-6 py-5">
            <h3 class="font-serif-display font-bold text-lg text-[#3b2314]">Buku Terbaru</h3>
            <a href="{{ route('books.index') }}" class="text-sm font-medium text-[#8a5a2b] hover:text-[#5b3517] underline underline-offset-2">Lihat semua →</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-[#f3e6d0] text-xs uppercase tracking-wide text-[#6b5848]">
                    <tr>
                        <th class="px-6 py-3">Judul</th>
                        <th class="px-6 py-3">Penulis</th>
                        <th class="px-6 py-3">Kategori</th>
                        <th class="px-6 py-3">Tahun</th>
                        <th class="px-6 py-3">Stok</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#eadcc6]">
                    @foreach ($latestBooks as $b)
                        <tr class="hover:bg-[#f6efe3]">
                            <td class="px-6 py-4 font-semibold text-[#3b2314]">{{ $b->title }}</td>
                            <td class="px-6 py-4 text-[#6b5848]">{{ $b->author }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-[#f3e6d0] text-[#7a4320]">{{ $b->category->name }}</span>
                            </td>
                            <td class="px-6 py-4 text-[#6b5848]">{{ $b->year }}</td>
                            <td class="px-6 py-4 font-medium">{{ $b->stock }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>