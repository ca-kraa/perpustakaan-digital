@extends('layout.main2')
@section('title', 'Selamat Datang')
@section('Dashboard Untuk', 'Petugas')


@section('konten')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">book</i>
                        </div>
                        <div class="text-end pt-1" id="buku-info">
                            <p class="text-sm mb-0 text-capitalize">Buku</p>
                            <h4 class="mb-0">Loading...</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <div class="text-end pt-1" id="user-info">
                            <p class="text-sm mb-0 text-capitalize">Pengguna</p>
                            <h4 class="mb-0">Loading...</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">reviews</i>
                        </div>
                        <div class="text-end pt-1" id="ulasan-info">
                            <p class="text-sm mb-0 text-capitalize">Ulasan</p>
                            <h4 class="mb-0">Loading...</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">category</i>
                        </div>
                        <div class="text-end pt-1" id="kategori-info">
                            <p class="text-sm mb-0 text-capitalize">Kategori</p>
                            <h4 class="mb-0">Loading...</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/cdn') }}/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/api/jumlah-buku',
                type: 'GET',
                success: function(response) {
                    $('#buku-info h4').text(response);
                },
                error: function(error) {
                    console.log('Gagal memuat jumlah Buku:', error);
                }
            });
        });


        $(document).ready(function() {
            $.ajax({
                url: '/api/jumlah-user',
                type: 'GET',
                success: function(response) {
                    $('#user-info h4').text(response);
                },
                error: function(error) {
                    console.log('Gagal memuat jumlah Pengguna:', error);
                }
            });
        });

        $(document).ready(function() {
            $.ajax({
                url: '/api/jumlah-ulasan',
                type: 'GET',
                success: function(response) {
                    $('#ulasan-info h4').text(response);
                },
                error: function(error) {
                    console.log('Gagal memuat jumlah Ulasan:', error);
                }
            });
        });

        $(document).ready(function() {
            $.ajax({
                url: '/api/jumlah-kategori',
                type: 'GET',
                success: function(response) {
                    $('#kategori-info h4').text(response);
                },
                error: function(error) {
                    console.log('Gagal memuat jumlah Kategori:', error);
                }
            });
        });
    </script>
@endsection
