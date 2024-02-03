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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#savePdfButton').on('click', function() {
                window.location.href = '/petugas/pdf-peminjam';
            });
        });

        $(document).ready(function() {
            $('#saveExcelButton').on('click', function() {
                window.location.href = '/petugas/excel-peminjam';
            });
        });
    </script>
@endsection
