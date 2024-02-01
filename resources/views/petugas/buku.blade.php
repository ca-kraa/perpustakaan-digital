@extends('layout.main2')
@section('title', 'Petugas | Buku')
@section('Dashboard Untuk', 'Petugas')


@section('konten')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3 mb-0 animate__bounce">Data Buku</h6>
                        </div>
                        <button class="btn btn-icon btn-3 btn-primary mt-2" type="button" style="margin-right: 10px;"
                            data-bs-toggle="modal" data-bs-target="#tambahDataBukuModal">
                            <span class="btn-inner--icon"><i class="material-icons">book</i></span>
                            <span class="btn-inner--text">Tambahkan Buku</span>
                        </button>

                        <button class="btn btn-icon btn-3 btn-success mt-2" type="button" style="margin-right: 10px;">
                            <span class="btn-inner--icon"><i class="material-icons">table_view</i></span>
                            <span class="btn-inner--text">Simpan CSV</span>
                        </button>

                        <button class="btn btn-icon btn-3 btn-info mt-2" type="button" id="savePdfButton" style="margin-right: 10px;">
                            <span class="btn-inner--icon"><i class="material-icons">picture_as_pdf</i></span>
                            <span class="btn-inner--text">Simpan PDF</span>
                        </button>



                        <a href="print-buku" target="_blank" class="btn btn-icon btn-3 btn-warning mt-2"
                            style="margin-right: 10px;">
                            <span class="btn-inner--icon"><i class="material-icons">print</i></span>
                            <span class="btn-inner--text">Cetak</span>
                        </a>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0" id="tabelPetugas">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Judul</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Penulis</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Penerbit</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tahun Terbit</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="bukuTableBody" class="display">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editDataBuku" tabindex="-1" role="dialog" aria-labelledby="modal-title-default"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title font-weight-normal" id="modal-title-default">Edit Buku</h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editBukuForm">
                        <div class="mb-3">
                            <label for="editJudul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="editJudul" name="judul">
                        </div>
                        <div class="mb-3">
                            <label for="editPenulis" class="form-label">Penulis</label>
                            <input type="text" class="form-control" id="editPenulis" name="penulis">
                        </div>
                        <div class="mb-3">
                            <label for="editPenerbit" class="form-label">Penerbit</label>
                            <input type="text" class="form-control" id="editPenerbit" name="penerbit">
                        </div>
                        <div class="mb-3">
                            <label for="editTahunTerbit" class="form-label">Tahun Terbit</label>
                            <input type="text" class="form-control" id="editTahunTerbit" name="tahun_terbit">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-primary" id="btnSaveChanges">Save changes</button>
                    <button type="button" class="btn btn-link ml-auto" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahDataBukuModal" tabindex="-1" role="dialog" aria-labelledby="modal-title-default"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title font-weight-normal" id="modal-title-default">Tambah Buku</h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="tambahBukuForm">
                        <div class="input-group input-group-outline mb-4">
                            <label class="form-label" for="tambahJudul">Judul</label>
                            <input type="text" class="form-control" id="tambahJudul" name="judul" required>
                        </div>
                        <div class="input-group input-group-outline mb-4">
                            <label class="form-label" for="tambahPenulis">Penulis</label>
                            <input type="text" class="form-control" id="tambahPenulis" name="penulis" required>
                        </div>
                        <div class="input-group input-group-outline mb-4">
                            <label class="form-label" for="tambahPenerbit">Penerbit</label>
                            <input type="text" class="form-control" id="tambahPenerbit" name="penerbit" required>
                        </div>
                        <div class="input-group input-group-outline mb-4">
                            <label class="form-label" for="tambahTahunTerbit">Tahun Terbit</label>
                            <input type="number" class="form-control" id="tambahTahunTerbit" name="tahun_terbit"
                                required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-primary" id="btnTambahBuku">Tambah Buku</button>
                    <button type="button" class="btn btn-link ml-auto" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#savePdfButton').on('click', function() {
                window.location.href = '/petugas/pdf-buku';
            });
        });
        $(document).ready(function() {

            loadDataBuku();

            $(document).on('click', '.btn-delete', function() {
                var id = $(this).data('id');
                var judul = $(this).data('judul');

                var isConfirmed = confirm('Apakah Anda yakin ingin menghapus buku "' + judul + '"?');

                if (isConfirmed) {
                    deleteBuku(id);
                }
            });

            $(document).on('click', '.btn-edit', function() {
                var id = $(this).data('id');
                var judul = $(this).data('judul');
                var penulis = $(this).data('penulis');
                var penerbit = $(this).data('penerbit');
                var tahun_terbit = $(this).data('tahun_terbit');

                $('#editBukuForm #editJudul').val(judul);
                $('#editBukuForm #editPenulis').val(penulis);
                $('#editBukuForm #editPenerbit').val(penerbit);
                $('#editBukuForm #editTahunTerbit').val(tahun_terbit);

                $('#btnSaveChanges').data('id', id);
            });

            $(document).on('click', '#btnSaveChanges', function() {
                var id = $(this).data('id');
                var editedJudul = $('#editJudul').val();
                var editedPenulis = $('#editPenulis').val();
                var editedPenerbit = $('#editPenerbit').val();
                var editedTahunTerbit = $('#editTahunTerbit').val();

                $.ajax({
                    url: '/api/edit-buku/' + id,
                    type: 'put',
                    data: {
                        judul: editedJudul,
                        penulis: editedPenulis,
                        penerbit: editedPenerbit,
                        tahun_terbit: editedTahunTerbit
                    },
                    success: function(response) {
                        console.log('Data berhasil diperbarui:', response);
                        $('#editDataBuku').modal('hide');
                        location.reload();
                    },
                    error: function(error) {
                        console.error('Gagal memperbarui data:', error);
                    }
                });
            });

            function loadDataBuku() {
                $.ajax({
                    url: '/api/show-data-buku',
                    type: 'get',
                    dataType: 'json',
                    success: function(data) {
                        $('#bukuTableBody').empty();

                        if (data.length > 0) {
                            data.forEach(function(buku) {
                                var row = '<tr>' +
                                    '<td class="align-middle">' +
                                    '<div class="d-flex px-2 py-1">' +
                                    '<h6 class="mt-2 ml-4 text-sm">' + buku.judul + '</h6>' +
                                    '</div>' +
                                    '</td>' +
                                    '<td class="align-middle">' +
                                    '<div class="d-flex px-2 py-1">' +
                                    '<h6 class="mt-2 ml-4 text-sm">' + buku.penulis + '</h6>' +
                                    '</div>' +
                                    '</td>' +
                                    '<td class="align-middle">' +
                                    '<div class="d-flex px-2 py-1">' +
                                    '<h6 class="mt-2 ml-4 text-sm">' + buku.penerbit + '</h6>' +
                                    '</div>' +
                                    '</td>' +
                                    '<td class="align-middle">' +
                                    '<div class="d-flex px-2 py-1">' +
                                    '<h6 class="mt-2 ml-4 text-sm">' + buku.tahun_terbit +
                                    '</h6>' +
                                    '</div>' +
                                    '</td>' +
                                    '<td class="align-middle">' +
                                    '<div class="d-flex px-2 py-1">' +
                                    '<a class="text-success font-weight-bold text-xs btn-edit" ' +
                                    'data-bs-toggle="modal" data-bs-target="#editDataBuku" ' +
                                    'data-id="' + buku.id + '" data-judul="' + buku.judul +
                                    '" data-penulis="' + buku.penulis + '" data-penerbit="' +
                                    buku.penerbit +
                                    '" data-tahun_terbit="' + buku.tahun_terbit + '">' +
                                    'Edit' +
                                    '</a>' +
                                    '<span class="mx-2"></span>' +
                                    '<a href="javascript:;" class="text-danger font-weight-bold text-xs btn-delete" ' +
                                    'data-toggle="tooltip" data-original-title="Hapus buku" ' +
                                    'data-id="' + buku.id + '" data-judul="' + buku.judul +
                                    '">' +
                                    'Hapus' +
                                    '</a>' +
                                    '</div>' +
                                    '</td>' +
                                    '</tr>';
                                $('#bukuTableBody').append(row);
                            });
                        } else {
                            var emptyRow = '<tr id="emptyRow">' +
                                '<td class="text-center" colspan="5">' +
                                'Silahkan tambahkan data terlebih dahulu <br>' +
                                '(〃￣︶￣)人(￣︶￣〃)' +
                                '</td>' +
                                '</tr>';
                            $('#bukuTableBody').append(emptyRow);
                        }
                    },
                    error: function(error) {
                        console.log('Error fetching data:', error);
                    }
                });
            }

            function deleteBuku(id) {
                $.ajax({
                    url: '/api/delete-buku/' + id,
                    type: 'delete',
                    success: function() {
                        loadDataBuku();
                    },
                    error: function(error) {
                        console.log('Error deleting data:', error);
                    }
                });
            }
        });

        $(document).ready(function() {
            $(document).on('click', '#btnTambahBuku', function() {
                var tambahJudul = $('#tambahJudul').val();
                var tambahPenulis = $('#tambahPenulis').val();
                var tambahPenerbit = $('#tambahPenerbit').val();
                var tambahTahunTerbit = $('#tambahTahunTerbit').val();

                $.ajax({
                    url: '/api/create-buku',
                    type: 'post',
                    data: {
                        judul: tambahJudul,
                        penulis: tambahPenulis,
                        penerbit: tambahPenerbit,
                        tahun_terbit: tambahTahunTerbit
                    },
                    success: function(response) {
                        console.log('Data berhasil ditambahkan:', response);
                        location.reload();
                    },
                    error: function(error) {
                        console.error('Gagal menambahkan data:', error);
                    }
                });
            });
        });
    </script>

@endsection
