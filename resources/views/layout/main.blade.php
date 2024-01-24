<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/dashboard-admin') }}/assets/img/apple-icon.png">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <title>
        Dashboard Admin | @yield('title')
    </title>
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link href="{{ asset('assets/dashboard-admin') }}/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ asset('assets/dashboard-admin') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="{{ asset('assets/dashboard-admin') }}/assets/css/material-dashboard.css?v=3.1.0"
        rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class="g-sidenav-show  bg-gray-200">
    @include('template.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('template.navbar')
        @yield('konten')

    @include('template.script')
</body>

</html>
