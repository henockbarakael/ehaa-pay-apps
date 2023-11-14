<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>finwallapp V2.0 - Mobile HTML template</title>
    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="manifest" href="manifest.json">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('assets/img/favicon180.png')}}" sizes="180x180">
    <link rel="icon" href="{{ asset('assets/img/favicon32.png')}}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('assets/img/favicon16.png')}}" sizes="16x16" type="image/png">
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="{{ asset('assets/css2-1?family=Open+Sans:wght@300;400;600;700&display=swap')}}" rel="stylesheet">
    <!-- bootstrap icons -->
    <link rel="stylesheet" href="{{ asset('assets/npm/bootstrap-icons%401.5.0/font/bootstrap-icons-1.css')}}">
    <!-- swiper carousel css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiperjs-6.6.2/swiper-bundle.min.css')}}">
    <!-- style css for this template -->
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet" id="style">
</head>
<body class="body-scroll d-flex flex-column h-100" data-page="signin">
@include('layouts.loader')
<!-- Begin page content -->
<main class="container-fluid h-100 ">
    @yield('content')
</main>
    <!-- Required jquery and libraries -->
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-5/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Customized jquery file  -->
    <script src="{{ asset('assets/js/main.js')}}"></script>
    <script src="{{ asset('assets/js/color-scheme.js')}}"></script>

    <!-- swiper js script -->
    <script src="{{ asset('assets/vendor/swiperjs-6.6.2/swiper-bundle.min.js')}}"></script>

    <!-- page level custom script -->
    <script src="{{ asset('assets/js/app.js')}}"></script>
</body>
</html>
