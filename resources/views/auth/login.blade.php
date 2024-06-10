<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="{{ asset('assets/img/core-img/favicon.ico') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-image: repeating-linear-gradient(45deg, hsla(112, 98%, 100%, 0.05) 0px, hsla(112, 98%, 100%, 0.05) 1px, transparent 1px, transparent 11px, hsla(112, 98%, 100%, 0.05) 11px, hsla(112, 98%, 100%, 0.05) 12px, transparent 12px, transparent 32px), repeating-linear-gradient(90deg, hsla(112, 98%, 100%, 0.05) 0px, hsla(112, 98%, 100%, 0.05) 1px, transparent 1px, transparent 11px, hsla(112, 98%, 100%, 0.05) 11px, hsla(112, 98%, 100%, 0.05) 12px, transparent 12px, transparent 32px), repeating-linear-gradient(0deg, hsla(112, 98%, 100%, 0.05) 0px, hsla(112, 98%, 100%, 0.05) 1px, transparent 1px, transparent 11px, hsla(112, 98%, 100%, 0.05) 11px, hsla(112, 98%, 100%, 0.05) 12px, transparent 12px, transparent 32px), repeating-linear-gradient(90deg, hsla(112, 98%, 100%, 0.05) 0px, hsla(112, 98%, 100%, 0.05) 1px, transparent 1px, transparent 11px, hsla(112, 98%, 100%, 0.05) 11px, hsla(112, 98%, 100%, 0.05) 12px, transparent 12px, transparent 32px), linear-gradient(90deg, rgb(229, 94, 170), rgb(247, 192, 238));
        }

        .btn-login {
            background-color: #ff084e;
            color: #fff;
        }

        .btn-login:hover,
        .btn-login:focus {
            background-color: #3a3a3a;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="text-center" style="margin-top:-140px">
            <!-- Menambahkan margin atas hanya pada tampilan medium dan di atasnya -->
            <img src="{{ asset('assets/img/core-img/brand Logo.png') }}" class="img-fluid" alt="">
        </div>
        <div class="card shadow mx-md-auto mb-5" style="margin-top:-140px;max-width: 1200px;">
            <!-- Menambahkan margin atas hanya pada tampilan medium dan di atasnya, dan membuat card memiliki lebar maksimum -->
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="{{ asset('assets/img/bg-img/bg-1.jpg') }}" class="img-fluid rounded-start" alt="...">
                    <!-- Mengubah lebar gambar menjadi responsif -->
                </div>
                <div class="col-md-6 px-3">
                    <div class="card-body">
                        <h3 class="card-title text-center mt-3 mb-4">Login</h3>
                        <!-- Menambahkan kelas text-center untuk mengatur judul ke tengah -->
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Email...">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="password...">
                            </div>
                            <button type="submit" class="btn btn-login btn-block mt-2 mb-2">Login</button>
                            <!-- Menggunakan kelas btn-block agar tombol menjadi full width -->
                            <div class="">Belum punya akun ?<a href="{{ route('register') }}"> Register disini</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if (session('error'))
        <script>
            Swal.fire({
                icon: "error",
                title: "{{ session('error') }}",
            });
        </script>
    @endif

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
