<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <div>
                <h2 class="font-serif-display text-3xl font-bold text-[#3b2314]">Daftar Buku</h2>
                <p class="text-sm text-[#6b5848]">{{ $books->total() }} buku tersedia di perpustakaan</p>
            </div>
            <a href="{{ route('books.create') }}"
                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#7a4320] text-white text-sm font-semibold shadow-lg shadow-[#7a4320]/30 hover:bg-[#633418] transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" d="M12 5v14M5 12h14"/></svg>
                Tambah Buku
            </a>
        </div>
    </x-slot>

    @if (session('success'))
        <div class="mb-5 flex items-center gap-3 p-4 rounded-xl bg-[#f3e6d0] text-[#5b3517] ring-1 ring-[#d9c6ab] text-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-[#fbf5ea] rounded-2xl shadow-sm ring-1 ring-[#eadcc6]">
        <form method="GET" class="flex flex-wrap gap-3 p-5 border-b border-[#eadcc6]">
            <div class="relative flex-1 min-w-[220px]">
                <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-5 h-5 text-[#7a5a3a]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"/></svg>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul atau penulis..."
                    class="w-full pl-11 pr-4 py-2.5 rounded-xl border-[#d9c6ab] bg-[#fffaf2] text-sm text-[#3b2314] placeholder-[#a8957e] focus:border-[#7a4320] focus:ring-[#7a4320]">
            </div>
            <select name="category_id"
                class="rounded-xl border-[#d9c6ab] bg-[#fffaf2] text-sm py-2.5 text-[#3b2314] focus:border-[#7a4320] focus:ring-[#7a4320]">
                <option value="">Semua Kategori</option>
                @foreach ($categories as $c)
                    <option value="{{ $c->id }}" @selected(request('category_id') == $c->id)>{{ $c->name }}</option>
                @endforeach
            </select>
            <button class="px-5 py-2.5 rounded-xl bg-[#3b2314] text-white text-sm font-medium hover:bg-[#2a1709] transition">Cari</button>
            @if (request('search') || request('category_id'))
                <a href="{{ route('books.index') }}" class="px-5 py-2.5 rounded-xl bg-[#f3e6d0] text-[#5b3517] text-sm font-medium hover:bg-[#eadcc6] transition">Reset</a>
            @endif
        </form>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-[#f3e6d0] text-xs uppercase tracking-wide text-[#6b5848]">
                    <tr>
                        <th class="px-6 py-3 w-14">No</th>
                        <th class="px-6 py-3">Buku</th>
                        <th class="px-6 py-3">Kategori</th>
                        <th class="px-6 py-3">Tahun</th>
                        <th class="px-6 py-3">Stok</th>
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#eadcc6]">
                    @forelse ($books as $b)
                        <tr class="hover:bg-[#f6efe3] transition">
                            <td class="px-6 py-4 text-[#6b5848]">{{ $books->firstItem() + $loop->index }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <span class="shrink-0 w-10 h-10 rounded-xl bg-[#7a4320] text-[#e8c08a] font-bold flex items-center justify-center">
                                        {{ strtoupper(substr($b->title, 0, 1)) }}
                                    </span>
                                    <div>
                                        <p class="font-semibold text-[#3b2314]">{{ $b->title }}</p>
                                        <p class="text-xs text-[#6b5848]">{{ $b->author }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-[#f3e6d0] text-[#7a4320]">{{ $b->category->name }}</span>
                            </td>
                            <td class="px-6 py-4 text-[#6b5848]">{{ $b->year }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $b->stock > 0 ? 'bg-[#e8c08a]/40 text-[#5b3517]' : 'bg-red-50 text-red-700' }}">
                                    {{ $b->stock }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-1.5">
                                    <a href="{{ route('books.show', $b) }}" title="Detail"
                                        class="p-2 rounded-lg bg-[#f3e6d0] text-[#7a4320] hover:bg-[#7a4320] hover:text-white transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/></svg>
                                    </a>
                                    <a href="{{ route('books.edit', $b) }}" title="Edit"
                                        class="p-2 rounded-lg bg-[#e8c08a]/40 text-[#8a5a2b] hover:bg-[#c99a5b] hover:text-white transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 20h9M16.5 3.5a2.1 2.1 0 013 3L7 19l-4 1 1-4 12.5-12.5z"/></svg>
                                    </a>
                                    <form method="POST" action="{{ route('books.destroy', $b) }}" onsubmit="return confirm('Hapus buku ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Hapus"
                                            class="p-2 rounded-lg bg-red-50 text-red-600 hover:bg-red-500 hover:text-white transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 6h18M8 6V4h8v2M19 6l-1 14H6L5 6"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="px-6 py-14 text-center text-[#6b5848]">Belum ada data buku.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-[#eadcc6]">{{ $books->links() }}</div>
    </div>
</x-app-layout>