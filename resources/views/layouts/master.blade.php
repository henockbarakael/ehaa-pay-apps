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
    {{-- <link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}"> --}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    
    <style>.barak-mode {
        --fimobile-sidebar: var(--fimobile-theme-color);
        --fimobile-sidebar-text: #ffffff;
        --fimobile-sidebar-text-active: #ffffff;
        --fimobile-card-color: rgba(255, 255, 255, 0.1);
        --fimobile-card-text: #ffffff;
        --fimobile-input-color: rgba(0, 0, 0, 0.25);
        --fimobile-input-bordercolor: rgba(255, 255, 255, 0.1);
        --fimobile-input-text: #ffffff;
        --fimobile-theme-color: #0a298d;
        --fimobile-theme-color-light: rgba(10, 41, 141, 0.5);
        --fimobile-theme-text: #ffffff;
        --fimobile-theme-modal: #0b2783;
        --fimobile-header: transparent;
        --fimobile-header-active: #03175a;
        --fimobile-header-text: #ffffff;
        --fimobile-footer: #03175a;
        --fimobile-footer-text: #6683e0;
        --fimobile-footer-text-active: var(--fimobile-theme-text);
        --fimobile-page-bg-1: #001149;
        --fimobile-page-bg-2: #000000;
        --fimobile-page-text: red;
        --fimobile-page-link: var(--fimobile-theme-color);
      }

      .btn-service{
        
      }

      .bg-ehaa {
        background-color: #1fa903;
      }
    
    </style>
</head>
<body class="body-scroll" data-page="wallet">

    <!-- loader section -->
    @include('layouts.loader')
    <!-- loader section ends -->

    <!-- Sidebar main menu -->
    @include('layouts.sidebar')
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
                    <a class="nav-link" href="#">
                        <span>
                            <i class="nav-icon bi bi-house"></i>
                            <span class="nav-text">Accueil</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span>
                            <i class="nav-icon bi bi-laptop"></i>
                            <span class="nav-text">Historique</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item centerbutton">
                    <div class="nav-link">
                        <span class="theme-radial-gradient">
                            <i class="close bi bi-x"></i>
                            <img src="{{ asset('assets/img/centerbutton.svg')}}" class="nav-icon" alt="">
                        </span>
                        <div class="nav-menu-popover justify-content-between">
                            <button type="button" class="btn btn-lg btn-icon-text" onclick="window.location.replace('pay.html');">
                                <i class="bi bi-arrow-up-right-circle size-32"></i><span>Envois</span>
                            </button>

                            <button type="button" class="btn btn-lg btn-icon-text" onclick="window.location.replace('sendmoney.html');">
                                <i class="bi bi-plus-circle size-32"></i><span>Dépôt</span>
                            </button>

                            <button type="button" class="btn btn-lg btn-icon-text" onclick="window.location.replace('receivemoney.html');">
                                <i class="bi bi-arrow-down-left-circle size-32"></i><span>Retrait</span>
                            </button>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#l">
                        <span>
                            <i class="nav-icon bi bi-gift"></i>
                            <span class="nav-text">Rewards</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <span>
                            <i class="nav-icon bi bi-wallet2"></i>
                            <span class="nav-text">Wallet</span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </footer>
    <!-- Footer ends-->

    <!-- Deposit Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="deposit_modal" tabindex="-1" aria-labelledby="deposit_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xsm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="deposit_modalLabel">Faire un dépôt</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <form id="deposit" class="row h-100 mb-4">
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <select class="form-control" id="operator">
                                    <option selected=""></option>
                                    <option value="orange">Orange money</option>
                                    <option value="airtel">Airtel money</option>
                                    <option value="mpesa">Mpesa</option>
                                </select>
                                <label for="operator">Opérateur</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group form-floating  mb-3">
                                <input type="tel" class="form-control" name="phone_number" id="phone_number">
                                <label for="phone_number">Numéro de téléphone</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group form-floating  mb-3">
                                <input type="number" class="form-control"   id="amount">
                                <label for="amount">Montant</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <select class="form-control" id="currency" name="currency">
                                    <option selected=""></option>
                                    <option value="CDF">CDF</option>
                                    <option value="USD">USD</option>
                                </select>
                                <label for="currency">Devise</label>
                            </div>
                        </div>
                    </form>
                </div>
                <button type="button" class="btn btn-lg btn-default rounded-15" data-bs-dismiss="modal">Confirmer</button>
            </div>
        </div>
    </div>
    <!-- Deposit Modal ends-->

    <!-- Withdraw Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="withdraw_modal" tabindex="-1" aria-labelledby="withdraw_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xsm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="withdraw_modalLabel">Faire un retrait</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <form id="withdraw" class="row h-100 mb-4">
                        <div class="col-12">
                            <div class="form-group form-floating  mb-3">
                                <input type="tel" class="form-control" name="phone_number" id="phone_number">
                                <label for="phone_number">Numéro bénéficiaire</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group form-floating  mb-3">
                                <input type="number" class="form-control"   id="amount">
                                <label for="amount">Montant</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <select class="form-control" id="currency" name="currency">
                                    <option selected=""></option>
                                    <option value="CDF">CDF</option>
                                    <option value="USD">USD</option>
                                </select>
                                <label for="currency">Devise</label>
                            </div>
                        </div>
                    </form>
                </div>
                <button type="button" class="btn btn-lg btn-default rounded-15" data-bs-dismiss="modal">Confirmer</button>
            </div>
        </div>
    </div>
    <!-- Withdraw Modal ends-->

    <!-- SendMoney Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="sendmoney_modal" tabindex="-1" aria-labelledby="sendmoney_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xsm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="sendmoney_modalLabel">Envoyer de l'argent</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    
                    <form id="sendmoney" class="row h-100 mb-4">
                        <div class="col-12">
                            <div class="form-group form-floating  mb-3">
                                <input type="tel" class="form-control" name="phone_number" id="phone_number">
                                <label for="phone_number">Numéro bénéficiaire</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group form-floating  mb-3">
                                <input type="number" class="form-control"   id="amount">
                                <label for="amount">Montant</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <select class="form-control" id="currency" name="currency">
                                    <option selected=""></option>
                                    <option value="CDF">CDF</option>
                                    <option value="USD">USD</option>
                                </select>
                                <label for="currency">Devise</label>
                            </div>
                        </div>
                    </form>
                </div>
                <button type="button" class="btn btn-lg btn-default rounded-15" data-bs-dismiss="modal">Confirmer</button>
            </div>
        </div>
    </div>
    <!-- SendMoney Modal ends-->

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

    <!-- page level custom script -->
    <script src="{{ asset('assets/js/app.js')}}"></script>
    {{-- <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script> --}}
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    
    @yield('script')
</body>