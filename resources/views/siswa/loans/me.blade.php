<x-app-layout>
  <div class="min-h-screen bg-blue-50 flex flex-col items-center py-12 px-6">

    <!-- Header -->
    <h2 class="text-3xl font-bold text-blue-800 text-center mb-10 tracking-wide">
      Pinjaman Saya
    </h2>

    <!-- Konten -->
    <div class="w-full max-w-6xl bg-white rounded-2xl shadow-md border border-blue-100 p-8">
      @if ($loans->isEmpty())
        <div class="text-center text-gray-500 italic py-10">
          Belum ada riwayat peminjaman buku.
        </div>
      @else
        <div class="overflow-x-auto rounded-lg border border-blue-100">
          <table class="w-full text-sm border-collapse">
            <thead class="bg-blue-100 text-blue-800 uppercase tracking-wide text-xs">
              <tr>
                <th class="px-4 py-3 text-left">#</th>
                <th class="px-4 py-3 text-left">Buku</th>
                <th class="px-4 py-3 text-center">Jumlah</th>
                <th class="px-4 py-3 text-center">Status</th>
                <th class="px-4 py-3 text-center">Tgl Pinjam</th>
                <th class="px-4 py-3 text-center">Tgl Kembali</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-blue-100">
              @foreach ($loans as $i => $l)
                <tr class="hover:bg-blue-50 transition">
                  <td class="px-4 py-3 text-gray-700">{{ $loans->firstItem() + $i }}</td>
                  <td class="px-4 py-3 font-medium text-blue-700">{{ $l->book->nama }}</td>
                  <td class="px-4 py-3 text-center text-gray-700">{{ $l->jumlah }}</td>
                  <td class="px-4 py-3 text-center">
                    @if($l->status === 'dipinjam')
                      <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold">Dipinjam</span>
                    @elseif($l->status === 'selesai')
                      <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">Selesai</span>
                    @else
                      <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-semibold">Menunggu</span>
                    @endif
                  </td>
                  <td class="px-4 py-3 text-center text-gray-700">{{ $l->tanggal_pinjam }}</td>
                  <td class="px-4 py-3 text-center text-gray-700">{{ $l->tanggal_kembali }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
          {{ $loans->links() }}
        </div>
      @endif
    </div>

    <!-- Footer -->
    <footer class="mt-16 border-t border-blue-200 text-center py-4 text-sm text-blue-700 w-full">
      &copy; {{ date('Y') }} Perpustakaan Sekolah. Semua Hak Dilindungi.
    </footer>

  </div>
</x-app-layout>
