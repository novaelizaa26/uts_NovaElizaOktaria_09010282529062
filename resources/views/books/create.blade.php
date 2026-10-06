<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-serif-display text-3xl font-bold text-[#3b2314]">Tambah Buku</h2>
            <a href="{{ route('books.index') }}" class="text-sm font-medium text-[#8a5a2b] hover:text-[#5b3517] underline underline-offset-2">← Kembali ke Daftar</a>
        </div>
    </x-slot>

    <div class="max-w-3xl bg-[#fbf5ea] rounded-2xl shadow-sm ring-1 ring-[#eadcc6] p-8">
        <form method="POST" action="{{ route('books.store') }}">
            @include('books._form')
        </form>
    </div>
</x-app-layout>