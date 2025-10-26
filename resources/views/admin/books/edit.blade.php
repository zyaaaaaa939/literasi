<x-app-layout>
    <div class="min-h-screen bg-blue-50 flex justify-center items-start py-10 px-4">
        <form method="POST" 
              action="{{ route('admin.buku.update', $book->id) }}" 
              enctype="multipart/form-data"
              class="w-full max-w-3xl bg-white rounded-2xl shadow-lg p-8 space-y-6 border border-blue-100">

            @csrf
            @method('PUT')

            {{-- Header di dalam form --}}
            <div class="text-center mb-6">
                <h2 class="text-2xl font-semibold text-blue-800">Edit Buku</h2>
                <p class="text-gray-600 text-sm">Perbarui data buku sesuai kebutuhan, lalu simpan perubahan.</p>
            </div>

            {{-- Form Buku --}}
            @include('admin.books._form', ['book' => $book])
        </form>
    </div>
</x-app-layout>
