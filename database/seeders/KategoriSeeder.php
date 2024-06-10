<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create([
            'nama_kategori' => 'skincare',
        ]);

        Kategori::create([
            'nama_kategori' => 'makeup',
        ]);

        Kategori::create([
            'nama_kategori' => 'body care',
        ]);
    }
}
