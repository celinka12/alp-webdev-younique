@extends('layouts.user.user')

@section('content')
    <!-- <<<<<<<<<<<<<<<<<<<< Breadcumb Area Start <<<<<<<<<<<<<<<<<<<< -->
    <div class="breadcumb_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb d-flex align-items-center">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('shop.index') }}">Shop</a></li>
                        <li class="breadcrumb-item active">{{ $product->nama_product }}</li>
                    </ol>
                    <a href="{{ route('shop.index') }}" class="backToHome d-block"><i class="fa fa-angle-double-left"></i>
                        Back to Shop</a>
                </div>
            </div>
        </div>
    </div>
    <!-- <<<<<<<<<<<<<<<<<<<< Breadcumb Area End <<<<<<<<<<<<<<<<<<<< -->

    <section class="single_product_details_area section_padding_0_100">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="single_product_thumb">
                        <img src="{{ asset('assets/images/product/' . $product->image_product) }}" class="img-fluid"
                            style="width:400px;height:400px" alt="" srcset="">
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="single_product_desc">

                        <h4 class="title"><a href="#">{{ $product->nama_product }}</a></h4>

                        <h4 class="price">Rp.{{ number_format($product->harga_product, 0, ',', '.') }}</h4>

                        <p>{{ $product->deskripsi_product }}</p>

                        <!-- Add to Cart Form -->
                        <form class="cart clearfix mb-50 d-flex" method="POST" action="{{ route('keranjang.store') }}">
                            @csrf
                            <div class="quantity">
                                <span class="qty-minus"
                                    onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i
                                        class="fa fa-minus" aria-hidden="true"></i></span>
                                <input type="number" class="qty-text" id="qty" step="1" min="1"
                                    max="{{$product->qty_product}}" name="qty" value="1">
                                <span class="qty-plus"
                                    onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i
                                        class="fa fa-plus" aria-hidden="true"></i></span>
                            </div>
                            @if (Auth::check())
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <button type="submit" name="addtocart" value="5" class="btn cart-submit d-block">Add
                                    to cart</button>
                            @else
                                <a href="{{ route('login') }}" class="btn cart-submit" style="padding-top: 13px">Add
                                    to cart</a>
                            @endif
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "{{ session('success') }}",
            });
        </script>
    @endif
@endsection
