<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-blue-800 text-center">
            Daftar Peminjaman Buku
        </h2>
    </x-slot>

    <div class="min-h-screen bg-blue-50 py-10 px-6">
        <div class="bg-white rounded-2xl shadow-lg p-6 overflow-x-auto">
            {{-- Pesan sukses / error --}}
            @if (session('ok'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-lg">
                    {{ session('ok') }}
                </div>
            @endif
            @if (session('err'))
                <div class="mb-4 p-3 bg-red-100 text-red-800 rounded-lg">
                    {{ session('err') }}
                </div>
            @endif

            {{-- Tabel daftar pinjaman --}}
            <table class="min-w-full border border-gray-200 divide-y divide-gray-200">
                <thead class="bg-blue-100">
                    <tr class="text-left text-gray-700">
                        <th class="py-3 px-4">#</th>
                        <th class="py-3 px-4">Nama Siswa</th>
                        <th class="py-3 px-4">Judul Buku</th>
                        <th class="py-3 px-4">Tanggal Pinjam</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($loans as $loan)
                        <tr class="hover:bg-blue-50 transition">
                            <td class="py-3 px-4">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4">{{ $loan->user->name ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $loan->book->nama ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $loan->created_at->format('d M Y') }}</td>
                            <td class="py-3 px-4">
                                @switch($loan->status)
                                    @case('diproses')
                                        <span class="px-3 py-1 text-sm bg-yellow-100 text-yellow-700 rounded-lg">Diproses</span>
                                        @break
                                    @case('dipinjam')
                                        <span class="px-3 py-1 text-sm bg-blue-100 text-blue-700 rounded-lg">Dipinjam</span>
                                        @break
                                    @case('selesai')
                                        <span class="px-3 py-1 text-sm bg-green-100 text-green-700 rounded-lg">Selesai</span>
                                        @break
                                    @case('dibatalkan')
                                        <span class="px-3 py-1 text-sm bg-red-100 text-red-700 rounded-lg">Dibatalkan</span>
                                        @break
                                @endswitch
                            </td>
                            <td class="py-3 px-4 text-center space-x-2">
                                @if (in_array($loan->status, ['diproses', 'dipinjam']))
                                    <form action="{{ route('admin.pinjaman.status', $loan->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()" 
                                                class="border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500">
                                            <option value="">Ubah Status</option>
                                            <option value="dipinjam">Dipinjam</option>
                                            <option value="selesai">Selesai</option>
                                            <option value="dibatalkan">Dibatalkan</option>
                                        </select>
                                    </form>
                                @else
                                    <span class="text-gray-400 text-sm italic">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-6 text-gray-500">Belum ada data peminjaman.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="mt-6">
                {{ $loans->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
