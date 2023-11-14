@extends('layouts.app-login')

@section('content')
<div class="row h-100">
    <div class="col-11 col-sm-11 mx-auto">
        <!-- header -->
        <div class="row">
            <header class="header">
                <div class="row">
                    <div class="col">
                        <div class="logo-small">
                            <img src="{{ asset('assets/img/ehaa.png')}}" alt="">
                            {{-- <h5><span class="text-secondary fw-light">Finance</span><br>Wallet</h5> --}}
                        </div>
                    </div>
                    <div class="col-auto align-self-center">
                        <a href="#" style="color: #13bf1e">S'inscrire</a>
                    </div>
                </div>
            </header>
        </div>
        <!-- header ends -->
    </div>
    <form action="{{route('login.authenticate')}}" method="POST">
        @csrf
        <div class="col-11 col-sm-11 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center py-4 mt-4 mb-1">
            <h1 class="mb-4" style="font-size: 18px"><span class="text-secondary fw-light">Connectez-vous à</span><br>Votre compte</h1>
            
                <div class="form-group form-floating mb-3 is-valid">
                    <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="" id="phone_number" placeholder="Username" required autofocus autocomplete="username">
                    @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label class="form-control-label" for="phone_number">Téléphone</label>
                </div>
                <div class="form-group form-floating is-invalid mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="********" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label class="form-control-label" for="password">Mot de passe</label>
                    <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip" data-bs-placement="left" title="Enter valid Password" id="passworderror">
                        <i class="bi bi-info-circle"></i>
                    </button>
                </div>
                <p class="mb-3 text-end">
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="" style="color: #13bf1e">
                        Mot de passe oublié?
                    </a>
                    @endif
                </p>
            
        </div>
        <div class="col-11 col-sm-11 mt-auto mx-auto py-4">
            <div class="row ">
                <div class="col-12 d-grid">
                    
                    <button type="submit" class="btn btn-lg shadow-sm" style="background-color: #13bf1e;">Connexion</button>
                    
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
