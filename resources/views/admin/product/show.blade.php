@extends('layouts.admin.admin')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4 shadow-lg rounded card p-2">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Show Product</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <input type="text" name="nama_product" class="form-control mb-2"
                                    value="{{ $product->Kategori->nama_kategori }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Detail Kategori</label>
                                <input type="text" name="nama_product" class="form-control mb-2"
                                    value="{{ $product->DetailKategori->nama_detail_kategori }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Nama Product</label>
                                <input type="text" name="nama_product" class="form-control mb-2"
                                    value="{{ $product->nama_product }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Harga Product</label>
                                <input type="number" name="harga_product" class="form-control mb-2"
                                    value="{{ $product->harga_product }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">QTY Product</label>
                                <input type="number" name="qty_product" class="form-control mb-2"
                                    value="{{ $product->qty_product }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Deskripsi Product</label>
                                <textarea name="deskripsi_product" class="form-control mb-2" id="" cols="30" rows="10" readonly>{{ $product->deskripsi_product }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label">Image Product</label>
                        </div>
                        <div class="col-12">
                            <img src="{{ asset('assets/images/product/' . $product->image_product) }}" style="width:200px"
                                alt="Image Product" class="img-fluid mb-3">
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex float-start">
                <a href="{{ route('product.index') }}" class="btn btn-danger me-3"><svg xmlns="http://www.w3.org/2000/svg"
                        width="20" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
                    </svg> Kembali</a>
            </div>
        </div>
    </div>
@endsection
