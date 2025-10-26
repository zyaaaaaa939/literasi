@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-gradient-to-b from-blue-900 via-blue-950 to-blue-900 min-h-screen">
    <h1 class="text-4xl font-bold text-white mb-3">
        Selamat datang, {{ Auth::user()->name }}
    </h1>
    <p class="text-blue-200 mb-8">Temukan dan pinjam buku favoritmu di sini.</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($buku as $item)
            <div class="bg-blue-800/70 backdrop-blur-sm p-5 rounded-2xl shadow-lg border border-blue-700 
                        hover:shadow-xl hover:-translate-y-1 transition duration-300 ease-in-out">
                <h2 class="text-xl font-semibold text-white mb-2">{{ $item->judul }}</h2>
                <p class="text-blue-200 text-sm mb-1">Penulis: <span class="text-blue-100">{{ $item->penulis }}</span></p>
                <p class="text-blue-300 text-xs">Kategori: <span class="text-blue-100">{{ $item->kategori ?? '-' }}</span></p>
            </div>
        @endforeach
    </div>

    @if ($buku->isEmpty())
        <p class="text-blue-300 italic mt-6 text-center">Belum ada data buku untuk saat ini</p>
    @endif
</div>
@endsection
