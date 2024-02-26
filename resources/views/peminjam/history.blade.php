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
                            <h6 class="text-white text-capitalize ps-3 mb-0 animate__bounce">History</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0" id="tabelBuku">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
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

<!-- Modal -->
<div class="modal fade" id="modalBeriPenilaian" tabindex="-1" aria-labelledby="modalBeriPenilaianLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalBeriPenilaianLabel">Beri Penilaian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_buku">
                <div class="mb-3">
                    <label for="ulasan" class="form-label">Ulasan</label>
                    <textarea class="form-control" id="ulasan" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <select class="form-control" id="rating">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitReview">Submit</button>
            </div>
        </div>
    </div>
</div>
    

    <script src="{{ asset('assets/cdn') }}/jquery.js"></script>
    <script src="{{ asset('assets/cdn') }}/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $.get('/show-peminjam-user', function(data) {
                $.each(data, function(index, item) {
                    var buttonColor;
                    if (item.status_peminjam === 'Pending') {
                        buttonColor = 'btn-info';
                    } else if (item.status_peminjam === 'Sudah Di Kembalikan') {
                        buttonColor = 'btn-success';
                    } else if (item.status_peminjam === 'Belum Di Kembalikan') {
                        buttonColor = 'btn-danger';
                    } else if (item.status_peminjam === 'Sedang Di Pinjam') {
                        buttonColor = 'btn-warning'
                    }

                    $('#bukuTableBody').append(`
                    <tr>
                        <td class="align-middle">
                            <div class="d-flex px-2 py-1">
                                <h6 class="mt-2 ml-4 text-sm">${item.judul_buku}</h6>
                            </div>
                        </td>
                        <td class="align-middle">
                            <div class="d-flex px-2 py-1">
                                <h6 class="mt-2 ml-4 text-sm">${item.tanggal_peminjaman}</h6>
                            </div>
                        </td>
                        <td class="align-middle">
                            <div class="d-flex px-2 py-1">
                                <h6 class="mt-2 ml-4 text-sm">${item.tanggal_pengembalian}</h6>
                            </div>
                        </td>
                        <td class="align-middle">
                            <div class="d-flex px-2 py-1">
                                <h6 class="mt-2 ml-4 text-sm"><button class="btn ${buttonColor}">${item.status_peminjam}</button></h6>
                            </div>
                        </td>
                    </tr>
                    `);
                });
            });
        });

        $(document).ready(function() {
    $(document).on('click', '.btn-success', function() {
        var id_buku = $(this).closest('tr').find('.id_buku').text();
        $('#id_buku').val(id_buku);
        $('#modalBeriPenilaian').modal('show');
    });

    $('#submitReview').click(function() {
        var id_buku = $('#id_buku').val();
        var ulasan = $('#ulasan').val();
        var rating = $('#rating').val();

        $.ajax({
            url: '/api/create-review',
            type: 'POST',
            data: {
                id_buku: id_buku,
                ulasan: ulasan,
                rating: rating
            },
            success: function(response) {
                alert(response.message);
                $('#modalBeriPenilaian').modal('hide');
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    });
});

    </script>


@endsection