<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\DetailKategori;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('Kategori','DetailKategori')->get();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.product.create',compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required',
            'detail_kategori_id' => 'required',
            'nama_product' => 'required',
            'harga_product' => 'required',
            'qty_product' => 'required',
            'deskripsi_product' => 'required',
            'image_product' => 'required'
        ]);

        $imageName = time() . '.' . $request->image_product->extension(); // Buat nama unik untuk gambar

        $request->image_product->move(public_path('assets/images/product'), $imageName); // Pindahkan gambar ke direktori yang ditentukan

        $kode_products = DB::table('products')->select(DB::raw('MAX(RIGHT(kode_product,4)) as kode'))->first();
        if ($kode_products) {
            $x = (int) $kode_products->kode + 1;
            $kode = sprintf('%04d', $x);
        } else {
            $kode = '0001';
        }

        $product = new Product();
        $product->kode_product = 'PD'. $kode;
        $product->kategori_id = $request->kategori_id;
        $product->detail_kategori_id = $request->detail_kategori_id;
        $product->nama_product = $request->nama_product;
        $product->harga_product = $request->harga_product;
        $product->qty_product = $request->qty_product;
        $product->deskripsi_product = $request->deskripsi_product;
        $product->image_product = $imageName;
        $product->save();


        return redirect()->route('product.index')->with('success', 'Product berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::with('Kategori','DetailKategori')->findOrFail($id);
        return view('admin.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $kategoris = Kategori::all();
        $detailKategoris = DetailKategori::where('kategori_id', $product->kategori_id)->get();
        return view('admin.product.edit',compact('kategoris','product','detailKategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kategori_id' => 'required',
            'detail_kategori_id' => 'required',
            'nama_product' => 'required',
            'harga_product' => 'required',
            'qty_product' => 'required',
            'deskripsi_product' => 'required'
        ]);

        $product = Product::findOrFail($id);
        $product->kategori_id = $request->kategori_id;
        $product->detail_kategori_id = $request->detail_kategori_id;
        $product->nama_product = $request->nama_product;
        $product->harga_product = $request->harga_product;
        $product->qty_product = $request->qty_product;
        $product->deskripsi_product = $request->deskripsi_product;
        if($request->image_product) {
            if (file_exists(public_path('assets/images/product/' . $product->image_product))) {
                unlink(public_path('assets/images/product/' . $product->image_product));
            }
            $imageName = time() . '.' . $request->image_product->extension(); // Buat nama unik untuk gambar
            $request->image_product->move(public_path('assets/images/product'), $imageName); // Pindahkan gambar ke direktori yang ditentukan
            $product->image_product = $imageName;
        }
        $product->save();


        return redirect()->route('product.index')->with('success', 'Product berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if (file_exists(public_path('assets/images/product/' . $product->image_product))) {
            unlink(public_path('assets/images/product/' . $product->image_product));
        }
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product berhasil dihapus');
    }

    public function getDetailKategori($id)
    {
        $detail_kategoris = DetailKategori::where('kategori_id', $id)->get();
        return response()->json($detail_kategoris);
    }
}
