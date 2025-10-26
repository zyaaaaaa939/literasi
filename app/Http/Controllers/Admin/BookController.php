<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    // ===============================
    //  TAMPILKAN DAFTAR BUKU
    // ===============================
    public function index()
    {
        $books = Book::latest()->paginate(10);
        return view('admin.books.index', compact('books'));
    }

    // ===============================
    //  FORM TAMBAH BUKU
    // ===============================
    public function create()
    {
        return view('admin.books.create');
    }

    // ===============================
    //  SIMPAN DATA BUKU BARU
    // ===============================
    public function store(Request $r)
    {
        $data = $r->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string'
        ]);

        if ($r->hasFile('gambar')) {
            $data['gambar'] = $r->file('gambar')->store('books', 'public');
        }

        Book::create($data);

        return redirect()->route('admin.buku.index')->with('ok', 'Buku berhasil ditambahkan.');
    }

    // ===============================
    //  FORM EDIT BUKU
    // ===============================
   public function edit(Book $buku)
{
    return view('admin.books.edit', ['book' => $buku]);

}


    // ===============================
    //  UPDATE DATA BUKU
    // ===============================
    public function update(Request $r, Book $book)
    {
        $data = $r->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string'
        ]);

        // Hapus gambar jika diminta
        if ($r->boolean('hapus_gambar') && $book->gambar) {
            Storage::disk('public')->delete($book->gambar);
            $data['gambar'] = null;
        }

        // Update gambar jika diunggah ulang
        if ($r->hasFile('gambar')) {
            if ($book->gambar) {
                Storage::disk('public')->delete($book->gambar);
            }
            $data['gambar'] = $r->file('gambar')->store('books', 'public');
        }

        $book->update($data);

        return redirect()->route('admin.buku.index')->with('ok', 'Buku berhasil diperbarui.');
    }

    // ===============================
    //  HAPUS DATA BUKU
    // ===============================
    public function destroy(Book $book)
    {
      
        if ($book->loans()->whereIn('status', ['diproses', 'dipinjam'])->exists()) {
            return redirect()->route('admin.buku.index')
                ->with('err', 'Tidak bisa menghapus buku: masih ada pinjaman aktif.');
        }

        if ($book->gambar) {
            Storage::disk('public')->delete($book->gambar);
        }

        $nama = $book->nama;
        $book->delete();

        return redirect()->route('admin.buku.index')->with('ok', "Buku \"$nama\" berhasil dihapus.");
    }
}
