<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\DetailKategori;
use App\Http\Controllers\Controller;

class DetailKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detailKategoris = DetailKategori::with('Kategori')->get();
        return view('admin.detail_kategori.index',compact('detailKategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.detail_kategori.create',compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required',
            'nama_detail_kategori' => 'required'
        ]);

        $detailKategori = new DetailKategori();
        $detailKategori->kategori_id = $request->kategori_id;
        $detailKategori->nama_detail_kategori = $request->nama_detail_kategori;
        $detailKategori->save();
        return redirect()->route('kategori.index')->with('success', 'Detail Kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailKategori $detailKategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategoris = Kategori::all();
        $detailKategori = DetailKategori::findOrFail($id);
        return view('admin.detail_kategori.edit',compact('kategoris','detailKategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kategori_id' => 'required',
            'nama_detail_kategori' => 'required'
        ]);

        $detailKategori = DetailKategori::findOrFail($id);
        $detailKategori->kategori_id = $request->kategori_id;
        $detailKategori->nama_detail_kategori = $request->nama_detail_kategori;
        $detailKategori->save();
        return redirect()->route('kategori.index')->with('success', 'Detail Kategori berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $detailKategori = DetailKategori::findOrFail($id);
        $detailKategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Detail Kategori berhasil dihapus');
    }
}
