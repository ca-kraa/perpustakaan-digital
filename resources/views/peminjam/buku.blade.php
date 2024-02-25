@extends('layout.main3')
@section('title', 'Buku')
@section('Dashboard Untuk', 'Peminjam')

@section('konten')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3 mb-0 animate__bounce">Buku</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <div class="input-group input-group-outline my-3 ml-2" style="max-width: 300px;">
                                <label class="form-label">Search</label>
                                <input type="search" class="form-control">
                            </div>
                            <table class="table align-items-center mb-0" id="tabelBuku">
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
                                            Stok</th>
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

    <div class="modal fade" id="pinjamModal" tabindex="-1" aria-labelledby="pinjamModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pinjamModalLabel">Detail Buku yang Dipinjam</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Judul: <span id="detailJudul"></span></p>
                    <p>Penulis: <span id="detailPenulis"></span></p>
                    <p>Penerbit: <span id="detailPenerbit"></span></p>
                    <p>Tahun Terbit: <span id="detailTahunTerbit"></span></p>
                    <p>Stok : <span id="detailStok"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batalkan</button>
                    <button type="button" class="btn btn-success" id="btnBuatPinjaman">Buat Pinjaman</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/cdn') }}/jquery.js"></script>
    <script src="{{ asset('assets/cdn') }}/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            function showDataBuku() {
                $.ajax({
                    url: "/api/show-data-buku",
                    type: "GET",
                    success: function(t) {
                        updateTable(t);
                    },
                    error: function() {
                        console.log("Error fetching initial data");
                    }
                });
            }

            function updateTable(t) {
                var i = $("#bukuTableBody");
                i.empty();
                if (Array.isArray(t)) {
                    t.forEach(function(t) {
                        var a =
                            '<tr><td class="align-middle"><div class="d-flex px-2 py-1"><h6 class="mt-2 ml-4 text-sm">' +
                            t.judul +
                            '</h6></div></td><td class="align-middle"><div class="d-flex px-2 py-1"><h6 class="mt-2 ml-4 text-sm">' +
                            t.penulis +
                            '</h6></div></td><td class="align-middle"><div class="d-flex px-2 py-1"><h6 class="mt-2 ml-4 text-sm">' +
                            t.penerbit +
                            '</h6></div></td><td class="align-middle"><div class="d-flex px-2 py-1"><h6 class="mt-2 ml-4 text-sm">' +
                            t.tahun_terbit +
                            '</h6></div></td><td class="align-middle"><div class="d-flex px-2 py-1"><h6 class="mt-2 ml-4 text-sm">' +
                            t.stok
                            +
                            '</h6></div></td><td class="align-middle"><button type="button" class="btn btn-info btn-pinjam" data-bs-toggle="modal" data-bs-target="#pinjamModal" data-id="' +
                            t.id + '">Pinjam</button></td></tr>';
                        i.append(a);
                    });
                } else {
                    console.log("Data yang diterima bukanlah array.");
                }
            }

            $('input[type="search"]').on("input", function() {
                var query = $(this).val();
                if (query.trim()) {
                    var a = {
                        query: query
                    };
                    $.ajax({
                        url: "/api/search-buku",
                        type: "GET",
                        data: a,
                        success: function(t) {
                            updateTable(t);
                        },
                        error: function(t) {
                            console.log("Error fetching data:", t);
                        }
                    });
                } else {
                    showDataBuku();
                }
            });

            showDataBuku();

            var id_buku;

            $("#pinjamModal").on("show.bs.modal", function(t) {
                id_buku = $(t.relatedTarget).data("id");
                $.ajax({
                    url: "/api/show-by-id-buku/" + id_buku,
                    type: "GET",
                    success: function(t) {
                        $("#detailJudul").text(t.judul);
                        $("#detailPenulis").text(t.penulis);
                        $("#detailPenerbit").text(t.penerbit);
                        $("#detailTahunTerbit").text(t.tahun_terbit);
                        $("#detailStok").text(t.stok);
                    },
                    error: function(t) {
                        console.log("Error fetching book data:", t);
                    }
                });
            });

            $("#btnBuatPinjaman").click(function() {
                var data = {
                    id_buku: id_buku,
                    _token: '{{ csrf_token() }}'
                };
                $.ajax({
                    url: '/create-pinjam',
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        window.open('/peminjam/buku/' + response.data.id, 'newwindow',
                            'width=587,height=814');
                        location.reload();
                    },
                    error: function(error) {
                        console.log("Error creating data:", error);
                    }
                });
            });

        });
    </script>

@endsection
