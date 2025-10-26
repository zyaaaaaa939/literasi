<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookBrowseController extends Controller {
    public function index(){
        // hanya buku yang stok > 0
        $books = Book::where('stok','>',0)->latest()->paginate(12);
        return view('siswa.books.index', compact('books'));
    }
    public function show(Book $book){ return view('siswa.books.show', compact('book')); }
}
