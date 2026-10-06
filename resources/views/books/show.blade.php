<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-serif-display text-3xl font-bold text-[#3b2314]">Detail Buku</h2>
            <a href="{{ route('books.index') }}" class="text-sm font-medium text-[#8a5a2b] hover:text-[#5b3517] underline underline-offset-2">← Kembali ke Daftar</a>
        </div>
    </x-slot>

    <div class="max-w-3xl bg-[#fbf5ea] rounded-2xl shadow-sm ring-1 ring-[#eadcc6] overflow-hidden">
        <div class="bg-gradient-to-r from-[#2a1709] via-[#4a2a14] to-[#7a4320] p-8 text-white">
            <span class="px-3 py-1 rounded-full bg-[#e8c08a]/20 text-[#e8c08a] text-xs font-medium">{{ $book->category->name }}</span>
            <h3 class="mt-3 font-serif-display text-2xl font-bold">{{ $book->title }}</h3>
            <p class="text-[#e8c08a]">oleh {{ $book->author }}</p>
        </div>

        <dl class="grid grid-cols-2 gap-6 p-8 text-sm">
            <div><dt class="text-[#6b5848]">Penerbit</dt><dd class="mt-1 font-semibold text-[#3b2314]">{{ $book->publisher }}</dd></div>
            <div><dt class="text-[#6b5848]">Tahun Terbit</dt><dd class="mt-1 font-semibold text-[#3b2314]">{{ $book->year }}</dd></div>
            <div><dt class="text-[#6b5848]">Kategori</dt><dd class="mt-1 font-semibold text-[#3b2314]">{{ $book->category->name }}</dd></div>
            <div><dt class="text-[#6b5848]">Stok</dt><dd class="mt-1 font-semibold text-[#3b2314]">{{ $book->stock }} buku</dd></div>
        </dl>

        <div class="flex gap-3 px-8 pb-8">
            <a href="{{ route('books.edit', $book) }}" class="px-5 py-2.5 rounded-xl bg-[#7a4320] text-white text-sm font-semibold hover:bg-[#633418] transition">Edit</a>
            <form method="POST" action="{{ route('books.destroy', $book) }}" onsubmit="return confirm('Hapus buku ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-5 py-2.5 rounded-xl bg-red-50 text-red-600 text-sm font-semibold hover:bg-red-500 hover:text-white transition">Hapus</button>
            </form>
        </div>
    </div>
</x-app-layout>