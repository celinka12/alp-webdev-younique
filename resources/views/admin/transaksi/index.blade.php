@extends('layouts.admin.admin')


@section('content')
    <div class="row">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header p-4">
                    <span class="fs-2 fw-700">Data Transaksi</span>
                </div>
                <div class="table-responsive px-3">
                    <table class="table table-bordered table-hover" style="width: 100%" id="dataTable">
                        <thead>
                            <tr>
                                <th class="text-start d-none d-xl-table-cell">NO</th>
                                <th class="d-none d-xl-table-cell">Kode Transaksi</th>
                                <th class="d-none d-xl-table-cell">Customer</th>
                                <th class="d-none d-xl-table-cell">Total Harga</th>
                                <th class="d-none d-xl-table-cell">Status</th>
                                <th class="d-none d-md-table-cell">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksis as $transaksi)
                                <tr>
                                    <td class="text-start d-none d-xl-table-cell">{{ $loop->iteration }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $transaksi->kode_transaksi }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $transaksi->User->name }}</td>
                                    <td class="d-none d-xl-table-cell">Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                                    <td class="d-none d-xl-table-cell">
                                        @if ($transaksi->status == 'proses')
                                            <span class="badge bg-warning p-2">Proses</span>
                                        @else
                                            <span class="badge bg-success p-2">Selesai</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('transaksi.show', $transaksi->id) }}" class="btn btn-sm btn-info mx-1"
                                                data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                                data-bs-html="true" title="Show Data"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                    <path
                                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
