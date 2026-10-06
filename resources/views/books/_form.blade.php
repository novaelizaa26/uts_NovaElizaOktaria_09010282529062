@csrf

@php
    $input = 'mt-1.5 block w-full rounded-xl border-[#d9c6ab] bg-[#fffaf2] px-4 py-2.5 text-sm text-[#3b2314] placeholder-[#a8957e] focus:bg-white focus:border-[#7a4320] focus:ring-[#7a4320]';
    $label = 'block text-sm font-semibold text-[#3b2314]';
@endphp

<div class="grid gap-5 sm:grid-cols-2">
    <div class="sm:col-span-2">
        <label class="{{ $label }}">Judul Buku</label>
        <input type="text" name="title" value="{{ old('title', $book->title ?? '') }}" placeholder="Masukkan judul buku" class="{{ $input }}">
        <x-input-error :messages="$errors->get('title')" class="mt-1" />
    </div>

    <div>
        <label class="{{ $label }}">Penulis</label>
        <input type="text" name="author" value="{{ old('author', $book->author ?? '') }}" placeholder="Nama penulis" class="{{ $input }}">
        <x-input-error :messages="$errors->get('author')" class="mt-1" />
    </div>

    <div>
        <label class="{{ $label }}">Penerbit</label>
        <input type="text" name="publisher" value="{{ old('publisher', $book->publisher ?? '') }}" placeholder="Nama penerbit" class="{{ $input }}">
        <x-input-error :messages="$errors->get('publisher')" class="mt-1" />
    </div>

    <div>
        <label class="{{ $label }}">Tahun Terbit</label>
        <input type="number" name="year" value="{{ old('year', $book->year ?? '') }}" placeholder="Contoh: 2024" class="{{ $input }}">
        <x-input-error :messages="$errors->get('year')" class="mt-1" />
    </div>

    <div>
        <label class="{{ $label }}">Stok</label>
        <input type="number" name="stock" value="{{ old('stock', $book->stock ?? '') }}" placeholder="Jumlah stok" class="{{ $input }}">
        <x-input-error :messages="$errors->get('stock')" class="mt-1" />
    </div>

    <div class="sm:col-span-2">
        <label class="{{ $label }}">Kategori</label>
        <select name="category_id" class="{{ $input }}">
            <option value="">Pilih kategori</option>
            @foreach ($categories as $c)
                <option value="{{ $c->id }}" @selected(old('category_id', $book->category_id ?? '') == $c->id)>{{ $c->name }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('category_id')" class="mt-1" />
    </div>
</div>

<div class="flex gap-3 pt-6 mt-6 border-t border-[#eadcc6]">
    <button type="submit"
        class="px-6 py-2.5 rounded-xl bg-[#7a4320] text-white text-sm font-semibold shadow-lg shadow-[#7a4320]/30 hover:bg-[#633418] transition">
        {{ isset($book) ? 'Update' : 'Simpan' }}
    </button>
    <a href="{{ route('books.index') }}" class="px-6 py-2.5 rounded-xl bg-[#f3e6d0] text-[#5b3517] text-sm font-medium hover:bg-[#eadcc6] transition">Batal</a>
</div>