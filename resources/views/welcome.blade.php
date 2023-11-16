@extends('layouts.master')
@section('content')
            <!-- wallet balance -->
            <div class="card barak-mode shadow-sm mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <figure class="avatar avatar-44 rounded-10">
                                <img src="{{ asset('assets/img/user1.jpg')}}" alt="">
                            </figure>
                        </div>
                        <div class="col px-0 align-self-center">
                            <p class="mb-0 text-color-theme">Maxartkiller</p>
                            <p class="text-muted size-12">New York City, US</p>
                        </div>
                        <div class="col-auto">
                            <a href="addmoney.html" class="btn btn-44 btn-light shadow-sm">
                                <i class="bi bi-plus-circle"></i>
                            </a>
                            <a href="withdraw.html" class="btn btn-44 btn-warning shadow-sm ms-1">
                                <i class="bi bi-arrow-down-circle"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card btn-service text-white border-0 text-center">
                    <!-- <div class="card  mb-3" style="border: 0px;"> -->
                        <div class="card-body">
                            <div class="row">
                            <div class="col-6 col-md-6">
                                <div class="card  border-0">
                                    <div class="card-body">
                                        <!-- <div class="row mb-3">
                                            <div class="col-auto align-self-center">
                                                <i class="bi bi-wallet2"></i> Wallet
                                            </div>
                                        </div> -->
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="fw-normal mb-2" style="font-size: 15px; font-weight:bold">
                                                    1000000.00
                                                    <span class="small text-muted">CDF</span>
                                                </h4>
                                                <p class="mb-0 text-muted size-12">Balance</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-6">
                                <div class="card  border-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="fw-normal mb-2" style="font-size: 15px; font-weight:bold">
                                                    1000000.00
                                                    <span class="small text-muted">USD</span>
                                                </h4>
                                                <p class="mb-0 text-muted size-12">Balance</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                    <!-- </div> -->
                </div>

                
            </div>

            <div class="row mb-4">
                <div class="text-center">
                    <div class="row" >
                    
                        <div class="col-4 text-center" >
                            <a data-bs-target="#sendmoney_modal" data-bs-toggle="modal" class="avatar avatar-50 shadow-sm mb-2 rounded-10 overlay text-white bg-ehaa" href="#" style="color: white;">
                                <span>
                                    <i class="nav-icon bi bi-arrow-up-right-circle"></i>
                                </span>
                            </a>
                            <p class="text-color-theme size-12 small">Envois</p>
                        </div>

                        <div class="col-4 text-center" >
                            <a data-bs-target="#deposit_modal" data-bs-toggle="modal" class="avatar avatar-50 bg-ehaa shadow-sm mb-2 rounded-10 overlay  text-white" href="#" style="color: white;">
                                <span>
                                    <i class="nav-icon bi bi-plus-circle"></i>
                                    
                                </span>
                            </a>
                            <p class="text-color-theme size-12 small">Dépôt</p>
                        </div>

                        <div class="col-4 text-center" >
                            <a data-bs-target="#withdraw_modal" data-bs-toggle="modal" class="avatar avatar-50 shadow-sm mb-2 rounded-10 overlay bg-ehaa text-white" href="#" style="color: white;">
                                <span>
                                    <i class="bi bi-arrow-down-circle"></i>
                                    
                                </span>
                            </a>
                            <p class="text-color-theme size-12 small">Retrait</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- offers banner -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card theme-bg text-center">
                        <div class="card-body">
                            <div class="row">
                                <div class="col align-self-center">
                                    <h1>15% OFF</h1>
                                    <p class="size-12 text-muted">
                                        Facilitez vos paiements en ligne avec Ehaa-Pay!
                                    </p>
                                    <div class="tag border-dashed border-opac">
                                        BILLPAY15OFF
                                    </div>
                                </div>
                                <div class="col-6 align-self-center ps-0">
                                    <img src="{{ asset('assets/img/offergraphics-1.png')}}" alt="" class="mw-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
@endsection