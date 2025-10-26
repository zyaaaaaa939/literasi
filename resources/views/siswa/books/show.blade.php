<x-app-layout>
  

  <div class="flex justify-center py-10 bg-blue-50 min-h-screen">
    <div class="max-w-5xl w-full mx-auto p-8 bg-white text-gray-800 rounded-2xl shadow-md">
      
      <div class="flex flex-col md:flex-row gap-8 items-start">
        {{-- Gambar Buku --}}
        <div class="md:w-1/3">
          @if($book->gambar)
            <img src="{{ asset('storage/'.$book->gambar) }}" 
                 class="w-full rounded-xl border border-blue-200 shadow">
          @else
            <div class="w-full h-64 flex items-center justify-center bg-blue-50 border border-blue-200 rounded-xl text-blue-400 italic">
              Tidak ada gambar
            </div>
          @endif
        </div>

        {{-- Detail Buku & Form --}}
        <div class="md:w-2/3 space-y-4">
          <h3 class="text-2xl font-semibold text-blue-700 mb-2">{{ $book->nama }}</h3>

          <div class="text-sm text-gray-700 space-y-1">
            <div><span class="font-semibold text-blue-700">Kategori:</span> {{ $book->kategori ?? '-' }}</div>
            <div><span class="font-semibold text-blue-700">Stok:</span> {{ $book->stok }}</div>
          </div>

          <p class="mt-2 text-gray-600 leading-relaxed">{{ $book->deskripsi }}</p>

          <hr class="my-4 border-blue-200">

          <h4 class="text-lg font-semibold text-blue-700 mb-2">Formulir Peminjaman</h4>

          {{-- Notifikasi sukses --}}
          @if(session('ok')) 
            <div class="p-3 rounded bg-blue-100 text-blue-800 text-sm border border-blue-300">
              {{ session('ok') }}
            </div> 
          @endif

          {{-- Form Pinjam --}}
          <form method="POST" action="{{ route('siswa.buku.pinjam', $book) }}" class="space-y-4">
            @csrf

            <div>
              <label class="block text-sm font-medium mb-1 text-gray-700">Nama Peminjam</label>
              <input class="form-input w-full bg-blue-50 border border-blue-300 rounded px-3 py-2 text-gray-800" 
                     value="{{ auth()->user()->name }}" disabled>
            </div>

            <div>
              <label class="block text-sm font-medium mb-1 text-gray-700">Jumlah</label>
              <input type="number" min="1" max="{{ $book->stok }}" name="jumlah"
                     class="form-input w-full bg-blue-50 border border-blue-300 rounded px-3 py-2 text-gray-800" required>
              @error('jumlah')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium mb-1 text-gray-700">Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" 
                       class="form-input w-full bg-blue-50 border border-blue-300 rounded px-3 py-2 text-gray-800" required>
              </div>
              <div>
                <label class="block text-sm font-medium mb-1 text-gray-700">Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali"
                       class="form-input w-full bg-blue-50 border border-blue-300 rounded px-3 py-2 text-gray-800" required>
                @error('tanggal_kembali')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
              </div>
            </div>

            <div class="flex gap-3 pt-2">
              <button class="px-5 py-2 bg-blue-600 hover:bg-blue-700 rounded text-white font-medium transition">
                Ajukan Pinjam
              </button>

              <a href="{{ route('dashboard') }}" 
                 class="inline-block px-5 py-2 border border-blue-400 text-blue-600 rounded hover:bg-blue-50 transition">
                Kembali
              </a>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</x-app-layout>
