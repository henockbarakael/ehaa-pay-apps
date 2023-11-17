<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Ehaa-Pay</title>
        <meta name="description" content="Notre service de paiement en ligne vous offre une solution pratique, sécurisée et rapide pour effectuer des transactions financières sur Internet. Que vous souhaitiez acheter des produits, payer des factures, effectuer des dons ou transférer de l'argent, notre service de paiement en ligne vous permet de le faire en toute simplicité.">
        <meta name="keywords" content="Ehaa, Ehaa-Pay, fintech">
        <meta property="og:image" content="http://ehaa-pay.com/assets/images/logo/ehaa.png')}}" />
        <meta property="og:image:secure_url" content="https://ehaa-pay.com/assets/images/logo/ehaa.png')}}" />
        <meta property="og:image:type" content="image/png" />
        <meta property="og:image:width" content="400" />
        <meta property="og:image:height" content="300" />
        <meta property="og:image:alt" content="Ehaa-Pay" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="author" content="Henock BARAKAEL | barahenock@gmail.com | +243828584688">
    
        <!-- manifest meta -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link rel="manifest" href="manifest.json">
    
        <!-- Favicons -->
        <link rel="apple-touch-icon" href="{{ asset('assets/img/fav.png')}}" sizes="180x180">
        <link rel="icon" href="{{ asset('assets/img/fav.png')}}" sizes="32x32" type="image/png">
        <link rel="icon" href="{{ asset('assets/img/fav.png')}}" sizes="16x16" type="image/png">
    
        <!-- Google fonts-->
    
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="{{ asset('assets/css2-2?family=Nunito:wght@400;600;700&display=swap')}}" rel="stylesheet">
        <link href="{{ asset('assets/css2-3?family=Open+Sans:wght@300;400;600;700&display=swap')}}" rel="stylesheet">
    
        <!-- bootstrap icons -->
        <link rel="stylesheet" href="{{ asset('assets/npm/bootstrap-icons%401.5.0/font/bootstrap-icons-2.css')}}">
    
        <!-- swiper carousel css -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/swiperjs-6.6.2/swiper-bundle.min.css')}}">
    
        <!-- style css for this template -->
        <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet" id="style">
        <link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}">
    </head>
    <body class="body-scroll d-flex flex-column h-100" data-page="signup">

        <!-- loader section -->
        @include('layouts.loader')
        <!-- loader section ends -->
    
        <!-- Begin page content -->
        <main class="container-fluid h-100">
            @yield('content')
        </main>
    
    
        <!-- Required jquery and libraries -->
        <script src="{{ asset('assets/js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{ asset('assets/js/popper.min.js')}}"></script>
        <script src="{{ asset('assets/vendor/bootstrap-5/js/bootstrap.bundle.min.js')}}"></script>

        <!-- cookie js -->
        <script src="{{ asset('assets/js/jquery.cookie.js')}}"></script>

        <!-- Customized jquery file  -->
        <script src="{{ asset('assets/js/main.js')}}"></script>
        <script src="{{ asset('assets/js/color-scheme.js')}}"></script>

        <!-- PWA app service registration and works -->
        <script src="{{ asset('assets/js/pwa-services.js')}}"></script>

        <!-- Chart js script -->
        <script src="{{ asset('assets/vendor/chart-js-3.3.1/chart.min.js')}}"></script>

        <!-- Progress circle js script -->
        <script src="{{ asset('assets/vendor/progressbar-js/progressbar.min.js')}}"></script>

        <!-- swiper js script -->
        <script src="{{ asset('assets/vendor/swiperjs-6.6.2/swiper-bundle.min.js')}}"></script>
        <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>

        <!-- page level custom script -->
        <script src="{{ asset('assets/js/app.js')}}"></script>
        @yield('script')
    </body>
</html>
