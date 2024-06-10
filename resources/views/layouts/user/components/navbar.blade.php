<style>
    .cart-list li:hover {
        background-color: #ff084e;
    }

    .cart-list li:hover > a {
        color: white !important;
    }

    .top_logo {
        text-align: center;
    }

    .top_logo img {
        display: block;
        margin-left: auto;
        margin-right: auto;
        max-width: 100%;
        /* agar gambar tidak melebihi lebar parent */
    }

    @media (min-width: 300px) {
        .top_logo img {
            margin-left: 140px;
        }
    }

    @media (min-width: 500px) {
        .top_logo img {
            margin-left: 200px;
        }
    }


@media (min-width: 768px) {
        .top_logo img {
            margin-left: 220px;
        }
    }

    @media (min-width: 992px) {
        .top_logo img {
            margin-left: -25px;
        }
    }

    @media (min-width: 1200px) {
        .top_logo img {
            margin-left: -30px;
        }
    }
</style>
<header class="header_area bg-img background-overlay-white"
    style="background-image: url({{ asset('assets/img/bg-img/bg-1.jpg') }});">
    <!-- Top Header Area Start -->
    <div class="top_header_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-end">

                <div class="col-12 col-lg-7">
                    <div class="top_single_area d-flex align-items-center">
                        <!-- Logo Area -->
                        <div class="top_logo">
                            <a href="#"><img src="{{ asset('assets/img/core-img/logo.png') }}" alt=""></a>
                        </div>
                        <div class="header-cart-menu d-flex align-items-center ml-auto">
                            <div class="cart">
                                @if (Auth::check())
                                    @php
                                        $wishlist = App\Models\Wishlist::where('user_id', Auth::user()->id)->count();
                                    @endphp
                                    <a href="{{ route('wishlist.index') }}"><span
                                            class="wishlist_quantity">{{ $wishlist }}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="25"
                                            fill="currentColor" class="bi bi-heart-fill" viewBox="1 -1 10 16">
                                            <path fill-rule="evenodd"
                                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                                        </svg></a>
                                @else
                                    <a href="{{ route('login') }}"><span class="cart_quantity">0</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="25"
                                            fill="currentColor" class="bi bi-heart-fill" viewBox="1 -1 10 16">
                                            <path fill-rule="evenodd"
                                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                                        </svg></a>
                                @endif
                                @if (Auth::check())
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="header-cart-btn" width="40"
                                            height="31" fill="currentColor" class="bi bi-person-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                        </svg></a>

                                    <ul class="cart-list">
                                        <li onclick="window.location.href = '{{route('profil.index')}}'"><a href="{{route('profil.index')}}">Profil</a></li>
                                        <li><a href="{{route('profil.riwayatPemesanan')}}">Pemesanan</a></li>
                                        <li onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><a href="#">Logout</a></li>
                                    </ul>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                @else
                                    <a href="{{ route('login') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="31"
                                            fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                        </svg></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Top Header Area End -->
    <div class="main_header_area">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 d-md-flex justify-content-between">
                    <!-- Header Social Area -->
                    <div class="header-social-area">
                        <a href="#"><span class="karl-level">Share</span> <i class="fa fa-pinterest"
                                aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </div>
                    <!-- Menu Area -->
                    <div class="main-menu-area">
                        <nav class="navbar navbar-expand-lg align-items-start">

                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#karl-navbar" aria-controls="karl-navbar" aria-expanded="false"
                                aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i
                                        class="ti-menu"></i></span></button>

                            <div class="collapse navbar-collapse align-items-start collapse" id="karl-navbar">
                                <ul class="navbar-nav animated" id="nav">
                                    <li class="nav-item active"><a class="nav-link" href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('shop.index') }}">Shop</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('keranjang.index') }}">
                                            Cart</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('kontak') }}">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!-- Help Line -->
                    <div class="help-line">
                        <a href="#"><i class="ti-headphone-alt"></i> +6280239428392</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
