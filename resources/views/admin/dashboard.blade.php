<x-app-layout>
  <div class="min-h-screen bg-blue-50 py-12 px-6">

    {{-- Hero Section --}}
    <section class="max-w-6xl mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-10">
      <div class="max-w-lg text-center md:text-left">
        <h1 class="text-4xl font-bold text-blue-800 mb-3 leading-snug">
          Selamat Datang, <br>
          <span class="text-blue-600">{{ Auth::user()->name ?? 'Admin' }}</span>!
        </h1>
        <p class="text-gray-700 text-base mb-5">
          Kelola seluruh koleksi buku dan data peminjaman perpustakaan digital dengan mudah dan efisien.
        </p>
      </div>

      <!-- Gambar Hero (Tema Admin Perpustakaan) -->
      <div class="mt-8 md:mt-0">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135810.png"
             alt="Admin Perpustakaan" class="w-72 md:w-80 drop-shadow-md">
      </div>
    </section>

    {{-- Notifikasi sukses --}}
    @if (session('ok'))
      <div class="p-4 mb-6 bg-green-100 border border-green-200 text-green-800 rounded-lg shadow-sm max-w-3xl mx-auto">
        {{ session('ok') }}
      </div>
    @endif

    {{-- Kartu Menu --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto mt-8">
      
      {{-- Manajemen Buku --}}
      <a href="{{ route('admin.buku.index') }}"
         class="bg-white border border-blue-200 rounded-2xl p-6 hover:shadow-xl transition transform hover:-translate-y-1">
        <div class="text-blue-700 font-bold text-lg mb-2">Manajemen Buku</div>
        <p class="text-gray-600 text-sm">Kelola data buku: tambah, edit, dan hapus koleksi perpustakaan.</p>
      </a>

      {{-- Daftar Peminjaman --}}
      <a href="{{ route('admin.pinjaman.index') }}"
         class="bg-white border border-blue-200 rounded-2xl p-6 hover:shadow-xl transition transform hover:-translate-y-1">
        <div class="text-blue-700 font-bold text-lg mb-2">Daftar Peminjaman</div>
        <p class="text-gray-600 text-sm">Pantau status peminjaman dan pengembalian buku dengan mudah.</p>
      </a>

      {{-- Beranda --}}
      <a href="{{ url('/') }}"
         class="bg-white border border-blue-200 rounded-2xl p-6 hover:shadow-xl transition transform hover:-translate-y-1">
        <div class="text-blue-700 font-bold text-lg mb-2">Beranda</div>
        <p class="text-gray-600 text-sm">Kembali ke halaman utama perpustakaan digital.</p>
      </a>
    </div>

    {{-- Footer --}}
    <footer class="mt-16 border-t border-blue-200 text-center py-4 text-sm text-blue-700 w-full">
      &copy; {{ date('Y') }} Perpustakaan Digital Sekolah. Semua Hak Dilindungi.
    </footer>

  </div>
</x-app-layout>
