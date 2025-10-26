<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Book;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        // === BUAT DATA USER ===
        User::create([
            'name' => 'Admin Perpus',
            'email' => 'admin@demo.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Siswa Demo',
            'email' => 'siswa@demo.test',
            'password' => Hash::make('password'),
            'role' => 'siswa',
        ]);

        // === BUAT DATA BUKU ===
        Book::create([
            'nama' => 'Algoritma & Pemrograman',
            'kategori' => 'Teknik',
            'stok' => 5,
            'deskripsi' => 'Buku ini membahas dasar algoritma dan logika pemrograman menggunakan bahasa C dan Python.',
            'gambar' => null,
        ]);

        Book::create([
            'nama' => 'Pemrograman Web Laravel',
            'kategori' => 'Teknik Informatika',
            'stok' => 3,
            'deskripsi' => 'Panduan praktis membangun aplikasi web menggunakan framework Laravel.',
            'gambar' => null,
        ]);

        Book::create([
            'nama' => 'Matematika Diskrit',
            'kategori' => 'Matematika',
            'stok' => 7,
            'deskripsi' => 'Konsep dasar matematika diskrit untuk mahasiswa teknik informatika.',
            'gambar' => null,
        ]);

        Book::create([
            'nama' => 'Sejarah Nusantara',
            'kategori' => 'Sejarah',
            'stok' => 4,
            'deskripsi' => 'Membahas perkembangan sejarah kerajaan-kerajaan di Indonesia.',
            'gambar' => null,
        ]);

        Book::create([
            'nama' => 'Bahasa Inggris untuk Pemula',
            'kategori' => 'Bahasa',
            'stok' => 6,
            'deskripsi' => 'Materi dasar bahasa Inggris untuk tingkat pemula.',
            'gambar' => null,
        ]);

        echo "✅ Seeder berhasil dijalankan: 2 user + 5 buku dimasukkan.\n";
        echo "🔑 Login akun admin: admin@demo.test / password\n";
        echo "👨‍🎓 Login akun siswa: siswa@demo.test / password\n";
    }
}
