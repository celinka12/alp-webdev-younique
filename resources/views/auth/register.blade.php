<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta required name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" href="{{ asset('assets/img/core-img/favicon.ico') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: repeating-linear-gradient(45deg, hsla(112, 98%, 100%, 0.05) 0px, hsla(112, 98%, 100%, 0.05) 1px, transparent 1px, transparent 11px, hsla(112, 98%, 100%, 0.05) 11px, hsla(112, 98%, 100%, 0.05) 12px, transparent 12px, transparent 32px), repeating-linear-gradient(90deg, hsla(112, 98%, 100%, 0.05) 0px, hsla(112, 98%, 100%, 0.05) 1px, transparent 1px, transparent 11px, hsla(112, 98%, 100%, 0.05) 11px, hsla(112, 98%, 100%, 0.05) 12px, transparent 12px, transparent 32px), repeating-linear-gradient(0deg, hsla(112, 98%, 100%, 0.05) 0px, hsla(112, 98%, 100%, 0.05) 1px, transparent 1px, transparent 11px, hsla(112, 98%, 100%, 0.05) 11px, hsla(112, 98%, 100%, 0.05) 12px, transparent 12px, transparent 32px), repeating-linear-gradient(90deg, hsla(112, 98%, 100%, 0.05) 0px, hsla(112, 98%, 100%, 0.05) 1px, transparent 1px, transparent 11px, hsla(112, 98%, 100%, 0.05) 11px, hsla(112, 98%, 100%, 0.05) 12px, transparent 12px, transparent 32px), linear-gradient(90deg, rgb(229, 94, 170), rgb(247, 192, 238));
        }

        .btn-register {
            background-color: #ff084e;
            color: #fff;
        }

        .btn-register:hover,
        .btn-register:focus {
            background-color: #3a3a3a;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="text-center" style="margin-top:-140px">
        <!-- Menambahkan margin atas hanya pada tampilan medium dan di atasnya -->
        <img src="{{ asset('assets/img/core-img/brand Logo.png') }}" class="img-fluid" alt="">
    </div>
    <div class="container mb-5" style="margin-top: -140px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-3">
                    <div class="card-body">
                        <h5 class="card-title text-center">Akun</h5>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Masukkan nama lengkap" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" required name="email" id="email"
                                            placeholder="Masukkan email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" required name="password" id="password"
                                            placeholder="Masukkan password">
                                    </div>
                                </div>
                            </div>
                            <h5 class="card-title my-3 text-center">Detail Informasi</h5>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="no_telepon">No Telepon</label>
                                        <input type="text" class="form-control" required name="no_telepon" id="no_telepon"
                                            placeholder="Masukkan No Telepon" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select class="form-select bootstrap-select" required name="jenis_kelamin"
                                            id="jenis_kelamin">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="laki-laki">Laki-laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="provinsi">Provinsi</label>
                                        <input type="text" class="form-control" required name="provinsi" id="provinsi"
                                            placeholder="Masukkan Provinsi">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="kota">Kota</label>
                                        <input type="text" class="form-control" required name="kota" id="kota"
                                            placeholder="Masukkan Kota">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="kecamatan">Kecamatan</label>
                                        <input type="text" class="form-control" required name="kecamatan" id="kecamatan"
                                            placeholder="Masukkan Kecamatan">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="kodepost">Kodepost</label>
                                        <input type="number" class="form-control" required name="kodepost" id="kodepost"
                                            placeholder="Masukkan kodepost">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="alamat_lengkap">Alamat Lengkap</label>
                                        <textarea required name="alamat_lengkap" rows="5" class="form-control" id=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-register mt-3">Register</button>
                            <div class="mt-3">Sudah punya akun ?<a href="{{route('login')}}"> Silahkan Login</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
