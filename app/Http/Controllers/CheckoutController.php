<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use App\Models\Keranjang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::where('user_id',auth()->user()->id)->with('User')->first();
        $keranjangs = Keranjang::with('Product')->where('user_id',auth()->user()->id)->where('status','keranjang')->get();
        return view('checkout',compact('customer','keranjangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kode_transaksis = DB::table('transaksis')->select(DB::raw('MAX(RIGHT(kode_transaksi,3)) as kode'))->first();
        if ($kode_transaksis) {
            $x = (int) $kode_transaksis->kode + 1;
            $kode = sprintf('%03d', $x);
        } else {
            $kode = '001';
        }

        $transaksi = new Transaksi();
        $transaksi->kode_transaksi = 'YNQ-' . date('dmy') . $kode;
        $transaksi->user_id = $request->user_id;
        $transaksi->total_harga = $request->total_harga;
        $transaksi->status = 'proses';
        $transaksi->save();

        $keranjangs = Keranjang::where('user_id',$request->user_id)->where('status','keranjang')->get();
        foreach($keranjangs as $keranjang){
            $detailTransaksi = new DetailTransaksi();
            $detailTransaksi->transaksi_id = $transaksi->id;
            $detailTransaksi->keranjang_id = $keranjang->id;
            $detailTransaksi->save();

            $product = Product::findOrFail($keranjang->product_id);
            $product->qty_product -= $keranjang->qty;
            $product->save();

            $keranjang = Keranjang::findOrFail($keranjang->id);
            $keranjang->status = 'checkout';
            $keranjang->save();
        }

        return redirect()->route('profil.riwayatPemesanan')->with('success','Pemesanan Berhasil');
    }
}
