@extends('layouts.admin.admin')


@section('content')
    <div class="row">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header p-4">
                    <span class="fs-2 fw-700">Data Customer</span>
                </div>
                <div class="table-responsive px-3">
                    <table class="table table-bordered table-hover" style="width: 100%" id="dataTable">
                        <thead>
                            <tr>
                                <th class="text-start d-none d-xl-table-cell">NO</th>
                                <th class="d-none d-xl-table-cell">Nama</th>
                                <th class="d-none d-xl-table-cell">Email</th>
                                <th class="d-none d-xl-table-cell">Jenis Kelamin</th>
                                <th class="text-start d-none d-xl-table-cell">No Telepon</th>
                                <th class="d-none d-md-table-cell">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td class="text-start d-none d-xl-table-cell">{{ $loop->iteration }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $customer->User->name }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $customer->User->email }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $customer->jenis_kelamin }}</td>
                                    <td class="text-start d-none d-xl-table-cell">{{ $customer->no_telepon }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <form id="deleteFormCustomer{{$customer->id}}" method="POST" action="{{ route('customer.destroy', $customer->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger mx-1" onclick="confirmDeleteCustomer({{$customer->id}})" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="Hapus Data">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                </button>
                                            </form>
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
