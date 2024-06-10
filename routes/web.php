<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DetailKategoriController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

Route::resource('shop', ShopController::class);

Route::middleware(['auth'])->group(function () {
    Route::resource('keranjang', KeranjangController::class);
    Route::post('keranjang/updateJumlah', [KeranjangController::class,'updateJumlah'])->name('keranjang.updateJumlah');
    Route::resource('wishlist', WishlistController::class);
    Route::resource('profil', ProfilController::class);
    Route::get('riwayat_pemesanan', [ProfilController::class,'riwayatPemesanan'])->name('profil.riwayatPemesanan');
    Route::get('riwayat_pemesanan_detail/{id}', [ProfilController::class,'riwayatPemesananDetail'])->name('profil.riwayatPemesananDetail');
    Route::post('konfirmasi_pesanan/{id}', [ProfilController::class,'konfirmasiPesanan'])->name('profil.KonfirmasiPesanan');
    Route::resource('checkout', CheckoutController::class);
});


Route::prefix('admin')->group(function () {
    Route::get('/login', function () {
        return view('auth.login_admin');
    });
    Route::middleware(['auth','isAdmin'])->group(function () {
        Route::get('/dashboard',DashboardController::class)->name('admin.dashboard');
        Route::resource('kategori', KategoriController::class);
        Route::resource('detail_kategori', DetailKategoriController::class);
        Route::resource('product', ProductController::class);
        Route::resource('customer', CustomerController::class);
        Route::get('product/getDetailKategori/{id}', [ProductController::class, 'getDetailKategori'])->name('product.getDetailKategori');
        Route::resource('transaksi', TransaksiController::class);
    });
});

Auth::routes();
