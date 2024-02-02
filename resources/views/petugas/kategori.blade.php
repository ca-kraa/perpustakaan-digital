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
                            data-bs-toggle="modal" data-bs-target="#">
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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            loadDataKategori();
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
                                '<h6 class="mt-2 ml-4 text-sm">' + item.nama_kategori + '</h6>' +
                                '</div></td>' +
                                '<td class="align-middle"><div class="d-flex px-2 py-1"><a class="text-success font-weight-bold text-xs btn-edit" data-bs-toggle="modal" data-bs-target="#editDataKategori" data-id="' +
                                item.id + '" data-nama_kategori="' + item.nama_kategori +
                                '">Edit</a><span class="mx-2"></span><a href="javascript:;" class="text-danger font-weight-bold text-xs btn-delete" data-toggle="tooltip" data-original-title="Hapus kategori" data-id="' +
                                item.id + '" data-nama_kategori="' + item.nama_kategori +
                                '">Hapus</a></div></td></tr>';
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
    </script>
@endsection
