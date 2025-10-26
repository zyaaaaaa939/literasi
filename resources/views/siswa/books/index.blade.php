<x-app-layout>
  <div class="min-h-screen bg-blue-50 flex flex-col items-center py-12 px-6">
    
    <!-- Header -->
    <h2 class="text-3xl font-bold text-blue-800 text-center mb-10">
      Daftar Buku Perpustakaan
    </h2>

    <div class="w-full max-w-7xl">
      @if($books->isEmpty())
        <div class="text-center text-gray-500 italic mt-10 text-lg">
          Belum ada buku yang tersedia di perpustakaan.
        </div>
      @else
        <!-- Grid Buku -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
          @foreach($books as $b)
            <a href="{{ route('siswa.buku.show', $b) }}"
               class="bg-white border border-blue-200 rounded-2xl overflow-hidden shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
              
              @if($b->gambar)
                <img src="{{ asset('storage/'.$b->gambar) }}" 
                     alt="{{ $b->nama }}" 
                     class="w-full h-56 object-cover">
              @else
                <div class="w-full h-56 flex items-center justify-center bg-blue-100 text-blue-400 text-sm italic">
                  Tidak ada gambar
                </div>
              @endif

              <div class="p-6">
                <h3 class="font-bold text-lg text-blue-800 mb-1 truncate">
                  {{ $b->nama }}
                </h3>
                <p class="text-sm text-gray-600 mb-1">Kategori: <span class="font-medium">{{ $b->kategori ?? '-' }}</span></p>
                <p class="text-sm text-gray-600 mb-2">Stok: <span class="font-medium">{{ $b->stok }}</span></p>
                <p class="text-xs text-gray-500 leading-relaxed">
                  {{ Str::limit($b->deskripsi, 100) }}
                </p>
              </div>
            </a>
          @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
          {{ $books->links() }}
        </div>
      @endif
    </div>

    <!-- Footer -->
    <footer class="mt-16 border-t border-blue-200 text-center py-4 text-sm text-blue-700 w-full">
      &copy; {{ date('Y') }} Perpustakaan Sekolah. Semua Hak Dilindungi.
    </footer>

  </div>
</x-app-layout>
