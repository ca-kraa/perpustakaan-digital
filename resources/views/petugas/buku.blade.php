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
                            <h6 class="text-white text-capitalize ps-3 mb-0">Data Buku</h6>
                        </div>
                        <button class="btn btn-icon btn-3 btn-primary mt-2" type="button" id="btnTambahPetugas"
                            data-bs-toggle="modal" data-bs-target="#registrationModal">
                            <span class="btn-inner--icon"><i class="material-icons">book</i></span>
                            <span class="btn-inner--text">Tambahkan Buku</span>
                        </button>
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
                                <tbody id="bukuTableBody">
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
            $.ajax({
                url: '/api/show-data-buku',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.length > 0) {
                        data.forEach(function(buku) {
                            var row = '<tr>' +
                                '<td>' + buku.judul + '</td>' +
                                '<td>' + buku.penulis + '</td>' +
                                '<td>' + buku.penerbit + '</td>' +
                                '<td>' + buku.tahun_terbit + '</td>' +
                                '<td>' +
                                '<button class="btn btn-danger btn-sm" onclick="deleteBuku(' +
                                buku.id + ')">Delete</button>' +
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
        });

        function deleteBuku(id) {
            $.ajax({
                url: '/api/delete-buku/' + id,
                type: 'DELETE',
                success: function() {
                    $('#bukuTableBody').empty();
                    var emptyRow = '<tr id="emptyRow">' +
                        '<td class="text-center" colspan="5">' +
                        'Silahkan tambahkan data terlebih dahulu <br>' +
                        '(〃￣︶￣)人(￣︶￣〃)' +
                        '</td>' +
                        '</tr>';
                    $('#bukuTableBody').append(emptyRow);
                },
                error: function(error) {
                    console.log('Error deleting data:', error);
                }
            });
        }
    </script>
@endsection
