<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailKategori extends Model
{
    use HasFactory;

    public function Kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function Product()
    {
        return $this->hasMany(DetailKategori::class);
    }
}
