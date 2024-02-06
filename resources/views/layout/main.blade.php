<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/dashboard-admin') }}/assets/img/apple-icon.png">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <title>
        Dashboard @yield('title')
    </title>
    <link href="{{ asset('assets/cdn') }}/roboto.css" rel="stylesheet" />
    <link href="{{ asset('assets/dashboard-admin') }}/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ asset('assets/dashboard-admin') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
    <link href="{{ asset('assets/cdn') }}/google_icon.css" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('assets/dashboard-admin') }}/assets/css/material-dashboard.css?v=3.1.0"
        rel="stylesheet" />
    <link href="{{ asset('assets/cdn') }}/animate_css.css" rel="stylesheet" />
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
