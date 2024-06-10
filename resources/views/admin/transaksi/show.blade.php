@extends('layouts.admin.admin')


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
    <div class="container mt-2 mb-5">
        <div class="card shadow-lg rounded card mb-3">
            <div class="card-header p-3 d-flex justify-content-between align-items-center">
                <h4 class="">{{ $transaksi->kode_transaksi }}</h4>
                <div>
                    @if ($transaksi->status == 'proses')
                        <div class="badge bg-warning text-white p-2">Proses</div>
                    @else
                        <div class="badge bg-success text-white p-2">Selesai</div>
                    @endif
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <div class="container">
                    <table class="table mb-3">
                        <tbody>
                            <tr>
                                <td>
                                    <strong>Nama Lengkap</strong>
                                </td>
                                <td>{{ $transaksi->User->name }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>No Telepon</strong>
                                </td>
                                <td>{{ $transaksi->User->Customer->no_telepon }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Email</strong>
                                </td>
                                <td>{{ $transaksi->User->email }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Provinsi</strong>
                                </td>
                                <td>{{ $transaksi->User->Customer->provinsi }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Kota</strong>
                                </td>
                                <td>{{ $transaksi->User->Customer->kota }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Kecamatan</strong>
                                </td>
                                <td>{{ $transaksi->User->Customer->kecamatan }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Kodepost</strong>
                                </td>
                                <td>{{ $transaksi->User->Customer->kodepost }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Alamat Lengkap</strong>
                                </td>
                                <td>{{ $transaksi->User->Customer->alamat_lengkap }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-hover table-bordered mb-3">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-1">
                            @php
                                $total_keseluruhan = 0;
                            @endphp
                            @foreach ($transaksi->DetailTransaksi as $detailTransaksi)
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            {{ $loop->iteration }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            {{ $detailTransaksi->Keranjang->Product->nama_product }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            {{ $detailTransaksi->Keranjang->qty }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            Rp.
                                            {{ number_format($detailTransaksi->Keranjang->Product->harga_product, 0, ',', '.') }}
                                        </div>
                                    </td>
                                    @php
                                        $total =
                                            $detailTransaksi->Keranjang->Product->harga_product *
                                            $detailTransaksi->Keranjang->qty;
                                        $total_keseluruhan += $total;
                                    @endphp
                                    <td>
                                        <div class="d-flex">
                                            Rp. {{ number_format($total, 0, ',', '.') }}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-border-bottom-0">
                            <tr>
                                <th colspan="4">Total</th>
                                <th>Rp. {{ number_format($total_keseluruhan, 0, ',', '.') }}</th>
                            </tr>
                            <tr>
                                <th colspan="4">Pengiriman</th>
                                <th>Free</th>
                            </tr>
                            <tr>
                                <th colspan="4">Total Bayar</th>
                                <th>Rp. {{ number_format($total_keseluruhan, 0, ',', '.') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('transaksi.index') }}" class="btn btn-detail">Kembali</a>
        </div>
    </div>
@endsection
