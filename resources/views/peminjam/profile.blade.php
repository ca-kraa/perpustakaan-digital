@extends('layout.main3')
@section('title', 'Profile')
@section('Dashboard Untuk', 'Peminjam')

@section('konten')
    <div class="container-fluid px-2 px-md-4 user-select-none">
        <div class="page-header min-height-300 border-radius-xl mt-4"
            style="background-image: url('https://images.unsplash.com/photo-1465982046896-5172ca240f27?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);">
            <span class="mask  bg-gradient-info  opacity-6"></span>
        </div>
        <div class="card card-body mx-3 mx-md-4 mt-n6">
            <div class="row gx-4 mb-2">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ asset('assets/dashboard-admin') }}/assets/img/bruce-mars.jpg" alt="profile_image"
                            class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ Auth::user()->namaLengkap }} / {{ Auth::user()->username }}
                        </h5>
                        <p class="mb-0 font-weight-normal text-sm text-capitalize">
                            {{ Auth::user()->level }}
                        </p>
                    </div>
                </div>
                <div class="card card-plain">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Account Info</h6>
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 px-0">
                                <div class="input-group input-group-outline my-3">
                                    <h6 class="text-capitalize text-body text-lg font-weight-bolder">Email
                                        <input type="email" class="form-control" value="{{ Auth::user()->email }}"
                                            disabled>
                                    </h6>
                                </div>
                            </li>
                            <li class="list-group-item border-0 px-0">
                                <h6 class="text-capitalize text-break text-body text-lg font-weight-bolder">
                                    alamat
                                    <p class="form-control">{{ Auth::user()->alamat }}</p>
                                </h6>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <li class="list-group-item border-0 px-0">
                <h6 class="text-capitalize text-break text-body text-lg font-weight-bolder">
                    Bearer Token
                    <div class="input-group">
                        <input type="text" class="form-control" id="bearerToken" value="{{ Auth::user()->bearer_token }}"
                            readonly>
                        <button class="btn btn-outline-info btn-sm" type="button" onclick="copyToClipboard()">
                            <i class="material-icons" style="font-size: 1.5em; vertical-align: middle;">content_copy</i>
                        </button>
                    </div>
                </h6>
            </li>
            <hr class="horizontal dark mt-0 mb-2">
        </div>

        <script src="{{ asset('assets/cdn') }}/jquery.js"></script>
        <script src="{{ asset('assets/cdn') }}/bootstrap.bundle.min.js"></script>

        <script>
            function copyToClipboard() {
                var copyText = document.getElementById("bearerToken");
                copyText.select();
                copyText.setSelectionRange(0, 99999);

                document.execCommand("copy");

                var alertContainer = document.createElement("div");
                alertContainer.className =
                    "alert alert-secondary text-white position-fixed top-0 end-0 m-3 animate__animated animate__fadeInDown";
                alertContainer.style.maxWidth = "300px";

                var alertContent = document.createTextNode("Bearer Token telah disalin");
                alertContainer.appendChild(alertContent);

                document.body.appendChild(alertContainer);

                setTimeout(function() {
                    alertContainer.classList.remove("animate__fadeInDown");
                    alertContainer.classList.add("animate__fadeOutUp");

                    setTimeout(function() {
                        alertContainer.remove();
                    }, 1000);
                }, 3000);
            }
        </script>

    @endsection
