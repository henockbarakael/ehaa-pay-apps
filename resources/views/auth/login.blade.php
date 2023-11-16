@extends('layouts.app')
@section('content')
<div class="row h-100 overflow-auto">
    <div class="col-12 text-center mb-auto px-0">
        <header class="header">
            <div class="row">
                <div class="col-auto"></div>
                <div class="col">
                    <div class="logo-small">
                        <img src="{{ asset('assets/img/fav.png')}}" alt="">
                        <h5>Ehaa-Pay</h5>
                    </div>
                </div>
                <div class="col-auto"></div>
            </div>
        </header>
    </div>
    <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center text-center py-4">
        <h1 class="mb-4 text-color-theme">Connexion</h1>
        <form class="was-validated needs-validation" novalidate="">
            <div class="form-group form-floating mb-3 is-valid">
                <input type="text" class="form-control"  id="username" name="username" placeholder="Nom d'utilisateur" required autofocus autocomplete="username">
                <label class="form-control-label" for="username">Nom d'utilisateur</label>
            </div>

            <div class="form-group form-floating is-invalid mb-3">
                <input type="password" class="form-control " id="password" placeholder="Password" required autocomplete="current-password">
                <label class="form-control-label" for="password">Mot de passe</label>
                <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip" data-bs-placement="left" title="Enter valid Password" id="passworderror">
                    <i class="bi bi-info-circle"></i>
                </button>
            </div>
            <p class="mb-3 text-center">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="">
                    Mot de passe oublié?
                </a>
                @endif
            </p>

            <button type="button" class="btn btn-lg btn-default w-100 mb-4 shadow" onclick="window.location.replace('index.html');">
                Connexion
            </button>
        </form>
        <p class="mb-2 text-muted">Vous n'avez pas de compte?</p>
        <a href="{{ route('register') }}" target="_self" class="">
            S'inscrire <i class="bi bi-arrow-right"></i>
        </a>

    </div>
</div>
@endsection