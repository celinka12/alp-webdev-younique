@extends('layouts.user.user')

@section('content')
    <style>
        .btn-shop {
            background-color: #ff084e;
            color: #fff;
        }

        .btn-shop:hover,
        .btn-shop:focus {
            background-color: #3a3a3a;
            color: #fff;
        }

        .btn-wishlist {
            background-color: #3a3a3a;
            color: #fff;
        }

        .btn-wishlist-check {
            background-color: #ff084e;
            color: #fff;
        }

        .btn-wishlist:hover,
        .btn-wishlist:focus {
            background-color: #ff084e;
            color: #fff;
        }

        input[type="checkbox"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            width: 1.3em;
            height: 1.3em;
            border: 2px solid #ccc;
            border-radius: 4px;
            margin-right: 0.5em;
            vertical-align: middle;
        }

        input[type="checkbox"]:checked {
            background-color: #ff084e;
        }
    </style>

    <section class="shop_grid_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">

                        <div class="widget catagory mb-50">
                            <!--  Side Nav  -->
                            <div class="nav-side-menu">
                                <h6 class="mb-0">Catagories</h6>
                                <div class="menu-list">
                                    <ul id="menu-content2" class="menu-content collapse out">
                                        <li class="my-2">
                                            <input type="checkbox" id="all_categories" data-category="all">
                                            <label for="all_categories">All Categories</label>
                                        </li>
                                        @foreach ($kategoris as $kategori)
                                            <li class="my-2">
                                                <input type="checkbox" id="category_{{ $kategori->id }}"
                                                    data-category="{{ $kategori->id }}">
                                                <label data-toggle="collapse" class="collapsed"
                                                    data-target="#kategori_{{ $kategori->id }}">{{ $kategori->nama_kategori }}</label>
                                                <ul class="sub-menu collapse" id="kategori_{{ $kategori->id }}">
                                                    @foreach ($kategori->DetailKategori as $detailKategori)
                                                        <li class="my-2">
                                                            <input type="checkbox"
                                                                id="subcategory_{{ $detailKategori->id }}"
                                                                data-subcategory="{{ $detailKategori->id }}">
                                                            <label
                                                                for="subcategory_{{ $detailKategori->id }}">{{ $detailKategori->nama_detail_kategori }}</label>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="widget price mb-50">
                            <h6 class="widget-title mb-30">Filter by Price</h6>
                            <div class="widget-desc">
                                <div class="slider-range">
                                    <div data-min="0" data-max="500000" data-unit="Rp: "
                                        class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                                        data-value-min="0" data-value-max="50000" data-label-result="Price: ">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    </div>
                                    <div class="range-price">Price: Rp: 0 - Rp: 100000</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig"
                                    data-category="{{ $product->kategori_id }}"
                                    data-subcategory="{{ $product->detail_kategori_id }}"
                                    data-price="{{ $product->harga_product }}" data-wow-delay="0.2s">

                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img src="{{ asset('assets/images/product/' . $product->image_product) }}"
                                            class="img-fluid" style="width: 250px; height:300px;" alt="Image Product">
                                    </div>
                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <h4 class="product-price">
                                            Rp.{{ number_format($product->harga_product, 0, ',', '.') }}</h4>
                                        <p>{{ $product->nama_product }}</p>
                                        <!-- Add to Cart -->
                                        <a href="{{ route('shop.show', $product->id) }}"
                                            class="btn-shop btn mt-3 mb-3">Detail Product</a>
                                        <!-- Wishlist -->
                                        @if (Auth::check())
                                            @php
                                                $wishlist = App\Models\Wishlist::where('user_id', Auth::user()->id)
                                                    ->where('product_id', $product->id)
                                                    ->first();
                                            @endphp
                                            @if ($wishlist)
                                                <button class="btn btn-wishlist-check"><i class="ti-heart"></i></button>
                                            @else
                                                <button id="wishlist_{{ $product->id }}"
                                                    onclick="addWishlist({{ Auth::user()->id }}, {{ $product->id }})"
                                                    class="btn btn-wishlist"><i class="ti-heart"></i></button>
                                                <button id="wishlist_check_{{ $product->id }}"
                                                    class="btn btn-wishlist-check" style="display: none;"><i
                                                        class="ti-heart"></i></button>
                                            @endif
                                        @else
                                            <a href="{{ route('login') }}" class="btn btn-wishlist"><i
                                                    class="ti-heart"></i></a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- <div class="pagination-area mt-50">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                {{ $products->links() }}
                            </ul>
                        </nav>
                    </div> --}}
                    <!-- Pagination -->
                    <div class="shop_pagination_area wow fadeInUp" data-wow-delay="1.1s">
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm">
                                {{-- Tampilkan link pagination secara manual --}}
                                @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                    @if ($page == $products->currentPage())
                                        <li class="page-item active"><span class="page-link">{{ $page }}</span>
                                        </li>
                                    @else
                                        <li class="page-item"><a class="page-link"
                                                href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function addWishlist(userId, productId) {
            $.ajax({
                type: 'POST',
                url: "{{ route('wishlist.store') }}",
                data: {
                    user_id: userId,
                    product_id: productId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    // Tangani respons dari server di sini
                    console.log(response); // Contoh: menampilkan respons ke konsol
                    $('#wishlist_check_' + productId).show();
                    $('#wishlist_' + productId).hide();

                    var currentQuantity = parseInt($('.wishlist_quantity').text());
                    $('.wishlist_quantity').text(currentQuantity + 1);

                    Swal.fire({
                        title: 'Product di tambahkan ke wishlist',
                        icon: 'success',
                        position: 'top-end',
                        showConfirmButton: false,
                        toast: true, // Aktifkan toast
                        timer: 3000 // Durasi toast (ms)
                    });

                },
                error: function(xhr, status, error) {
                    // Tangani kesalahan di sini
                    console.error(xhr.responseText); // Contoh: menampilkan pesan kesalahan ke konsol
                }
            });
        }


        $(document).ready(function() {
            $('input[type="checkbox"]').change(function() {
                var allCategoriesChecked = $('#all_categories').is(':checked');

                if (allCategoriesChecked) {
                    // Jika "All Categories" dipilih, tampilkan semua produk
                    $('.single_gallery_item').show();
                    return; // Keluar dari fungsi setelah menampilkan semua produk
                }

                var selectedCategories = [];
                $('input[type="checkbox"]:checked').each(function() {
                    selectedCategories.push($(this).data('category'));
                });

                if (selectedCategories.length === 0) {
                    // Jika tidak ada kategori yang dipilih, tampilkan semua produk
                    $('.single_gallery_item-menu').show();
                } else {
                    // Sembunyikan semua produk, kemudian tampilkan yang sesuai dengan kategori yang dipilih
                    $('.single_gallery_item').hide();
                    selectedCategories.forEach(function(categoryId) {
                        $('.single_gallery_item[data-category="' + categoryId + '"]')
                            .show(); // Perbaikan disini
                    });
                }

                var selectedSubcategories = [];
                // Memeriksa checkbox subkategori yang dipilih
                $('input[data-subcategory]:checked').each(function() {
                    selectedSubcategories.push($(this).data('subcategory'));
                });

                if (selectedSubcategories.length === 0) {
                    // Jika tidak ada kategori yang dipilih, tampilkan semua produk
                    $('.single_gallery_item-menu').show();
                } else {
                    // Sembunyikan semua produk, kemudian tampilkan yang sesuai dengan kategori yang dipilih
                    $('.single_gallery_item').hide();
                    selectedSubcategories.forEach(function(subcategoryId) {
                        $('.single_gallery_item[data-subcategory="' + subcategoryId + '"]')
                            .show(); // Perbaikan disini
                    });
                }

                // Jika tidak ada kategori yang dipilih, tampilkan semua produk
                if (selectedCategories.length === 0 && selectedSubcategories.length === 0) {
                    $('.single_gallery_item').show();
                    return; // Keluar dari fungsi setelah menampilkan semua produk
                }
            });


        });

        function filterProductsByPrice(minPrice, maxPrice) {
            // Memeriksa apakah ada kategori atau subkategori yang dipilih
            var categoriesSelected = $('input[type="checkbox"]:checked').length > 0;
            var subcategoriesSelected = $('input[data-subcategory]:checked').length > 0;

            // Jika kategori dan subkategori dipilih, tampilkan semua produk
            if (categoriesSelected && subcategoriesSelected) {
                $('.single_gallery_item').show();
                return;
            }

            // Memfilter produk berdasarkan harga dan kriteria lainnya
            $('.single_gallery_item').each(function() {
                var price = parseInt($(this).data('price'));
                var categoryMatch = true;
                var subcategoryMatch = true;

                // Memeriksa kategori yang dipilih (jika ada)
                if (categoriesSelected) {
                    var selectedCategories = [];
                    $('input[type="checkbox"]:checked').each(function() {
                        selectedCategories.push($(this).data('category'));
                    });
                    var categoryId = $(this).data('category');
                    categoryMatch = selectedCategories.includes(categoryId);
                }

                // Memeriksa subkategori yang dipilih (jika ada)
                if (subcategoriesSelected) {
                    var selectedSubcategories = [];
                    $('input[data-subcategory]:checked').each(function() {
                        selectedSubcategories.push($(this).data('subcategory'));
                    });
                    var subcategoryId = $(this).data('subcategory');
                    subcategoryMatch = selectedSubcategories.includes(subcategoryId);
                }

                // Menampilkan produk jika memenuhi kriteria harga, kategori, dan subkategori (jika ada)
                if (price >= minPrice && price <= maxPrice && categoryMatch && subcategoryMatch) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
    </script>
@endsection
