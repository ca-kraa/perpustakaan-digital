<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/dashboard-admin') }}/assets/img/apple-icon.png">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link href="{{ asset('assets/dashboard-admin') }}/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ asset('assets/dashboard-admin') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="{{ asset('assets/dashboard-admin') }}/assets/css/material-dashboard.css?v=3.1.0"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="g-sidenav-show  bg-gray-200">
    @include('template.sidebar2')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('template.navbar')
        @yield('konten')
        @include('template.script')
</body>

</html>
