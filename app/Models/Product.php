<?php

namespace App\Models;

use App\Models\Kategori;
use App\Models\Wishlist;
use App\Models\Keranjang;
use App\Models\DetailKategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public function Kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function DetailKategori()
    {
        return $this->belongsTo(DetailKategori::class);
    }

    public function Wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function Keranjang()
    {
        return $this->hasMany(Keranjang::class);
    }
}
