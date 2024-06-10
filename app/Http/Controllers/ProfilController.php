<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::where('user_id',auth()->user()->id)->with('User')->first();
        return view('profil',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $user = User::where('id',$id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $customers = Customer::where('user_id',$user->id)->first();
        $customers->user_id = $user->id;
        $customers->no_telepon = $request->no_telepon;
        $customers->jenis_kelamin = $request->jenis_kelamin;
        $customers->provinsi = $request->provinsi;
        $customers->kota = $request->kota;
        $customers->kecamatan = $request->kecamatan;
        $customers->kodepost = $request->kodepost;
        $customers->alamat_lengkap = $request->alamat_lengkap;
        $customers->save();

        return redirect()->back()->with('success','Profil berhasil diupdate');
    }

    public function riwayatPemesanan()
    {
        $transaksis = Transaksi::where('user_id',auth()->user()->id)->get();
        return view('riwayat_pemesanan',compact('transaksis'));
    }

    public function riwayatPemesananDetail($id)
    {
        $transaksi = Transaksi::with('User','DetailTransaksi')->findOrFail($id);
        return view('riwayat_pemesanan_detail',compact('transaksi'));
    }

    public function KonfirmasiPesanan($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->status = 'selesai';
        $transaksi->save();
        return redirect()->back()->with('success','konfirmasi pesanan berhasil!!!');
    }
}
