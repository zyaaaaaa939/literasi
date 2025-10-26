<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {
    protected $fillable = ['nama','kategori','gambar','stok','deskripsi'];
    public function loans(){ return $this->hasMany(Loan::class); }
}
