<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller {
    public function store(Request $r, Book $book){
        $data = $r->validate([
          'jumlah'=>'required|integer|min:1',
          'tanggal_pinjam'=>'required|date',
          'tanggal_kembali'=>'required|date|after_or_equal:tanggal_pinjam',
        ]);
        // Catat peminjaman status "diproses"
        Loan::create([
          'user_id'=>Auth::user()->id,
          'book_id'=>$book->id,
          'jumlah'=>$data['jumlah'],
          'tanggal_pinjam'=>$data['tanggal_pinjam'],
          'tanggal_kembali'=>$data['tanggal_kembali'],
          'status'=>'diproses'
        ]);
        return redirect()->route('siswa.loans.me')->with('ok','Permintaan peminjaman dikirim');
    }
    public function myLoans(){
        $loans = Loan::with('book')->where('user_id',Auth::user()->id)->latest()->paginate(10);
        return view('siswa.loans.me', compact('loans'));
    }
}
