<?php

namespace Database\Seeders;

use App\Models\DetailKategori;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DetailKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetailKategori::create([
            'kategori_id' => 1,
            'nama_detail_kategori' => 'toner',
        ]);

        DetailKategori::create([
            'kategori_id' => 1,
            'nama_detail_kategori' => 'serum',
        ]);

        DetailKategori::create([
            'kategori_id' => 1,
            'nama_detail_kategori' => 'essence',
        ]);

        DetailKategori::create([
            'kategori_id' => 1,
            'nama_detail_kategori' => 'moisturizer',
        ]);

        DetailKategori::create([
            'kategori_id' => 1,
            'nama_detail_kategori' => 'sunscreen',
        ]);

        DetailKategori::create([
            'kategori_id' => 1,
            'nama_detail_kategori' => 'serum',
        ]);

        DetailKategori::create([
            'kategori_id' => 2,
            'nama_detail_kategori' => 'concealer',
        ]);

        DetailKategori::create([
            'kategori_id' => 2,
            'nama_detail_kategori' => 'lipstick',
        ]);

        DetailKategori::create([
            'kategori_id' => 2,
            'nama_detail_kategori' => 'loose powder',
        ]);

        DetailKategori::create([
            'kategori_id' => 2,
            'nama_detail_kategori' => 'foundation',
        ]);

        DetailKategori::create([
            'kategori_id' => 2,
            'nama_detail_kategori' => 'blush',
        ]);

        DetailKategori::create([
            'kategori_id' => 2,
            'nama_detail_kategori' => 'cushion',
        ]);

        DetailKategori::create([
            'kategori_id' => 3,
            'nama_detail_kategori' => 'sunblock',
        ]);

        DetailKategori::create([
            'kategori_id' => 3,
            'nama_detail_kategori' => 'body wash',
        ]);

        DetailKategori::create([
            'kategori_id' => 3,
            'nama_detail_kategori' => 'body scrub',
        ]);

        DetailKategori::create([
            'kategori_id' => 3,
            'nama_detail_kategori' => 'body lotion',
        ]);

    }
}
