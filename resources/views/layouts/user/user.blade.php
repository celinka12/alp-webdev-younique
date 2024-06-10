<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.user.components.head')
</head>

<body>
    <div id="wrapper">
        <!-- ****** Header Area Start ****** -->
        @include('layouts.user.components.navbar')
        <!-- ****** Header Area End ****** -->


        <!-- ****** Top Discount Area Start ****** -->
        <section class="top-discount-area d-flex align-items-center flex-wrap">
            <!-- Single Discount Area -->
            <div class="single-discount-area col-12 col-md-6 col-lg-3 text-center p-3">
                <h5>Free Shipping &amp; Returns</h5>
                <h6><a href="#">BUY NOW</a></h6>
            </div>
            <!-- Additional Discount Areas can be added here -->
        </section>
        <!-- ****** Top Discount Area End ****** -->

        @yield('content')

        <!-- ****** Footer Area Start ****** -->
        @include('layouts.user.components.footer')
        <!-- ****** Footer Area End ****** -->
    </div>
    @include('layouts.user.components.script')
</body>

</html>
