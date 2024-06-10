<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function index(){
        $products = Product::paginate(10);
        $kategoris = Kategori::with('DetailKategori')->get();
        return view('shop.shop',compact('products','kategoris'));
    }

    public function show($id){
        $product = Product::findOrFail($id);
        return view('shop.shop_detail',compact('product'));
    }
}
