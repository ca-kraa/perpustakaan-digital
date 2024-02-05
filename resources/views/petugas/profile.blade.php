@extends('layout.main2')
@section('title', 'Petugas | Profile')
@section('Dashboard Untuk', 'Petugas')

@section('konten')

    <div class="container-fluid px-2 px-md-4 user-select-none">
        <div class="page-header min-height-300 border-radius-xl mt-4"
            style="background-image: url('https://images.unsplash.com/photo-1505664194779-8beaceb93744?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);">
            <span class="mask  bg-gradient-secondary  opacity-6"></span>
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
                <div class="row">
                    <div class="row">
                        <div class="col-12 col-xl-6">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <h6 class="mb-0">Account Settings</h6>
                                </div>
                                <div class="card-body p-3">
                                    <ul class="list-group">
                                        <li class="list-group-item border-0 px-0">
                                            <div class="input-group input-group-outline my-3">
                                                <h6 class="text-capitalize text-body text-lg font-weight-bolder">Email
                                                    <input type="email" class="form-control"
                                                        value="{{ Auth::user()->email }}" disabled>
                                                </h6>
                                            </div>
                                        </li>
                                        <li class="list-group-item border-0 px-0">
                                            <h6 class="text-capitalize text-break text-body text-lg font-weight-bolder">
                                                alamat
                                                <p class="form-control">{{ Auth::user()->alamat }}</p>
                                            </h6>
                                        </li>
                                        <li class="list-group-item border-0 px-0">
                                            <h6 class="text-capitalize text-break text-body text-lg font-weight-bolder">
                                                token
                                                <p class="form-control">{{ Auth::user()->bearer_token }}</p>
                                            </h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <h6 class="mb-0">Password Update</h6>
                                </div>
                                <div class="card-body p-3">
                                    <ul class="list-group">
                                        <li class="list-group-item border-0 px-0">
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label">New Password</label>
                                                <input type="password" class="form-control">
                                            </div>
                                        </li>
                                        <li class="list-group-item border-0 px-0">
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label">Confirm Password</label>
                                                <input type="password" class="form-control">
                                            </div>
                                        </li>
                                        <button type="button" class="btn btn-secondary">Update Password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
