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
    Schema::create('books', function (Blueprint $t) {
        $t->id();
        $t->string('nama');
        $t->string('kategori')->nullable();
        $t->string('gambar')->nullable();       // path file
        $t->unsignedInteger('stok')->default(0);
        $t->text('deskripsi')->nullable();
        $t->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
