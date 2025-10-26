@php $isEdit = isset($book); @endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="space-y-2">
        <label class="block text-sm font-medium text-blue-700">Nama Buku</label>
        <input type="text" name="nama" value="{{ old('nama', $book->nama ?? '') }}"
               class="w-full border border-blue-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:outline-none">
    </div>

    <div class="space-y-2">
        <label class="block text-sm font-medium text-blue-700">Kategori</label>
        <input type="text" name="kategori" value="{{ old('kategori', $book->kategori ?? '') }}"
               class="w-full border border-blue-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:outline-none">
    </div>

    <div class="md:col-span-2 space-y-2">
        <label class="block text-sm font-medium text-blue-700">Deskripsi</label>
        <textarea name="deskripsi" rows="4"
                  class="w-full border border-blue-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:outline-none">{{ old('deskripsi', $book->deskripsi ?? '') }}</textarea>
    </div>

    <div class="space-y-2">
        <label class="block text-sm font-medium text-blue-700">Stok</label>
        <input type="number" name="stok" min="0" 
               value="{{ old('stok', $book->stok ?? 0) }}"
               class="w-full border border-blue-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:outline-none">
    </div>

    <div class="space-y-2">
        <label class="block text-sm font-medium text-blue-700">Gambar</label>
        <input type="file" name="gambar" accept="image/*"
               class="w-full border border-blue-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:outline-none">

        @if($isEdit && $book->gambar)
            <div class="flex items-center gap-3 mt-2">
                <img src="{{ asset('storage/'.$book->gambar) }}" class="h-20 rounded-lg border border-blue-200">
                <label class="inline-flex items-center gap-2 text-sm">
                    <input type="checkbox" name="hapus_gambar" value="1" class="accent-blue-500">
                    Hapus gambar
                </label>
            </div>
        @endif
    </div>
</div>

<div class="flex justify-end gap-3 mt-4">
    <a href="{{ route('admin.buku.index') }}" 
       class="px-4 py-2 border border-blue-300 rounded-lg hover:bg-blue-50 transition text-blue-700">
       Batal
    </a>
    <button type="submit" 
            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
        {{ $isEdit ? 'Simpan Perubahan' : 'Simpan' }}
    </button>
</div>
