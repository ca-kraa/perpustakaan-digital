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

    <script src="{{ asset('assets/cdn') }}/jquery.js"></script>
    <script src="{{ asset('assets/cdn') }}/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            function fetchInitialData() {
                $.ajax({
                    url: '/api/show-data-buku',
                    type: 'GET',
                    success: function(data) {
                        renderData(data);
                    },
                    error: function() {
                        console.log('Error fetching initial data');
                    }
                });
            }

            function fetchData(searchQuery) {
                if (!searchQuery.trim()) {
                    fetchInitialData();
                    return;
                }

                var requestData = {
                    query: searchQuery
                };

                $.ajax({
                    url: '/api/search-buku',
                    type: 'GET',
                    data: requestData,
                    success: function(data) {
                        renderData(data);
                    },
                    error: function(error) {
                        console.log('Error fetching data:', error);
                    }
                });
            }


            function renderData(data) {
                var bukuTableBody = $('#bukuTableBody');
                bukuTableBody.empty();

                if (Array.isArray(data)) {
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
                            '<h6 class="mt-2 ml-4 text-sm">' + buku.tahun_terbit + '</h6>' +
                            '</div>' +
                            '</td>' +
                            '</tr>';
                        bukuTableBody.append(row);
                    });
                } else {
                    console.log('Data yang diterima bukanlah array.');
                }
            }

            $('input[type="search"]').on('input', function() {
                var searchQuery = $(this).val();
                fetchData(searchQuery);
            });

            fetchInitialData();
        });
    </script>
@endsection
