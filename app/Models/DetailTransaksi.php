<?php

namespace App\Models;

use App\Models\Keranjang;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailTransaksi extends Model
{
    use HasFactory;

    public function Transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    public function Keranjang()
    {
        return $this->belongsTo(Keranjang::class);
    }
}
