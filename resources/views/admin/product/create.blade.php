@extends('layouts.admin.admin')


@section('content')
    <div class="row">
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-12">
                <div class="card mb-4 shadow-lg rounded card p-2">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Tambah Product</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Kategori</label>
                                    <select name="kategori_id" id="kategori" class="form-select" required>
                                        @foreach ($kategoris as $kategori)
                                            <option value="" hidden>Pilih Kategori</option>
                                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Detail Kategori</label>
                                    <select name="detail_kategori_id" id="detail_kategori" class="form-select">
                                        <option value="" hidden>Pilih Kategori Terlebih dulu</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Nama Product</label>
                                    <input type="text" name="nama_product" class="form-control mb-2"
                                        placeholder="Nama Product" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Harga Product</label>
                                    <input type="number" name="harga_product" class="form-control mb-2" value="0"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">QTY Product</label>
                                    <input type="number" name="qty_product" class="form-control mb-2" value="0"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Product</label>
                                    <textarea name="deskripsi_product" class="form-control mb-2" id="" cols="30" rows="10" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Image Product</label>
                                    <input type="file" name="image_product" class="form-control mb-2" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex float-start">
                    <a href="{{ route('product.index') }}" class="btn btn-danger me-3"><svg
                            xmlns="http://www.w3.org/2000/svg" width="20" fill="currentColor"
                            class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
                        </svg> Kembali</a>
                </div>
                <div class="d-flex float-end">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                    fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                                </svg> Kirim </span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#kategori').on('change', function() {
                var kategori_id = $(this).val();
                if (kategori_id) {
                    $.ajax({
                        url: "{{ route('product.getDetailKategori', ':id') }}".replace(':id',
                            kategori_id),
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#detail_kategori').empty();
                                $('#detail_kategori').append(
                                    '<option hidden>Pilih Detail Kategori</option>');
                                $.each(data, function(key, detail_kategori) {
                                    $('select[name="detail_kategori_id"]').append(
                                        '<option value="' + detail_kategori.id +
                                        '">' +
                                        detail_kategori.nama_detail_kategori +
                                        '</option>');
                                });
                            } else {
                                $('#detail_kategori').empty();
                            }
                        }
                    });
                } else {
                    $('#detail_kategori').empty();
                }
            });
        });
    </script>
@endsection
