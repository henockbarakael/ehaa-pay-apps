@extends('layouts.signin')
@section('content')
{!! Toastr::message() !!}
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
        {{-- <form action="{{route('signin')}}" method="POST" class="was-validated needs-validation" novalidate=""> --}}
        <form id="login-form" class="was-validated needs-validation" novalidate="">
            @csrf
            <div class="form-group form-floating mb-4 is-valid">
                <input type="text" class="form-control @error('username') is-invalid @enderror"  id="username" name="username" placeholder="Nom d'utilisateur" required autofocus autocomplete="username">
                <label class="form-control-label" for="username">Nom d'utilisateur</label>
                <span id="usernameerror" class="text-danger text-center" data-bs-toggle="tooltip" data-bs-placement="top" ></span>
            </div>

            <div class="form-group form-floating is-valid mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required autocomplete="current-password" placeholder="*********">
                <label class="form-control-label" for="password">Mot de passe</label>
                <span id="passworderror" class="text-danger text-center" data-bs-toggle="tooltip" data-bs-placement="top" ></span>
            </div>
            <p class="mb-3 text-center">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="">
                    Mot de passe oublié?
                </a>
                @endif
            </p>

            {{-- <button type="submit" class="btn btn-lg btn-default w-100 mb-4 shadow" onclick="window.location.replace('index.html');"> --}}
            <button id="submit-button" type="submit" class="btn btn-lg btn-default w-100 mb-4 shadow" >
                <span id="loader" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span> Connexion
            </button>
        </form>
        <p class="mb-2 text-muted">Vous n'avez pas de compte?</p>
        <a href="{{ route('register') }}" target="_self" class="">
            S'inscrire <i class="bi bi-arrow-right"></i>
        </a>

    </div>
</div>
@section('script')
<script>
    $(document).ready(function() {
        $('[data-bs-toggle="tooltip"]').tooltip();
        $('#submit-button').click(function(e) {
            e.preventDefault();
            $('#loader').removeClass('d-none');
            var formData = $('#login-form').serialize();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                url: "{{ route('signin') }}",
                type: "POST",
                data: formData,
                success: function(response) {
                    // Traitement réussi
                    console.log(response);
                    if (response.success === true) {
                            window.location.href = "{{ route('accueil') }}";
                    } else {
                        Swal.fire({
                        title: 'Error',
                        text: response.errors,
                        icon: 'error',
                        width: '300px',
                        didOpen: function() {
                            const contentElement = Swal.getContent();
                            if (contentElement) {
                                const spanElement = document.createElement('span');
                                spanElement.innerHTML = response.erros;
                                spanElement.style.fontSize = '12px';
                                contentElement.appendChild(spanElement);
                            }
                        }
                    }).then(function() {
                        location.reload();
                    });
                        // toastr.error(response.errors, 'Error');
                        // location.reload();
                    }
                    $('#loader').addClass('d-none');
                },
                error: function(xhr, status, error) {
                    console.log("Erreur AJAX : " + status + " - " + error);
                    var response = xhr.responseJSON;
                    console.log(response);
                    if (response && response.errors) {
                        if (response.errors.username) {
                            var usernameError = response.errors.username[0];
                            $('#username').addClass('is-invalid'); // Ajoute la classe d'erreur
                            $('#usernameerror')
                                .attr('title', usernameError)
                                .tooltip('show');
                        } else {
                            $('#username').removeClass('is-invalid'); // Supprime la classe d'erreur
                            $('#usernameerror').tooltip('hide');
                        }
                        
                        if (response.errors.password) {
                            var passwordError = response.errors.password[0];
                            $('#password').addClass('is-invalid'); // Ajoute la classe d'erreur
                            $('#passworderror')
                                .attr('title', passwordError)
                                .tooltip('show');
                        } else {
                            $('#password').removeClass('is-invalid'); // Supprime la classe d'erreur
                            $('#passworderror').tooltip('hide');
                        }
                    } else {
                        toastr.error('An error occurred.', 'Error');
                    }
                    $('#loader').addClass('d-none');
                }
            });
        });

        // Ajoutez un gestionnaire d'événement pour masquer les messages d'erreur lors de la saisie dans les champs
        $('#username, #password').on('input', function() {
            var input = $(this);
            var errorField = $('#' + input.attr('id') + 'error');
            
            if (input.val().trim() !== '') {
                input.removeClass('is-invalid');
                errorField.tooltip('dispose'); // Supprime le tooltip
            } else {
                input.addClass('is-invalid');
                errorField.tooltip('show');
            }
        });
        
        // Ajoutez un gestionnaire d'événement pour masquer le message d'erreur lors de la saisie dans le champ username
        $('#username').on('focus', function() {
            var input = $(this);
            var errorField = $('#' + input.attr('id') + 'error');
            
            if (input.val().trim() === '') {
                input.removeClass('is-invalid');
                errorField.tooltip('dispose'); // Supprime le tooltip
            }
        });
        
        // Ajoutez un gestionnaire d'événement pour masquer le message d'erreur lors de la saisie dans le champ password
        $('#password').on('focus', function() {
            var input = $(this);
            var errorField = $('#' + input.attr('id') + 'error');
            
            if (input.val().trim() === '') {
                input.removeClass('is-invalid');
                errorField.tooltip('dispose'); // Supprime le tooltip
            }
        });
        
        // Ajoutez un gestionnaire d'événement pour afficher le message d'erreur lorsque le champ username perd le focus
        $('#username').on('blur', function() {
            var input = $(this);
            var errorField = $('#' + input.attr('id') + 'error');
            
            if (input.val().trim() === '') {
                input.addClass('is-invalid'); // Ajoute la classe d'erreur
                errorField.tooltip('show');
            }
        });
        
        // Ajoutez un gestionnaire d'événement pour afficher le message d'erreur lorsque le champ password perd le focus
        $('#password').on('blur', function() {
            var input = $(this);
            var errorField = $('#' + input.attr('id') + 'error');
            
            if (input.val().trim() === '') {
                input.addClass('is-invalid'); // Ajoute la classe d'erreur
                errorField.tooltip('show');
            }
        });
     
});
</script>
@endsection
@endsection