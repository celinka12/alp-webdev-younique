<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $keranjangs = Keranjang::with('Product')->where('user_id',auth()->user()->id)->where('status','keranjang')->get();
        return view('keranjang',compact('keranjangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $cek_keranjang = Keranjang::where('user_id', $request->user_id)->where('product_id', $request->product_id)->first();

        if($cek_keranjang) {
            $cek_keranjang->qty += $request->qty;
            $cek_keranjang->save();
        } else {
            $keranjang = new Keranjang();
            $keranjang->user_id = $request->user_id;
            $keranjang->product_id = $request->product_id;
            $keranjang->qty = $request->qty;
            $keranjang->save();
        }


        return redirect()->back()->with('success','Berhasil ditambahkan');
    }


    /**
     * Update the specified resource in storage.
     */
    public function updateJumlah(Request $request)
    {
        // Ambil data dari post
        $id = $request->id;
        $qty = $request->qty;

        $keranjang = Keranjang::findOrFail($id);
        $keranjang->qty = $qty;
        $keranjang->save();

        return response()->json("Data Berhasil di update");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $keranjang = Keranjang::findOrFail($id);
        $keranjang->delete();

        return redirect()->route('keranjang.index');
    }
}
