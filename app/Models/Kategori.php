<?php

namespace App\Models;

use App\Models\DetailKategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    public function DetailKategori()
    {
        return $this->hasMany(DetailKategori::class);
    }

    public function Product()
    {
        return $this->hasMany(DetailKategori::class);
    }
}
