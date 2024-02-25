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

                        <button class="btn btn-icon btn-3 btn-danger mt-2" type="button" id="refresh"
                        style="margin-right: 10px;">
                        <span class="btn-inner--icon"><i class="material-icons">refresh</i></span>
                        <span class="btn-inner--text">Refresh</span>
                    </button>


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

    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-normal" id="statusModalLabel">Ubah Status</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id">
                    <p id="id_user"></p>
                    <p id="id_buku"></p>
                    <p id="tanggal_peminjaman"></p>
                    <p id="tanggal_pengembalian"></p>
                    <div class="input-group">
                        <select id="status" class="form-select">
                            <option value="Pending">Pending</option>
                            <option value="Sudah Di Kembalikan">Sudah Di Kembalikan</option>
                            <option value="Belum Di Kembalikan">Belum Di Kembalikan</option>
                            <option value="Sedang Di Pinjam">Sedang Di Pinjam</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" id="updateStatusButton" class="btn bg-gradient-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/cdn') }}/jquery.js"></script>
    <script src="{{ asset('assets/cdn') }}/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            function fetchData() {
                $.ajax({
                    url: "/api/show-data-peminjam",
                    method: "GET",
                    success: function(data) {
                        var tbody = $("#peminjamBody");
                        tbody.empty();
                        $.each(data, function(index, item) {
                            var row = $("<tr>");
                            row.append(
                                '<td class="align-middle"><div class="d-flex px-2 py-1"><h6 class="mt-2 ml-4 text-sm">' +
                                item.id_user + "</h6></div></td>");
                            row.append(
                                '<td class="align-middle"><div class="d-flex px-2 py-1"><h6 class="mt-2 ml-4 text-sm">' +
                                item.id_buku + "</h6></div></td>");
                            row.append(
                                '<td class="align-middle"><div class="d-flex px-2 py-1"><h6 class="mt-2 ml-4 text-sm">' +
                                item.tanggal_peminjaman + "</h6></div></td>");
                            row.append(
                                '<td class="align-middle"><div class="d-flex px-2 py-1"><h6 class="mt-2 ml-4 text-sm">' +
                                item.tanggal_pengembalian + "</h6></div></td>");
                            var buttonColor;
                            if (item.status_peminjam === 'Pending') {
                                buttonColor = 'btn-info';
                            } else if (item.status_peminjam === 'Sudah Di Kembalikan') {
                                buttonColor = 'btn-success';
                            } else if (item.status_peminjam === 'Belum Di Kembalikan') {
                                buttonColor = 'btn-danger';
                            }
                            else if (item.status_peminjam === 'Sedang Di Pinjam') {
                                buttonColor = 'btn-warning';
                            }

                            var button = '<td class="align-middle"><button class="btn btn-sm ' +
                                buttonColor +
                                ' btn-update-status" type="button" data-bs-toggle="modal" data-bs-target="#statusModal" data-id="' +
                                item.id + '">' + item.status_peminjam + '</button></td>';
                            row.append(button);
                            tbody.append(row);
                        });
                    },
                    error: function(err) {
                        console.error("Gagal mengambil data:", err);
                    }
                });
            }

            fetchData();

            $("#refresh").on("click", function() {
    fetchData();
});


$("#savePdfButton").on("click", function() {
    Swal.fire({
        title: 'Memuat Dokumen PDF',
        html: 'Permintaan Anda Sedang Di Proses',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(() => {
        window.location.href = "/petugas/pdf-peminjam";
        Swal.close();
    }, 4000);
});


$("#saveExcelButton").on("click", function() {
    Swal.fire({
        title: 'Memuat Dokumen Excel',
        html: 'Permintaan Anda Sedang Di Proses',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(() => {
        window.location.href = "/petugas/excel-peminjam";
        Swal.close();
    }, 4000); 
});

$("a[href='print-peminjam']").on("click", function(e) {
    e.preventDefault(); 
    let timerInterval;
    Swal.fire({
        title: "Anda akan dialihkan ke halaman cetak",
        html: "Mohon tunggu...",
        didOpen: () => {
            Swal.showLoading();
        },
        didClose: () => {
            clearInterval(timerInterval);
        }
    });

    setTimeout(() => {
        window.open("print-peminjam", "_blank");
        Swal.close();
    }, 2000);

});


            $('#statusModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var modal = $(this);
                modal.find('.modal-body #id').val(id);

                $.ajax({
                    url: "/api/show-peminjam-by-id/" + id,
                    method: "GET",
                    success: function(data) {
                        modal.find('.modal-body #id_user').text("ID User: " + data.id_user);
                        modal.find('.modal-body #id_buku').text("ID Buku: " + data.id_buku);
                        modal.find('.modal-body #tanggal_peminjaman').text(
                            "Tanggal Peminjaman: " + data.tanggal_peminjaman);
                        modal.find('.modal-body #tanggal_pengembalian').text(
                            "Tanggal Pengembalian: " + data.tanggal_pengembalian);
                        modal.find('.modal-body #status').val(data.status_peminjam);
                    },
                    error: function(err) {
                        console.error("Gagal mengambil data:", err);
                    }
                });
            });


            $("#updateStatusButton").on("click", function() {
                var id = $('#statusModal').find('.modal-body #id').val();
                var status = $('#statusModal').find('.modal-body #status').val();
                $.ajax({
                    url: "/api/update-status/" + id,
                    type: "PUT",
                    data: {
                        status_peminjam: status,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        fetchData();
                        location.reload();
                    },
                    error: function(err) {
                        console.error("Error updating status:", err);
                    }
                });
            });
        });


    </script>


@endsection
