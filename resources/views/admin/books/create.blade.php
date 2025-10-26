<x-app-layout>
    <div class="min-h-screen bg-blue-50 flex justify-center items-start py-10 px-4">
        <form method="POST" 
              action="{{ route('admin.buku.store') }}" 
              enctype="multipart/form-data" 
              class="w-full max-w-3xl bg-white rounded-2xl shadow-lg p-8 space-y-6 border border-blue-100">

            @csrf

            {{-- Header di dalam form --}}
            <div class="text-center mb-6">
                <h2 class="text-2xl font-semibold text-blue-800">Tambah Buku Baru</h2>
                <p class="text-gray-600 text-sm">Isi detail buku untuk menambahkannya ke koleksi perpustakaan.</p>
            </div>

            {{-- Form Buku --}}
            @include('admin.books._form')

        </form>
    </div>
</x-app-layout>
