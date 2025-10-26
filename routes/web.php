<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\LoanAdminController;
use App\Http\Controllers\Siswa\BookBrowseController;
use App\Http\Controllers\Siswa\LoanController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', fn() => view('welcome'));

Route::middleware(['auth','verified','role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', fn()=>view('admin.dashboard'))->name('dashboard');
    Route::resource('buku', BookController::class);
    Route::get('pinjaman', [LoanAdminController::class,'index'])->name('pinjaman.index');
    Route::patch('pinjaman/{loan}/status', [LoanAdminController::class,'updateStatus'])->name('pinjaman.status');
});

Route::middleware(['auth','verified','role:siswa'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/dashboard', fn()=>view('siswa.dashboard'))->name('dashboard');
    Route::get('buku', [BookBrowseController::class,'index'])->name('buku.index');
    Route::get('buku/{book}', [BookBrowseController::class,'show'])->name('buku.show');
    Route::post('buku/{book}/pinjam', [LoanController::class,'store'])->name('buku.pinjam');
    Route::get('pinjaman-saya', [LoanController::class,'myLoans'])->name('loans.me');
});
Route::middleware(['auth','verified'])->get('/dashboard', function () {
    $user = Auth::user();
    return redirect()->route($user && $user->role === 'admin' ? 'admin.dashboard' : 'siswa.dashboard');
})->name('dashboard');

require __DIR__.'/auth.php';
