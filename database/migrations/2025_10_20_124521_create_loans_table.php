<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void {
    Schema::create('loans', function (Blueprint $t) {
        $t->id();
        $t->foreignId('user_id')->constrained()->cascadeOnDelete();
        $t->foreignId('book_id')->constrained()->cascadeOnDelete();
        $t->unsignedInteger('jumlah')->default(1);
        $t->date('tanggal_pinjam');
        $t->date('tanggal_kembali');
        $t->enum('status', ['diproses','dipinjam','dikembalikan'])->default('diproses');
        $t->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
