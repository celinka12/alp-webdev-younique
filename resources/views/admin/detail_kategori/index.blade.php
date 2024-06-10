@extends('layouts.admin.admin')


@section('content')
    <div class="row">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header p-4">
                    <span class="fs-2 fw-700">Data Detail Kategori</span>
                    <a href="{{ route('detail_kategori.create') }}" class="btn btn-primary float-end "><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                        </svg>Tambah Data</a>
                </div>
                <div class="table-responsive px-3">
                    <table class="table table-bordered table-hover" style="width: 100%" id="dataTable">
                        <thead>
                            <tr>
                                <th class="text-start d-none d-xl-table-cell">NO</th>
                                <th class="d-none d-xl-table-cell">Katagori</th>
                                <th class="d-none d-xl-table-cell">Detail Kategori</th>
                                <th class="d-none d-md-table-cell">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detailKategoris as $detailKategori)
                                <tr>
                                    <td class="text-start d-none d-xl-table-cell">{{ $loop->iteration }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $detailKategori->Kategori->nama_kategori }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $detailKategori->nama_detail_kategori }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('detail_kategori.edit', $detailKategori->id) }}"
                                                class="btn btn-sm btn-secondary mx-1" data-bs-toggle="tooltip"
                                                data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                                title="Edit Data">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                </svg>
                                            </a> |
                                            <form id="deleteFormDetailKategori{{$detailKategori->id}}" method="POST" action="{{ route('detail_kategori.destroy', $detailKategori->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger mx-1" onclick="confirmDeleteDetailKategori({{$detailKategori->id}})" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="Hapus Data">
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
