<x-app-layout>
  <div class="min-h-screen bg-blue-50 flex flex-col items-center py-10 px-6">

    <!-- Hero Section -->
    <section class="max-w-6xl mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-10">
      <div class="max-w-lg text-center md:text-left">
        <h2 class="text-3xl font-bold text-blue-800 mb-3 leading-snug">
          Selamat Datang, <br>
          <span class="text-blue-600">{{ Auth::user()->name ?? 'Siswa' }}</span>!
        </h2>
        <p class="text-gray-700 text-base mb-5">
          Akses semua fitur perpustakaan digitalmu dengan mudah dan cepat.
          Temukan buku favorit dan kelola pinjamanmu di satu tempat.
        </p>
      </div>

      <!-- Gambar Hero (Tumpukan Buku) -->
      <div class="mt-8 md:mt-0">
        <img src="https://cdn-icons-png.flaticon.com/512/2232/2232688.png" 
             alt="Tumpukan Buku" class="w-60 md:w-72 drop-shadow-md">
      </div>
    </section>

    <!-- Notifikasi sukses -->
    @if (session('ok'))
      <div class="p-4 mb-8 bg-green-100 border border-green-200 text-green-800 rounded-lg shadow-sm w-full max-w-3xl text-center">
        {{ session('ok') }}
      </div>
    @endif

    <!-- Kartu Menu -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 w-full max-w-6xl mt-8">
      
      <!-- Daftar Buku -->
      <a href="{{ route('siswa.buku.index') }}"
         class="bg-white border border-blue-200 rounded-2xl p-8 shadow-md hover:shadow-xl hover:-translate-y-1 transition">
        <div class="flex flex-col items-center text-center">
          <div class="text-blue-700 font-bold text-xl mb-2"> Daftar Buku</div>
          <p class="text-gray-600 text-sm">Telusuri koleksi buku dan temukan bacaan menarik.</p>
        </div>
      </a>

      <!-- Pinjaman Saya -->
      <a href="{{ route('siswa.loans.me') }}"
         class="bg-white border border-blue-200 rounded-2xl p-8 shadow-md hover:shadow-xl hover:-translate-y-1 transition">
        <div class="flex flex-col items-center text-center">
          <div class="text-blue-700 font-bold text-xl mb-2"> Pinjaman Saya</div>
          <p class="text-gray-600 text-sm">Lihat status peminjaman dan riwayat buku yang kamu baca.</p>
        </div>
      </a>

      <!-- Logout -->
      <form method="POST" action="{{ route('logout') }}"
            class="bg-white border border-blue-200 rounded-2xl p-8 shadow-md hover:shadow-xl hover:-translate-y-1 transition">
        @csrf
        <div class="flex flex-col items-center text-center">
          <button class="text-blue-700 font-bold text-xl mb-2 w-full"> Logout</button>
          <p class="text-gray-600 text-sm">Keluar dari akun perpustakaanmu.</p>
        </div>
      </form>
    </div>

    <!-- Footer -->
    <footer class="mt-16 border-t border-blue-200 text-center py-4 text-sm text-blue-700 w-full">
      &copy; {{ date('Y') }} Perpustakaan Sekolah. Semua Hak Dilindungi.
    </footer>

  </div>
</x-app-layout>
