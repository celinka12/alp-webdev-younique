<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksis = Transaksi::with('User')->get();
        return view('admin.transaksi.index',compact('transaksis'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $transaksi = Transaksi::with('User','DetailTransaksi')->findOrFail($id);
        return view('admin.transaksi.show',compact('transaksi'));
    }
}
