<?php

namespace App\Models;

use App\Models\Product;
use App\Models\DetailKategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keranjang extends Model
{
    use HasFactory;

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }

    public function DetailKategori()
    {
        return $this->hasMany(DetailKategori::class);
    }
}
