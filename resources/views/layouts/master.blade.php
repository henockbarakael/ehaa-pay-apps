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

      .transpagi {
  display: flex;
  padding-left: 0;
  list-style: none;
}

      .bg-ehaa {
        background-color: #0c3502;
      }
    
    </style>
    <style>
            #newpassword:invalid {
                border-color: #dc3545; /* Couleur rouge */
            }
            #password:invalid {
                border-color: #dc3545; /* Couleur rouge */
            }
            #confirmpassword:invalid {
                border-color: #dc3545; /* Couleur rouge */
            }

            #currentPassword_error::before {
                content: attr(title);
                color: #dc3545; /* Couleur rouge */
                position: absolute;
                top: 100%;
                left: 50%;
                transform: translateX(-50%);
                white-space: nowrap;
            }
            #newPassword_error::before {
                content: attr(title);
                color: #dc3545; /* Couleur rouge */
                position: absolute;
                top: 100%;
                left: 50%;
                transform: translateX(-50%);
                white-space: nowrap;
            }
            #confirmPassword_error::before {
                content: attr(title);
                color: #dc3545; /* Couleur rouge */
                position: absolute;
                top: 100%;
                left: 50%;
                transform: translateX(-50%);
                white-space: nowrap;
            }

            #currentPassword_error[data-bs-original-title]:hover::before,
            #newPassword_error[data-bs-original-title]:hover::before,
            #confirmPassword_error[data-bs-original-title]:hover::before,

            #currentPassword_error[data-bs-original-title][data-bs-placement^="top"]::before {
                display: block;
            }
            #newPassword_error[data-bs-original-title][data-bs-placement^="top"]::before {
                display: block;
            }
            #confirmPassword_error[data-bs-original-title][data-bs-placement^="top"]::before {
                display: block;
            }
        
        .modal-loading {
            pointer-events: none;
        }
    
        .modal-loading .modal-content:after {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            /* Ajoutez ici le style pour afficher votre loader ou compteur */
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
    <footer class="footer" style="background-color: #143208;">
        <div class="container">
            <ul class="nav nav-pills nav-justified">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('accueil') ? 'active' : '' }}" href="{{ route('accueil') }}">
                        <span>
                            <i class="nav-icon bi bi-house"></i>
                            <span class="nav-text">Accueil</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('history') ? 'active' : '' }}" href="{{ route('history') }}">
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
                            <button type="button" data-bs-target="#sendmoney_modal" data-bs-toggle="modal" class="btn btn-lg btn-icon-text">
                                <i class="bi bi-arrow-up-right-circle size-32"></i><span>Envois</span>
                            </button>

                            <button type="button" data-bs-target="#transfer_modal" data-bs-toggle="modal" class="btn btn-lg btn-icon-text" >
                                <i class="bi bi-arrow-right-circle size-32"></i><span>Transfert</span>
                            </button>

                            <button type="button" data-bs-target="#withdraw_modal" data-bs-toggle="modal" class="btn btn-lg btn-icon-text">
                                <i class="bi bi-arrow-down-left-circle size-32"></i><span>Retrait</span>
                            </button>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('account') ? 'active' : '' }}" href="{{ route('account') }}">
                        <span>
                            <i class="nav-icon bi bi-person-circle"></i>
                            <span class="nav-text">Compte</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('wallet') ? 'active' : '' }}" href="{{ route('wallet') }}">
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
                        <form id="depositForm" class="row h-100 mb-1">
                            @csrf
                            <div class="col-12">
                                <div id="loading_indicator" class="d-none"></div>
                                <div class="form-group form-floating  mb-3">
                                    <input type="tel" class="form-control" name="phone_number" id="phone_number" required autofocus autocomplete="off">
                                    <label for="phone_number">Numéro déposant</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group form-floating  mb-3">
                                    <input type="number" class="form-control" name="amount"  id="amount" required autofocus autocomplete="off">
                                    <label for="amount">Montant</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="currency" name="currency" required autofocus autocomplete="off">
                                        <option selected=""></option>
                                        <option value="CDF">CDF</option>
                                        <option value="USD">USD</option>
                                    </select>
                                    <label for="currency">Devise</label>
                                </div>
                            </div>
                        </form>
                    </div>
                
                    <button id="deposit_button" type="submit" class="btn btn-lg btn-default rounded-15" data-bs-dismiss="modal">Confirmer</button>
                
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
                    <form id="withdrawForm" class="row h-100 mb-1">
                        <div class="col-12">
                            <div id="loading_indicator" class="d-none"></div>
                            <div class="form-group form-floating  mb-3">
                                <input type="tel" class="form-control" name="phone_number" id="phone_number" required autofocus autocomplete="off">
                                <label for="phone_number">Numéro bénéficiaire</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group form-floating  mb-3">
                                <input type="number" class="form-control" name="amount"  id="amount" required autofocus autocomplete="off">
                                <label for="amount">Montant</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <select class="form-control" id="currency" name="currency" required autofocus autocomplete="off">
                                    <option selected=""></option>
                                    <option value="CDF">CDF</option>
                                    <option value="USD">USD</option>
                                </select>
                                <label for="currency">Devise</label>
                            </div>
                        </div>
                    </form>
                </div>
                <button id="withdraw_button" type="button" class="btn btn-lg btn-default rounded-15" data-bs-dismiss="modal">Confirmer</button>
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
                    
                    <form id="sendmoneyForm" class="row h-100 mb-1">
                        <div class="col-12">
                            <div class="form-group form-floating  mb-3">
                                <input type="text" class="form-control" name="receipt_name"  id="receipt_name" required autofocus autocomplete="off">
                                <label for="receipt_name">Nom du bénéficiaire</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group form-floating  mb-3">
                                <input type="tel" class="form-control" name="phone_number" id="phone_number" required autofocus autocomplete="off">
                                <label for="phone_number">Numéro bénéficiaire</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group form-floating  mb-3">
                                <input type="number" class="form-control" name="amount"  id="amount" required autofocus autocomplete="off">
                                <label for="amount">Montant</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <select class="form-control" id="currency" name="currency" required autofocus autocomplete="off">
                                    <option selected=""></option>
                                    <option value="CDF">CDF</option>
                                    <option value="USD">USD</option>
                                </select>
                                <label for="currency">Devise</label>
                            </div>
                        </div>
                    </form>
                </div>
                <button id="send_money_button" type="button" class="btn btn-lg btn-default rounded-15" data-bs-dismiss="modal">Confirmer</button>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.css">

    <!-- swiper js script -->
    <script src="{{ asset('assets/vendor/swiperjs-6.6.2/swiper-bundle.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- page level custom script -->
    <script src="{{ asset('assets/js/app.js')}}"></script>
    {{-- <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script> --}}
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    
    @yield('script')
</body>