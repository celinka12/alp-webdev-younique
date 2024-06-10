@extends('layouts.user.user')

@section('content')
    <style>
        .cart_product_img {
            display: flex;
            align-items: center;
            /* Memusatkan vertikal */
        }

        .cart_product_img .product-info {
            display: flex;
            align-items: center;
            /* Memusatkan vertikal */
        }

        .cart_product_img img {
            margin-right: 20px;
            /* Spasi antara gambar dan teks */
            width: 100px;
            height: 100px;
        }
    </style>
    <!-- ****** Cart Area Start ****** -->
    <div class="cart_area section_padding_100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table clearfix">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th style="width:40%">Product</th>
                                    <th style="width:25%">Price</th>
                                    <th style="width:20%">Quantity</th>
                                    <th style="width:30%">Total</th>
                                    <th style="width:40%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total_keseluruhan = 0;
                                @endphp
                                @foreach ($keranjangs as $keranjang)
                                    <tr>
                                        <td class="cart_product_img d-flex align-items-center">
                                            <img src="{{ asset('assets/images/product/' . $keranjang->Product->image_product) }}"
                                                class="img-fluid" alt="Product">
                                            <h6>{{ $keranjang->Product->nama_product }}</h6>
                                        </td>
                                        <td class="price"><span>Rp.
                                                {{ number_format($keranjang->Product->harga_product, 0, ',', '.') }}</span>
                                        </td>
                                        <td class="qty">
                                            <div class="quantity">
                                                <span class="qty-minus"
                                                    onclick="updateJumlah({{ $keranjang->id }}, {{ $keranjang->qty - 1 }});
                                                    var effect = document.getElementById('qty'); var qty = parseInt(effect.value);
                                                    if(!isNaN(qty) && qty > 1) effect.value = qty - 1; return false;">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </span>
                                                <input type="number" class="qty-text" id="qty" step="1"
                                                    min="1" max="{{ $keranjang->Product->qty_product }}"
                                                    name="quantity" value="{{ $keranjang->qty }}" readonly>
                                                <span class="qty-plus"
                                                    onclick="updateJumlah({{ $keranjang->id }}, {{ $keranjang->qty + 1 }});
                                                    var effect = document.getElementById('qty'); var qty = parseInt(effect.value);
                                                    if(!isNaN(qty)) effect.value = qty + 1; return false;">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </td>
                                        @php
                                            $total = $keranjang->Product->harga_product * $keranjang->qty;
                                            $total_keseluruhan += $total;
                                        @endphp
                                        <td><span>Rp. {{ number_format($total, 0, ',', '.') }}</span></td>
                                        <td>
                                            <form id="deleteForm{{$keranjang->id}}" action="{{ route('keranjang.destroy', $keranjang->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger mx-1"
                                                    onclick="confirmDelete({{$keranjang->id}})" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                                    data-bs-placement="top" data-bs-html="true" title="Hapus Data">
                                                    <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-trash-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="cart-footer d-flex mt-30">
                        <div class="back-to-shop w-50">
                            <a href="{{ route('shop.index') }}">Continue shopping</a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="offset-lg-8 col-lg-4">
                    <div class="cart-total-area mt-70">
                        <div class="cart-page-heading">
                            <h5>Cart total</h5>
                        </div>

                        <ul class="cart-total-chart">
                            <li><span>Subtotal</span> <span>Rp. {{ number_format($total_keseluruhan, 0, ',', '.') }}</span>
                            </li>
                            <li><span>Pengiriman</span> <span>Free</span></li>
                            <li><span><strong>Total</strong></span> <span><strong>Rp.
                                        {{ number_format($total_keseluruhan, 0, ',', '.') }}</strong></span></li>
                        </ul>
                        <a href="{{ route('checkout.index') }}" class="btn karl-checkout-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ****** Cart Area End ****** -->

    <script>
        function updateJumlah(id, qty) {
            if (qty === 0) {
                Swal.fire({
                    icon: "warning",
                    title: "Qty tidak boleh kurang dari 1",
                });
                return;
            }
            $.ajax({
                url: "{{ route('keranjang.updateJumlah') }}",
                type: 'POST',
                data: {
                    id: id,
                    qty: qty,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }


        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm' + id).submit();
                }
            });
        }
    </script>
@endsection
