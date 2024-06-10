@extends('layouts.user.user')

@section('content')
    <!-- ****** Checkout Area Start ****** -->
    <div class="checkout_area section_padding_100">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading">
                            <h5>Billing Address</h5>
                        </div>

                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" style="height: 52px"
                                        value="{{ $customer->User->name }}" readonly>
                                </div>
                                <div class="col-12 mb-3">
                                    <label>No Telepon</label>
                                    <input type="text" class="form-control" style="height: 52px"
                                        value="{{ $customer->no_telepon }}" readonly>
                                </div>
                                <div class="col-12 mb-3">
                                    <label>Email</label>
                                    <input type="text" class="form-control" style="height: 52px"
                                        value="{{ $customer->User->email }}" readonly>
                                </div>
                                <div class="col-12 mb-3">
                                    <label>Provinsi</label>
                                    <input type="text" class="form-control" style="height: 52px"
                                        value="{{ $customer->provinsi }}" readonly>
                                </div>
                                <div class="col-12 mb-3">
                                    <label>Kota</label>
                                    <input type="text" class="form-control" style="height: 52px"
                                        value="{{ $customer->kota }}" readonly>
                                </div>
                                <div class="col-12 mb-3">
                                    <label>Kecamatan</label>
                                    <input type="text" class="form-control" style="height: 52px"
                                        value="{{ $customer->kecamatan }}" readonly>
                                </div>
                                <div class="col-12 mb-3">
                                    <label>Kodepost</label>
                                    <input type="text" class="form-control" style="height: 52px"
                                        value="{{ $customer->kodepost }}" readonly>
                                </div>
                                <div class="col-12 mb-3">
                                    <label>Alamat Lengkap</label>
                                    <textarea name="" class="form-control" id="" rows="5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex minima voluptatibus beatae adipisci asperiores ea quam iusto? Optio, odio soluta.</textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Your Order</h5>
                        </div>

                        <ul class="order-details-form mb-4">
                            <li><span>Product</span> <span>Total</span></li>

                            @php
                                $total_keseluruhan = 0;
                            @endphp
                            @foreach ($keranjangs as $keranjang)
                                @php
                                    $total = $keranjang->Product->harga_product * $keranjang->qty;
                                    $total_keseluruhan += $total;
                                @endphp
                                <li><span>{{ $keranjang->Product->nama_product }}</span><span>x
                                        {{ $keranjang->qty }}</span><span>Rp.
                                        {{ number_format($total, 0, ',', '.') }}</span></li>
                            @endforeach
                            <li><span>Subtotal</span><span>Rp. {{ number_format($total_keseluruhan, 0, ',', '.') }}</span></li>
                            <li><span>Shipping</span> <span>Free</span></li>
                            <li><span>Total</span> <span>Rp. {{ number_format($total_keseluruhan, 0, ',', '.') }}</span></li>
                        </ul>

                        <form action="{{route('checkout.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="total_harga" value="{{$total_keseluruhan}}">
                            <button type="submit" class="btn karl-checkout-btn">Place Order</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ****** Checkout Area End ****** -->
@endsection
