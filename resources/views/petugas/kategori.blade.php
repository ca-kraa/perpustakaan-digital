@extends('layout.main2')
@section('title', 'Petugas | Kategori')
@section('Dashboard Untuk', 'Petugas')

@section('konten')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3 mb-0 animate__bounce">Kategori Buku</h6>
                        </div>
                        <button class="btn btn-icon btn-3 btn-primary mt-2" type="button" style="margin-right: 10px;"
                            data-bs-toggle="modal" data-bs-target="#addNewCategoryModal">
                            <span class="btn-inner--icon"><i class="material-icons">category</i></span>
                            <span class="btn-inner--text">Tambahkan Kategori</span>
                        </button>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0" id="tabelPetugas">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Kategori</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="katgoriTableBody" class="display">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addNewCategoryModal" tabindex="-1" role="dialog" aria-labelledby="modal-title-default"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title font-weight-normal" id="modal-title-default">Tambah Kategori</h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addCategoryForm">
                        <div class="input-group input-group-outline my-3">
                            <label for="newCategory" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="newCategory" name="nama_kategori">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-primary" id="btnAddCategory">Tambah Kategori</button>
                    <button type="button" class="btn btn-link ml-auto" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editDataKategori" tabindex="-1" role="dialog" aria-labelledby="modal-title-default"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title font-weight-normal" id="modal-title-default">Edit Kategori</h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editCategoryForm">
                        <input type="hidden" id="editCategoryId" name="id">
                        <div class="my-3">
                            <label for="editCategory" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="editCategory" name="nama_kategori">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-primary" id="btnSaveChanges">Simpan Perubahan</button>
                    <button type="button" class="btn btn-link ml-auto" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            loadDataKategori();

            $('#btnAddCategory').on('click', function() {
                var newCategory = $('#newCategory').val();

                $.ajax({
                    url: '/api/create-kategori',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        nama_kategori: newCategory
                    },
                    success: function(response) {
                        loadDataKategori();
                        $('#addNewCategoryModal').modal('hide');
                    },
                    error: function(error) {
                        console.log('Error adding category:', error);
                    }
                });
            });

            function loadDataKategori() {
                $.ajax({
                    url: "/api/show-data-kategori",
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $("#katgoriTableBody").empty();
                        if (data.length > 0) {
                            $.each(data, function(index, item) {
                                var row = '<tr>' +
                                    '<td class="align-middle">' +
                                    '<div class="d-flex px-2 py-1">' +
                                    '<h6 class="mt-2 ml-4 text-sm">' + item.nama_kategori +
                                    '</h6>' +
                                    '</div></td>' +
                                    '<td class="align-middle"><div class="d-flex px-2 py-1">' +
                                    '<a class="text-success font-weight-bold text-xs btn-edit" data-bs-toggle="modal" data-bs-target="#editDataKategori" data-id="' +
                                    item.id + '" data-nama_kategori="' + item.nama_kategori +
                                    '">Edit</a><span class="mx-2"></span>' +
                                    '<a href="javascript:;" class="text-danger font-weight-bold text-xs btn-delete" ' +
                                    'data-toggle="tooltip" data-original-title="Hapus kategori" ' +
                                    'data-id="' + item.id + '" data-nama_kategori="' + item
                                    .nama_kategori +
                                    '" onclick="confirmDelete(' + item.id + ', \'' + item
                                    .nama_kategori + '\')">Hapus</a>' +
                                    '</div></td></tr>';
                                $("#katgoriTableBody").append(row);
                            });
                        } else {
                            $("#katgoriTableBody").append(
                                '<tr id="emptyRow"><td class="text-center" colspan="3">Belum ada data kategori <br>(〃￣︶￣)人(￣︶￣〃)</td></tr>'
                            );
                        }
                    },
                    error: function(error) {
                        console.log("Error fetching data:", error);
                    }
                });
            }

            window.confirmDelete = function(categoryId, categoryName) {
                var confirmDelete = confirm('Apakah Anda yakin ingin menghapus Kategori "' + categoryName +
                    '"?');

                if (confirmDelete) {
                    deleteCategory(categoryId);
                }
            };

            function deleteCategory(categoryId) {
                $.ajax({
                    url: '/api/delete-kategori/' + categoryId,
                    type: 'delete',
                    dataType: 'json',
                    success: function(response) {
                        loadDataKategori();
                    },
                    error: function(error) {
                        console.log('Error deleting category:', error);
                    }
                });
            }
            $('#katgoriTableBody').on('click', '.btn-edit', function() {
                var categoryId = $(this).data('id');
                var categoryNama = $(this).data('nama_kategori');

                $('#editCategoryId').val(categoryId);
                $('#editCategory').val(categoryNama);

                $('#editDataKategori').modal('show');
            });

            $('#btnSaveChanges').on('click', function() {
                var categoryId = $('#editCategoryId').val();
                var editedCategoryNama = $('#editCategory').val();

                $.ajax({
                    url: '/api/edit-kategori/' + categoryId,
                    type: 'put',
                    dataType: 'json',
                    data: {
                        nama_kategori: editedCategoryNama
                    },
                    success: function(response) {
                        location.reload();

                        $('#editDataKategori').modal('hide');
                    },
                    error: function(error) {
                        console.log('Error updating category:', error);
                    }
                });
            });
        });
    </script>


@endsection
