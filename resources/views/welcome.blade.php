@extends('layouts.master')
@section('content')
<!-- categories list -->
<div class="row mb-4 mt-4">
    <div class="col-12">
        <div class="card bg-theme text-white">
            <div class="card-body pb-0">
                <div class="row justify-content-between gx-0 mx-0 pb-3">

                    <div class="col-auto text-center">
                        <a href="#" class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">
                            <div class="icons bg-success text-white rounded-12 bg-opac">
                                <i class="bi bi-arrow-up-right size-22"></i>
                            </div>
                        </a>
                        <p class="size-10">Envoi d'argent</p>
                    </div>

                    <div class="col-auto text-center">
                        <a href="#" class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">
                            <div class="icons bg-success text-white rounded-12 bg-opac">
                                <i class="bi bi-bag-plus size-22"></i>
                            </div>
                        </a>
                        <p class="size-10">Faire un dépôt</p>
                    </div>

                    <div class="col-auto text-center">
                        <a href="#" class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">
                            <div class="icons bg-success text-white rounded-12 bg-opac">
                                <i class="bi bi-arrow-down-right size-22"></i>
                            </div>
                        </a>
                        <p class="size-10">Retrait d'argent</p>
                    </div>

                </div>

                <button class="btn btn-link mt-0 py-1 w-100 bar-more collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collpasemorelink" aria-expanded="false" aria-controls="collpasemorelink">
                    <span class=""></span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- balance -->
<div class="row my-4 text-center">
    <div class="col-6">
        <h1 class="fw-light mb-2" style="font-size: 24px; font-weight:bold">1,050.00</h1>
        <p class="text-secondary">Solde CDF</p>
    </div>
    <div class="col-6">
        <h1 class="fw-light mb-2" style="font-size: 24px; font-weight:bold">1,050.00</h1>
        <p class="text-secondary">Solde USD</p>
    </div>
</div>
<!-- income expense-->
<div class="row mb-4">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-auto">
                        <div class="avatar avatar-40 p-1 shadow-sm shadow-success rounded-15">
                            <div class="icons bg-warning text-white rounded-12">
                                <i class="bi bi-arrow-down-left"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col align-self-center ps-0">
                        <p class="size-10 text-secondary mb-0">Entrée</p>
                        <p>1542k</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-auto">
                        <div class="avatar avatar-40 p-1 shadow-sm shadow-danger rounded-15">
                            <div class="icons bg-info text-white rounded-12">
                                <i class="bi bi-arrow-up-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col align-self-center ps-0">
                        <p class="size-10 text-secondary mb-0">Sortie</p>
                        <p>1212k</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- offers banner -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card theme-bg overflow-hidden">
            <figure class="m-0 p-0 position-absolute top-0 start-0 w-100 h-100 coverimg right-center-img">
                <img src="{{ asset('assets/img/offerbg.png')}}" alt="">
            </figure>
            <div class="card-body py-4">
                <div class="row">
                    <div class="col-9 align-self-center">
                        <h1 class="mb-3"><span class="fw-light">15% OFF</span><br>GiftCard</h1>
                        <p>Thank you for spending with us, You have received Gift Card.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection