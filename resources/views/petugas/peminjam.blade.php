@extends('layout.main2')
@section('title', 'Buku')
@section('Dashboard Untuk', 'Petugas')


@section('konten')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-secondary  shadow-secondary  border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3 mb-0">Data Peminjam</h6>
                        </div>

                        <button class="btn btn-icon btn-3 btn-success mt-2" id="saveExcelButton" type="button"
                            style="margin-right: 10px;">
                            <span class="btn-inner--icon"><i class="material-icons">table_view</i></span>
                            <span class="btn-inner--text">Simpan Excel</span>
                        </button>

                        <button class="btn btn-icon btn-3 btn-info mt-2" type="button" id="savePdfButton"
                            style="margin-right: 10px;">
                            <span class="btn-inner--icon"><i class="material-icons">picture_as_pdf</i></span>
                            <span class="btn-inner--text">Simpan PDF</span>
                        </button>
                        <a href="print-peminjam" target="_blank" class="btn btn-icon btn-3 btn-warning mt-2"
                            style="margin-right: 10px;">
                            <span class="btn-inner--icon"><i class="material-icons">print</i></span>
                            <span class="btn-inner--text">Cetak</span>
                        </a>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0" id="tabelPeminjam">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Nama</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Judul</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tanggal Peminjaman</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tanggal Pengembalian</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Status Peminjam</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="peminjamBody" class="display">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/cdn') }}/jquery.js"></script>
    <script src="{{ asset('assets/cdn') }}/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            function loadDataPeminjam() {
                $.ajax({
                    url: '/api/show-data-peminjam',
                    method: 'GET',
                    success: function(dataPeminjam) {
                        var tbody = $("#peminjamBody");
                        tbody.empty();

                        $.each(dataPeminjam, function(index, peminjam) {
                            var row = $("<tr>");

                            row.append(
                                '<td class="align-middle"><div class="d-flex px-2 py-1"><h6 class="mt-2 ml-4 text-sm">' +
                                peminjam.id_user + '</h6></div></td>');
                            row.append(
                                '<td class="align-middle"><div class="d-flex px-2 py-1"><h6 class="mt-2 ml-4 text-sm">' +
                                peminjam.id_buku + '</h6></div></td>');
                            row.append(
                                '<td class="align-middle"><div class="d-flex px-2 py-1"><h6 class="mt-2 ml-4 text-sm">' +
                                peminjam.tanggal_peminjaman + '</h6></div></td>');
                            row.append(
                                '<td class="align-middle"><div class="d-flex px-2 py-1"><h6 class="mt-2 ml-4 text-sm">' +
                                peminjam.tanggal_pengembalian + '</h6></div></td>');

                            var statusCell =
                                '<td class="align-middle"><div class="d-flex px-2 py-1">';
                            if (peminjam.status_peminjam === "Pending") {
                                statusCell +=
                                    '<span class="badge badge-md bg-secondary text-center">' +
                                    peminjam.status_peminjam + '</span>';
                            } else if (peminjam.status_peminjam === "Sudah Di Kembalikan") {
                                statusCell +=
                                    '<span class="badge badge-md bg-success text-center">' +
                                    peminjam.status_peminjam + '</span>';
                            } else if (peminjam.status_peminjam === "Belum Di Kembalikan") {
                                statusCell +=
                                    '<span class="badge badge-md bg-danger text-center">' +
                                    peminjam.status_peminjam + '</span>';
                            }
                            statusCell += '</div></td>';
                            row.append(statusCell);

                            tbody.append(row);
                        });
                    },
                    error: function(error) {
                        console.error('Gagal mengambil data:', error);
                    }
                });
            }

            loadDataPeminjam();

            $('#savePdfButton').on('click', function() {
                window.location.href = '/petugas/pdf-peminjam';
            });

            $('#saveExcelButton').on('click', function() {
                window.location.href = '/petugas/excel-peminjam';
            });
        });
    </script>

@endsection
