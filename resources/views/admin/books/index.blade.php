<x-app-layout>
    

    <div class="max-w-7xl mx-auto py-8 px-4 space-y-6">
        {{-- Tombol Tambah Buku --}}
        <div class="flex justify-end">
            <a href="{{ route('admin.buku.create') }}" 
               class="px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                Tambah Buku
            </a>
        </div>

        {{-- Notifikasi --}}
        @if(session('ok'))
            <div class="p-3 rounded-lg bg-green-100 text-green-800 border border-green-200 shadow-sm">
                {{ session('ok') }}
            </div>
        @endif

        {{-- Table Card --}}
        <div class="bg-white rounded-2xl shadow-lg overflow-x-auto border border-blue-100">
            <table class="min-w-full divide-y divide-blue-200">
                <thead class="bg-blue-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-blue-700">#</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-blue-700">ID</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-blue-700">Nama</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-blue-700">Kategori</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-blue-700">Gambar</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-blue-700">Stok</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-blue-700">Deskripsi</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-blue-700">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-blue-100">
                    @foreach($books as $i => $b)
                        <tr class="hover:bg-blue-50 transition">
                            <td class="px-4 py-3 text-sm">{{ $books->firstItem() + $i }}</td>
                            <td class="px-4 py-3 text-sm">{{ $b->id }}</td>
                            <td class="px-4 py-3 text-sm font-medium">{{ $b->nama }}</td>
                            <td class="px-4 py-3 text-sm">{{ $b->kategori }}</td>
                            <td class="px-4 py-3">
                                @if($b->gambar)
                                    <img src="{{ asset('storage/'.$b->gambar) }}" class="h-12 w-12 object-cover rounded-lg border">
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm">{{ $b->stok }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ Str::limit($b->deskripsi, 60) }}</td>
                            <td class="px-4 py-3 flex gap-2">
                                <a href="{{ route('admin.buku.edit', $b) }}" 
                                   class="px-3 py-1 bg-yellow-400 text-white rounded-lg hover:bg-yellow-500 text-xs transition">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('admin.buku.destroy', $b) }}">
                                    @csrf @method('DELETE')
                                    <button type="submit" 
                                            class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 text-xs transition"
                                            onclick="return confirm('Hapus buku ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-4 flex justify-center">
            {{ $books->links() }}
        </div>
    </div>
</x-app-layout>
