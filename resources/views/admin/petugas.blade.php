@extends('layout.main')
@section('title', 'Petugas')
@section('Dashboard Untuk', 'Admin')

@section('konten')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3 mb-0">Data Petugas</h6>
                        </div>
                        <button class="btn btn-icon btn-3 btn-primary mt-2" type="button" id="btnTambahPetugas"
                            data-bs-toggle="modal" data-bs-target="#registrationModal">
                            <span class="btn-inner--icon"><i class="material-icons">person_add</i></span>
                            <span class="btn-inner--text">Tambahkan Petugas</span>
                        </button>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0" id="tabelPetugas">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Username</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Email</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registrationModalLabel">Registration Form</h5> <button type="button"
                        class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="registrationForm">
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group input-group-outline my-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" required>
                                </div>
                                <div class="input-group input-group-outline my-3">
                                    <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="namaLengkap" required>
                                </div>
                                <div class="input-group input-group-outline my-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group input-group-outline my-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="input-group input-group-outline my-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" required>
                                </div>
                                <div class="input-group input-group-outline my-3">
                                    <label for="level" class="form-label"></label>
                                    <select class="form-control" id="level" required>
                                        <option value="" disabled selected>Select a Role</option>
                                        <option value="administrator">Administrator</option>
                                        <option value="petugas">Petugas</option>
                                        <option value="peminjam">Peminjam</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="confirmBtn">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            function validateForm() {
                var username = $('#username').val();
                var namaLengkap = $('#namaLengkap').val();
                var alamat = $('#alamat').val();
                var email = $('#email').val();
                var level = $('#level').val();
                var password = $('#password').val();

                if (!username || !namaLengkap || !alamat || !level || !email || !password) {
                    alert('Semua kolom harus diisi.');
                    return false;
                }

                return true;
            }

            $('#confirmBtn').on('click', function() {
                if (validateForm()) {
                    var formData = {
                        level: $('#level').val(),
                        username: $('#username').val(),
                        namaLengkap: $('#namaLengkap').val(),
                        alamat: $('#alamat').val(),
                        email: $('#email').val(),
                        password: $('#password').val()
                    };

                    $.ajax({
                        url: '/api/register',
                        method: 'POST',
                        data: formData,
                        success: function(response) {
                            var phoneNumber = prompt('Masukkan nomor WhatsApp Anda:');
                            if (phoneNumber) {
                                var whatsappLink = 'https://wa.me/' + phoneNumber + '?text=' +
                                    encodeURIComponent(
                                        `=====================%0AUsername%20:%20${formData.username}%0ANama%20Lengkap%20:%20${formData.namaLengkap}%0AAlamat%20:%20${formData.alamat}%0AEmail%20:%20${formData.email}%0A%0ASetelah%20Anda%20menerima%20detail%20ini,%20kami%20sangat%20menyarankan%20Anda%20untuk%20segera%20mengubah%20password%20Anda%20demi%20keamanan%20akun%20Anda.%20Jika%20Anda%20mengalami%20kesulitan%20atau%20membutuhkan%20bantuan%20lebih%20lanjut.%0ATerima%20kasih%0A%0A====================`
                                    );

                                window.open(whatsappLink, '_blank');
                            }
                        },
                        error: function(error) {
                            alert('Gagal mendaftar. Silakan coba lagi.');
                            console.error(error);
                        }
                    });
                }
            });

            function loadDataPetugas() {
                $.ajax({
                    url: '/api/data-petugas',
                    method: 'GET',
                    success: function(response) {
                        $('#tabelPetugas tbody').empty();
                        $.each(response.data, function(index, petugas) {
                            var row = '<tr>' +
                                '<td class="align-middle">' +
                                '<div class="d-flex px-2 py-1">' +
                                '<h6 class="mt-2 ml-4 text-sm">' + petugas.namaLengkap +
                                '</h6>' +
                                '</div>' +
                                '</td>' +
                                '<td>' + petugas.username + '</td>' +
                                '<td class="text-center">' + petugas.email + '</td>' +
                                '<td class="align-middle">' +
                                '<a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">' +
                                'Edit' +
                                '</a>' +
                                '</td>' +
                                '</tr>';
                            $('#tabelPetugas tbody').append(row);
                        });
                    },
                    error: function() {
                        console.log('Gagal mengambil data petugas.');
                        alert('Gagal mengambil data petugas.');
                    }
                });
            }

            loadDataPetugas();
        });
    </script>
@endsection
