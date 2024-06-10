@extends('layouts.user.user')

@section('content')
    <style>
        .btn-update {
            background-color: #ff084e;
            color: #fff;
        }

        .btn-update:hover,
        .btn-update:focus {
            background-color: #3a3a3a;
            color: #fff;
        }
    </style>
    <div class="container mb-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card p-3">
                    <div class="card-body">
                        <h2 class="card-title text-center">Profil</h2>
                        <form action="{{ route('profil.update', Auth::user()->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ $customer->User->name }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" required name="email" id="email"
                                            value="{{ $customer->User->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="no_telepon">No Telepon</label>
                                        <input type="text" class="form-control" required name="no_telepon"
                                            id="no_telepon" value="{{ $customer->no_telepon }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select class="form-control bootstrap-select" required name="jenis_kelamin"
                                            id="jenis_kelamin">
                                            <option value="laki-laki"
                                                {{ $customer->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-laki
                                            </option>
                                            <option value="perempuan"
                                                {{ $customer->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="provinsi">Provinsi</label>
                                        <input type="text" class="form-control" required name="provinsi" id="provinsi"
                                            value="{{ $customer->provinsi }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="kota">Kota</label>
                                        <input type="text" class="form-control" required name="kota" id="kota"
                                            value="{{ $customer->kota }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="kecamatan">Kecamatan</label>
                                        <input type="text" class="form-control" required name="kecamatan" id="kecamatan"
                                            value="{{ $customer->kecamatan }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="kodepost">Kodepost</label>
                                        <input type="number" class="form-control" required name="kodepost" id="kodepost"
                                            value="{{ $customer->kodepost }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="alamat_lengkap">Alamat Lengkap</label>
                                        <textarea required name="alamat_lengkap" rows="5" class="form-control" id="">{{ $customer->alamat_lengkap }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-update mt-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "{{ session('success') }}",
            });
        </script>
    @endif
@endsection
