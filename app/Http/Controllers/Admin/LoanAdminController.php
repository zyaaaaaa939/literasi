<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanAdminController extends Controller {
    public function index(){
        $loans = Loan::with(['user','book'])->latest()->paginate(15);
        return view('admin.loans.index', compact('loans'));
    }

    // ubah status: diproses -> dipinjam (kurangi stok), -> dikembalikan (tambah stok)
    public function updateStatus(Request $r, Loan $loan){
        $r->validate(['status'=>'required|in:diproses,dipinjam,dikembalikan']);
        $new = $r->status;
        if($loan->status !== $new){
            if($loan->status!=='dipinjam' && $new==='dipinjam'){
                // approve: kurangi stok jika cukup
                if($loan->book->stok < $loan->jumlah) return back()->with('err','Stok tidak cukup');
                $loan->book->decrement('stok', $loan->jumlah);
            }
            if($loan->status==='dipinjam' && $new==='dikembalikan'){
                // pengembalian: kembalikan stok
                $loan->book->increment('stok', $loan->jumlah);
            }
            $loan->update(['status'=>$new]);
        }
        return back()->with('ok','Status diperbarui');
    }
}