<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $total_customer = Customer::count();
        $total_product = Product::count();
        $total_penjualan = Transaksi::count();
        $total_pendapatan = Transaksi::sum('total_harga');
        $total_pendapatan_bulan = [];
        for($i = 1; $i <= 12; $i++){
            $total_pendapatan_bulan[$i] = Transaksi::whereMonth('created_at', $i)->count();
        }
        return view('admin.dashboard',compact('total_customer','total_product','total_penjualan','total_pendapatan','total_pendapatan_bulan'));
    }
}
