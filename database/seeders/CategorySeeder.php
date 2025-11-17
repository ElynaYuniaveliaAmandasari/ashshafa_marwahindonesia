<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category; // <-- Tambahkan ini
use Illuminate\Support\Facades\DB; // <-- Tambahkan ini

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Nonaktifkan pengecekan foreign key
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Hapus data lama (sekarang diizinkan)
        DB::table('categories')->truncate();

        // Aktifkan kembali pengecekan foreign key
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Isi data baru
        Category::create(['name' => 'Umroh', 'slug' => 'umroh']);
        Category::create(['name' => 'Haji', 'slug' => 'haji']);
        Category::create(['name' => 'Umroh Plus', 'slug' => 'umroh-plus']);
        Category::create(['name' => 'Wisata Religi', 'slug' => 'wisata-religi']);
    }
}
