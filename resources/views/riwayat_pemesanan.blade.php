@extends('layouts.user.user')

@section('content')
    <style>
        .btn-detail {
            background-color: #ff084e;
            color: #fff;
        }

        .btn-detail:hover,
        .btn-detail:focus {
            background-color: #3a3a3a;
            color: #fff;
        }
    </style>
    <div class="row justify-content-center">
        <div class="col-lg-6 text-center mt-5">
            <div class="section-title">
                <h1>Riwayat transaksi</h1>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        @foreach ($transaksis as $transaksi)
            <div class="card mb-3">
                <div class="card-header p-3 d-flex justify-content-between align-items-center"
                    style="background-color: #ff084e">
                    <h4 class="text-white">{{ $transaksi->kode_transaksi }}</h4>
                    @if ($transaksi->status == 'proses')
                        <div class="badge bg-warning text-white p-2">Proses</div>
                    @else
                        <div class="badge bg-success text-white p-2">Selesai</div>
                    @endif
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Date : </strong>
                            {{ date('d-m-Y', strtotime($transaksi->created_at)) }}</li>
                        <li class="list-group-item"><strong>Total Harga: </strong>Rp.
                            {{ number_format($transaksi->total_harga, 0, ',', '.') }}</li>
                    </ul>
                    <a href="{{ route('profil.riwayatPemesananDetail', $transaksi->id) }}"
                        class="btn btn-detail mt-3">Detail</a>
                </div>
            </div>
        @endforeach
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
