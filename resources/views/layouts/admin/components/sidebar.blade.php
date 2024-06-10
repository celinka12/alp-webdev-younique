<nav id="sidebar" class="sidebar js-sidebar">

    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="#">
            <span class="align-middle">Younique</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item {{Request::is('admin/dashboard') ? 'active' : ''}}">
                <a class="sidebar-link" href="{{route('admin.dashboard')}}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-header">
                Customer
            </li>

            <li class="sidebar-item {{Request::is('admin/customer*') ? 'active' : ''}}">
                <a class="sidebar-link" href="{{route('customer.index')}}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Customer</span>
                </a>
            </li>
            <li class="sidebar-header">
                Produk
            </li>

            <li class="sidebar-item {{Request::is('admin/kategori*') ? 'active' : ''}}">
                <a class="sidebar-link" href="{{route('kategori.index')}}">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Kategori</span>
                </a>
            </li>
            {{-- <li class="sidebar-item {{Request::is('admin/detail_kategori*') ? 'active' : ''}}">
                <a class="sidebar-link" href="{{route('detail_kategori.index')}}">
                    <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Detail Kategori</span>
                </a>
            </li> --}}
            <li class="sidebar-item {{Request::is('admin/product*') ? 'active' : ''}}">
                <a class="sidebar-link" href="{{route('product.index')}}">
                    <i class="align-middle" data-feather="shopping-bag"></i> <span class="align-middle">Product</span>
                </a>
            </li>
            <li class="sidebar-header">
                Transaksi
            </li>

            <li class="sidebar-item {{Request::is('admin/transaksi*') ? 'active' : ''}}">
                <a class="sidebar-link" href="{{route('transaksi.index')}}">
                    <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Transaksi</span>
                </a>
            </li>

    </div>
</nav>
