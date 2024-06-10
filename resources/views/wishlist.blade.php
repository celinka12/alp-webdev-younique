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
            margin-right: 10px;
            /* Spasi antara gambar dan teks */
            width: 100px;
            height: 100px;
        }

        .btn-shop {
            background-color: #ff084e;
            color: #fff;
        }

        .btn-shop:hover,
        .btn-shop:focus {
            background-color: #3a3a3a;
            color: #fff;
        }
    </style>
    <div class="cart_area section_padding_100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table clearfix">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th style="width:60%">Product</th>
                                    <th style="width:40%">Price</th>
                                    <th style="width:40%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wishlists as $wishlist)
                                    <tr>
                                        <td class="cart_product_img">
                                            <img src="{{ asset('assets/images/product/' . $wishlist->Product->image_product) }}"
                                                class="img-fluid" alt="Product">
                                            <h6>{{ $wishlist->Product->nama_product }}</h6>
                                        </td>
                                        <td class="price"><span>Rp.
                                                {{ number_format($wishlist->Product->harga_product, 0, ',', '.') }}</span>
                                        </td>
                                        <td>
                                            <form id="deleteForm{{$wishlist->id}}" action="{{ route('wishlist.destroy', $wishlist->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger mx-1"
                                                    onclick="confirmDelete({{$wishlist->id}})" data-bs-toggle="tooltip" data-bs-offset="0,4"
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
                        <a href="{{ route('shop.index') }}" class="btn btn-shop">Continue shopping</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
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
