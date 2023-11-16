@extends('layouts.app')

@section('content')
<div class="row h-100 overflow-auto">
    <div class="col-12 text-center mb-auto px-0">
        <header class="header">
            <div class="row">
                <div class="col-auto">
                    <a href="{{route('login')}}" target="_self" class="btn btn-light btn-44"><i class="bi bi-arrow-left"></i></a>
                </div>
                <div class="col">
                    <div class="logo-small">
                        <img src="{{ asset('assets/img/fav.png')}}" alt="">
                        <h5>Ehaa-Pay</h5>
                    </div>
                </div>
                <div class="col-auto">
                    <a href="" target="_self" class="btn btn-light btn-44 invisible"></a>
                </div>
            </div>
        </header>
    </div>
    <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center text-center py-4">
        <h1 class="mb-4 text-color-theme">Réinitialiser votre mot de passe</h1>
        <p class="text-muted mb-4">Fournissez votre numéro de téléphone pour réinitialiser votre mot de passe.</p>

        <div class="form-floating is-valid mb-3">
            <input type="tel" class="form-control"  placeholder="Numéro de téléphone" name="phone_number" id="phone_number" required autofocus autocomplete="username">
            <label for="phone_number">Numéro de téléphone</label>
        </div>
        <a href="reset-password.html" target="_self" class="btn btn-lg btn-default w-100  shadow">Réinitialiser le mot de passe</a>
    </div>
    <div class="col-12 text-center mt-auto">
        <div class="row justify-content-center footer-info">
            <div class="col-auto">
              
            </div>
        </div>
    </div>
</div>
@endsection
