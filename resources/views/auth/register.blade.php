@extends('layouts.signup')
@section('content')
<div class="row h-100">
    <div class="col-12 text-center mb-auto px-0">
        <header class="header">
            <div class="row">
                <div class="col-auto">
                    <a href="{{ route('login') }}" target="_self" class="btn btn-light btn-44">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                </div>
                <div class="col align-self-center">
                    <h5>Inscription</h5>
                </div>
                <div class="col-auto">
                    <a class="btn btn-light btn-44 invisible"></a>
                </div>
            </div>
        </header>
    </div>
    <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center text-center py-4">
        <form class="was-validated" action="{{route('signup')}}" method="POST">
            @csrf
            <div class="form-floating is-valid mb-3">
                <input type="text" class="form-control" name="first_name" placeholder="Prénom" id="first_name">
                <label for="first_name">Prénom</label>
            </div>
            <div class="form-floating is-valid mb-3">
                <input type="text" class="form-control" name="last_name"  placeholder="Nom" id="lzst_name">
                <label for="last_name">Nom</label>
            </div>
            <div class="form-floating is-valid mb-3">
                <select class="form-control" id="gender" name="gender">
                    <option value="F" selected="">Féminin</option>
                    <option value="M">Masculin</option>
                    <option value="F">Féminin</option>
                </select>
                <label for="country">Sexe</label>
            </div>
            <div class="form-floating is-valid mb-3">
                <input type="tel" class="form-control"  placeholder="Numéro de téléphone" name="phone_number" id="phone_number">
                <label for="phone_number">Numéro de téléphone</label>
            </div>
            <div class="form-floating is-valid mb-3">
                <input oninput="validatePIN(this)" pattern="[0-9]{6}" inputmode="numeric" minlength="6" maxlength="6" type="password" class="form-control"  placeholder="Votre pin à 6 chiffres" name="password" id="password">
                <label for="password">PIN</label>
            </div>
            <div class="form-floating is-valid mb-3">
                <input oninput="validatePIN(this)" type="password" pattern="[0-9]{6}" inputmode="numeric" minlength="6" maxlength="6" class="form-control" placeholder="Confirmer le pin" name="confirmpassword" id="confirmpassword">
                <label for="confirmpassword">Confirmer le PIN</label>
                {{-- <button type="button" class="btn btn-link text-danger tooltip-btn" data-bs-toggle="tooltip" data-bs-placement="left" title="Enter valid Password" id="passworderror">
                    <i class="bi bi-info-circle"></i>
                </button> --}}
            </div>
            <p class="mb-3"><span class="text-muted">En cliquant sur le bouton "S'inscrire", vous acceptez </span> <a href="">nos conditions générales.</a></p>
            <button type="submit" class="btn btn-lg btn-default w-100 mb-4 shadow">
                S'inscrire
            </button>
        </form>
    </div>
</div>
@section('script')

<script>
    function validatePIN(input) {
      input.value = input.value.replace(/\D/g, '').slice(0, 6);
    }
  </script>
@endsection
@endsection