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
<body class="body-scroll" data-page="index">

    <!-- loader section -->
    @include('layouts.loader')
    <!-- loader section ends -->

    <!-- Sidebar main menu -->
    <div class="sidebar-wrap  sidebar-overlay">
        <!-- Add pushcontent or fullmenu instead overlay -->
        <div class="closemenu text-muted">Close Menu</div>
        <div class="sidebar ">
            <!-- user information -->
            @include('layouts.user-information')
            <!-- user emnu navigation -->
            @include('layouts.menu-navigation')
        </div>
    </div>
    <!-- Sidebar main menu ends -->

    <!-- Begin page -->
    <main class="h-100">

        <!-- Header -->
        @include('layouts.header')
        <!-- Header ends -->

        <!-- main page content -->
        <div class="main-container container">
            @yield('content')
        </div>
        <!-- main page content ends -->

    </main>
    <!-- Page ends-->

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <ul class="nav nav-pills nav-justified">
                <li class="nav-item">
                    <a class="nav-link active" href="index.html">
                        <span>
                            <i class="nav-icon bi bi-house"></i>
                            <span class="nav-text">Home</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="stats.html">
                        <span>
                            <i class="nav-icon bi bi-binoculars"></i>
                            <span class="nav-text">Statistics</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item centerbutton">
                    <button type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#menumodal" id="centermenubtn">
                        <span class="theme-radial-gradient">
                            <i class="bi bi-grid size-22"></i>
                        </span>
                    </button>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.html">
                        <span>
                            <i class="nav-icon bi bi-bag"></i>
                            <span class="nav-text">Shop</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="wallet.html">
                        <span>
                            <i class="nav-icon bi bi-wallet2"></i>
                            <span class="nav-text">Wallet</span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </footer>
    <!-- Menu Modal -->
    <div class="modal fade" id="menumodal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content shadow">
                <div class="modal-body">
                    <h1 class="mb-4"><span class="text-secondary fw-light">Quick</span><br>Actions!</h1>
                    <div class="text-center">
                        <img src="{{ asset('assets/img/QRCode.png')}}" alt="" class="mb-2">
                        <p class="small text-secondary mb-4">Ask to scan this QR-Code<br>to accept money</p>
                    </div>
                    <div class="row justify-content-center mb-4">
                        <div class="col-auto text-center">
                            <a href="bills.html" class="avatar avatar-70 p-1 shadow-sm shadow-danger rounded-20 bg-opac mb-2" data-bs-dismiss="modal">
                                <div class="icons text-danger">
                                    <i class="bi bi-receipt-cutoff size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Pay Bill</p>
                        </div>

                        <div class="col-auto text-center">
                            <a href="sendmoney.html" class="avatar avatar-70 p-1 shadow-sm shadow-purple rounded-20 bg-opac mb-2" data-bs-dismiss="modal">
                                <div class="icons text-purple">
                                    <i class="bi bi-arrow-up-right size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Send Money</p>
                        </div>

                        <div class="col-auto text-center">
                            <a href="receivemoney.html" class="avatar avatar-70 p-1 shadow-sm shadow-success rounded-20 bg-opac mb-2" data-bs-dismiss="modal">
                                <div class="icons text-success">
                                    <i class="bi bi-arrow-down-left size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Receive Money</p>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-2">
                        <div class="col-auto text-center">
                            <a href="withdraw.html" class="avatar avatar-70 p-1 shadow-sm shadow-secondary rounded-20 bg-opac mb-2" data-bs-dismiss="modal">
                                <div class="icons text-secondary">
                                    <i class="bi bi-bank size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Withdraw</p>
                        </div>

                        <div class="col-auto text-center">
                            <a href="addmoney.html" class="avatar avatar-70 p-1 shadow-sm shadow-warning rounded-20 bg-opac mb-2" data-bs-dismiss="modal">
                                <div class="icons text-warning">
                                    <i class="bi bi-wallet2 size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Add Money</p>
                        </div>

                        <div class="col-auto text-center">
                            <div class="avatar avatar-70 p-1 shadow-sm shadow-info rounded-20 bg-opac mb-2" data-bs-dismiss="modal">
                                <div class="icons text-info">
                                    <i class="bi bi-tv size-24"></i>
                                </div>
                            </div>
                            <p class="size-10 text-secondary">Recharge</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer ends-->

    <!-- PWA app install toast message -->
    <div class="position-fixed bottom-0 start-50 translate-middle-x  z-index-99">
        <div class="toast mb-3" role="alert" aria-live="assertive" aria-atomic="true" id="toastinstall" data-bs-animation="true">
            <div class="toast-header">
                <img src="{{ asset('assets/img/favicon32.png')}}" class="rounded me-2" alt="...">
                <strong class="me-auto">Install PWA App</strong>
                <small>now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <div class="row">
                    <div class="col">
                        Click "Install" to install PWA app & experience indepedent.
                    </div>
                    <div class="col-auto align-self-center ps-0">
                        <button class="btn-default btn btn-sm" id="addtohome">Install</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Required jquery and libraries -->
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-5/js/bootstrap.bundle.min.js')}}"></script>

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

    <!-- page level custom script -->
    <script src="{{ asset('assets/js/app.js')}}"></script>

</body>

</html>