@extends('layouts.app')

@section('title', 'Manajemen Kategori - Perpustakaan')

@section('content')
@include('admin.category.modal') {{-- modal untuk tambah/edit --}}

<div class="container-xxl">
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Manajemen Kategori</h4>
        </div>
        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active">Kategori</li>
            </ol>
        </div>
    </div>

    <div class="row">
    @include('admin.category.category-ajax') {{-- load data kategori --}}
</div>

@endsection

@section('custom-script')
<script>
    $(document).ready(function () {
        // Fungsi untuk load data kategori
        function loadCategories() {
            let loadingHTML = '';
                for (let i = 0; i < 5; i++) {
                    loadingHTML += `
                        <tr>
                            <td colspan="5">
                                <div class="placeholder-glow">
                                    <span class="placeholder col-12"></span>
                                </div>
                            </td>
                        </tr>
                    `;
                }
                $('.tbody_categories').html(loadingHTML);


            $.ajax({
                url: "{{ route('admin.category.load-data') }}",
                method: "GET",
                success: function (res) {
                    let html = '';
                    if (res.data.length === 0) {
                        html = '<tr><td colspan="5" class="text-center">Belum ada data.</td></tr>';
                    } else {
                        $.each(res.data, function (i, item) {
                            html += `
                                <tr>
                                    <td>${i + 1}</td>
                                    <td>${item.category_name}</td>
                                    <td>${item.description ?? '-'}</td>
                                    <td>${item.updated_by ?? '-'}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary me-1 edit-btn" data-id="${item.recid_category}"><i class="mdi mdi-pencil"></i></button>
                                        <button class="btn btn-sm btn-danger delete-btn" data-id="${item.recid_category}"><i class="mdi mdi-trash-can"></i></button>
                                    </td>
                                </tr>
                            `;
                        });
                    }
                    $('.tbody_categories').html(html);
                },
                error: function () {
                    $('.tbody_categories').html('<tr><td colspan="5" class="text-center text-danger">Gagal memuat data!</td></tr>');
                }
            });
        }

        loadCategories(); // load awal

        // Simpan kategori baru
        $('#addCategoryForm').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('admin.category.store') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    category_name: $('#add_nama').val(),
                    description: $('#add_deskripsi').val(),
                },
                beforeSend: function () {
                    Swal.fire({
                        title: 'Menyimpan...',
                        allowOutsideClick: false,
                        didOpen: () => Swal.showLoading()
                    });
                },
                success: function (res) {
                    Swal.close();
                    Swal.fire('Berhasil', res.success, 'success');
                    $('#addCategoryModal').modal('hide');
                    $('#addCategoryForm')[0].reset();
                    loadCategories();
                },
                error: function (xhr) {
                    Swal.close();
                    if (xhr.status === 422) {
                        let pesan = '';
                        $.each(xhr.responseJSON.errors, function (key, value) {
                            pesan += value[0] + '<br>';
                        });
                        Swal.fire('Gagal!', pesan, 'error');
                    } else {
                        Swal.fire('Gagal!', 'Terjadi kesalahan saat menyimpan.', 'error');
                    }
                }
            });
        });

        // Buka modal edit
        $(document).on('click', '.edit-btn', function () {
            const id = $(this).data('id');
            $.get(`/admin/category/${id}/edit`, function (res) {
                $('#edit_id').val(res.recid_category);
                $('#edit_nama').val(res.category_name);
                $('#edit_deskripsi').val(res.description);
                $('#editCategoryModal').modal('show');
            }).fail(() => {
                Swal.fire('Gagal', 'Data tidak ditemukan', 'error');
            });
        });

        // Update kategori
        $('#editCategoryForm').on('submit', function (e) {
            e.preventDefault();
            const id = $('#edit_id').val();

            $.ajax({
                url: `/admin/category/${id}`,
                method: "POST",
                data: {
                    _method: 'PUT',
                    _token: "{{ csrf_token() }}",
                    category_name: $('#edit_nama').val(),
                    description: $('#edit_deskripsi').val(),
                },
                beforeSend: function () {
                    Swal.fire({
                        title: 'Memperbarui...',
                        allowOutsideClick: false,
                        didOpen: () => Swal.showLoading()
                    });
                },
                success: function (res) {
                    Swal.close();
                    Swal.fire('Berhasil', res.success, 'success');
                    $('#editCategoryModal').modal('hide');
                    loadCategories();
                },
                error: function (xhr) {
                    Swal.close();
                    if (xhr.status === 422) {
                        let pesan = '';
                        $.each(xhr.responseJSON.errors, function (key, value) {
                            pesan += value[0] + '<br>';
                        });
                        Swal.fire('Gagal!', pesan, 'error');
                    } else {
                        Swal.fire('Gagal!', 'Terjadi kesalahan saat memperbarui.', 'error');
                    }
                }
            });
        });

        // Hapus kategori
        $(document).on('click', '.delete-btn', function () {
            const id = $(this).data('id');

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data yang dihapus tidak bisa dikembalikan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/category/${id}`,
                        method: "POST",
                        data: {
                            _method: 'DELETE',
                            _token: "{{ csrf_token() }}"
                        },
                        beforeSend: function () {
                            Swal.fire({
                                title: 'Menghapus...',
                                allowOutsideClick: false,
                                didOpen: () => Swal.showLoading()
                            });
                        },
                        success: function (res) {
                            Swal.close();
                            Swal.fire('Berhasil', res.success, 'success');
                            loadCategories();
                        },
                        error: function () {
                            Swal.close();
                            Swal.fire('Gagal', 'Gagal menghapus data', 'error');
                        }
                    });
                }
            });
        });
    });
</script>

@endsection
