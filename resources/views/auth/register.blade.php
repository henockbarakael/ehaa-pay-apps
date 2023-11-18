@extends('layouts.signup')
@section('content')
@include('sweetalert::alert')
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
        <form class="was-validated">
            @csrf
            <div class="form-floating is-valid mb-4">
                <input type="text" class="form-control form-input @error('first_name') is-invalid @enderror" name="first_name" placeholder="Prénom" id="first_name" required autofocus autocomplete="first_name">
                <label for="first_name">Prénom</label>
                <span id="firstnameerror" class="text-danger text-center" data-bs-toggle="tooltip" data-bs-placement="top" ></span>
            </div>
            <div class="form-floating is-valid mb-4">
                <input type="text" class="form-control form-input @error('last_name') is-invalid @enderror" name="last_name"  placeholder="Nom" id="last_name" required autofocus autocomplete="last_name">
                <label for="last_name">Nom</label>
                <span id="lastnameerror" class="text-danger text-center" data-bs-toggle="tooltip" data-bs-placement="top" ></span>

            </div>
            <div class="form-floating is-valid mb-4">
                <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" required autofocus autocomplete="gender">
                    <option value="">Sélectionnez votre genre</option>
                    <option value="M">Masculin</option>
                    <option value="F">Féminin</option>
                </select>
                <label for="country">Genre</label>
                <span id="gendererror" class="text-danger text-center" data-bs-toggle="tooltip" data-bs-placement="top" ></span>

            </div>
            <div class="form-floating is-valid mb-4">
                <input type="tel" class="form-control form-input @error('phone_number') is-invalid @enderror"  placeholder="Numéro de téléphone" name="phone_number" id="phone_number" required autofocus autocomplete="phone_number">
                <label for="phone_number">Numéro de téléphone</label>
                <span id="phonenumbererror" class="text-danger text-center" data-bs-toggle="tooltip" data-bs-placement="top" ></span>

            </div>
            <div class="form-floating is-valid mb-4">
                <input oninput="validatePIN(this)" pattern="[0-9]{6}" inputmode="numeric" minlength="6" maxlength="6" type="password" class="form-control form-input @error('password') is-invalid @enderror"  placeholder="Votre pin à 6 chiffres" name="password" id="password" required autofocus autocomplete="current-password">
                <label for="password">PIN</label>
                <span id="passworderror" class="text-danger text-center" data-bs-toggle="tooltip" data-bs-placement="top" ></span>

            </div>
            <div class="form-floating is-valid mb-4">
                <input oninput="validatePIN(this)" type="password" pattern="[0-9]{6}" inputmode="numeric" minlength="6" maxlength="6" class="form-control form-input @error('confirmpassword') is-invalid @enderror" placeholder="Confirmer le pin" name="confirmpassword" id="confirmpassword" required autofocus autocomplete="usernamepass">
                <label for="confirmpassword">Confirmer le PIN</label>
                <span id="confirmpassworderror" class="text-danger text-center" data-bs-toggle="tooltip" data-bs-placement="top" ></span>

            </div>
            <p class="mb-3"><span class="text-muted">En cliquant sur le bouton "S'inscrire", vous acceptez </span> <a href="">nos conditions générales.</a></p>
            <button type="submit" id="signup-button" class="btn btn-lg btn-default w-100 mb-4 shadow">
                <span id="loader" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span> S'inscrire
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
<script>
    $(document).ready(function() {
    $('[data-bs-toggle="tooltip"]').tooltip();
    $('#signup-button').click(function(e) {
        e.preventDefault();
        $('#loader').removeClass('d-none');
        var formData = $('.was-validated').serialize();
        
        $.ajax({
            url: "{{ route('signup') }}",
            type: "POST",
            data: formData,
            success: function(response) {
                // Traitement réussi
                console.log(response);
                if (response.success === true) {
                    Swal.fire({
                        title: 'Success',
                        text: response.message,
                        icon: 'success',
                        width: '300px',
                        didOpen: function() {
                            const contentElement = Swal.getContent();
                            if (contentElement) {
                                const spanElement = document.createElement('span');
                                spanElement.innerHTML = response.message;
                                spanElement.style.fontSize = '12px';
                                contentElement.appendChild(spanElement);
                            }
                        }
                    }).then(function() {
                        window.location.href = response.redirect;
                    });
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
                                spanElement.innerHTML = response.message;
                                spanElement.style.fontSize = '12px';
                                contentElement.appendChild(spanElement);
                            }
                        }
                    }).then(function() {
                        location.reload();
                    });
                }
                $('#loader').addClass('d-none');
            },
            error: function(xhr, status, error) {
                var response = xhr.responseJSON;
                if (response && response.errors) {
                    // Gérer les erreurs spécifiques du formulaire signup
                    if (response.errors.first_name) {
                        var firstNameError = response.errors.first_name[0];
                        $('#first_name').addClass('is-invalid');
                        $('#firstnameerror')
                            .attr('title', firstNameError)
                            .tooltip('show');
                    } else {
                        $('#first_name').removeClass('is-invalid');
                        $('#firstnameerror').tooltip('hide');
                    }
                    
                    if (response.errors.last_name) {
                        var lastNameError = response.errors.last_name[0];
                        $('#last_name').addClass('is-invalid');
                        $('#lastnameerror')
                            .attr('title', lastNameError)
                            .tooltip('show');
                    } else {
                        $('#last_name').removeClass('is-invalid');
                        $('#lastnameerror').tooltip('hide');
                    }

                    if (response.errors.gender) {
                        var genderError = response.errors.gender[0];
                        $('#gender').addClass('is-invalid');
                        $('#gendererror')
                            .attr('title', genderError)
                            .tooltip('show');
                    } else {
                        $('#gender').removeClass('is-invalid');
                        $('#gendererror').tooltip('hide');
                    }

                    if (response.errors.phone_number) {
                        var phone_numberError = response.errors.phone_number[0];
                        $('#phone_number').addClass('is-invalid');
                        $('#phonenumbererror')
                            .attr('title', phone_numberError)
                            .tooltip('show');
                    } else {
                        $('#phone_number').removeClass('is-invalid');
                        $('#phonenumbererror').tooltip('hide');
                    }
                    
                 
                    if (response.errors.password) {
                        var passwordError = response.errors.password[0];
                        $('#password').addClass('is-invalid');
                        $('#passworderror')
                            .attr('title', passwordError)
                            .tooltip('show');
                    } else {
                        $('#password').removeClass('is-invalid');
                        $('#passworderror').tooltip('hide');
                    }

                    if (response.errors.confirmpassword) {
                        var confirmPasswordError = response.errors.confirmpassword[0];
                        $('#confirmpassword').addClass('is-invalid');
                        $('#confirmpassworderror')
                            .attr('title', confirmPasswordError)
                            .tooltip('show');
                    } else {
                        $('#confirmpassword').removeClass('is-invalid');
                        $('#confirmpassworderror').tooltip('hide');
                    }


                    
                } else {
                    toastr.error('An error occurred.', 'Error');
                }
                $('#loader').addClass('d-none');
            }
        });
    });

    // Ajoutez les gestionnaires d'événements pour masquer les messages d'erreur lors de la saisie dans les champs du formulaire signup
    $('.form-input').on('input', function() {
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

    $('#gender').on('change', function() {
        var select = $(this);
        var errorField = $('#' + select.attr('id') + 'error');
        
        if (select.val().trim() !== '') {
            select.removeClass('is-invalid');
            errorField.tooltip('hide');
        } else {
            select.addClass('is-invalid');
            errorField.tooltip('show');
        }
    });
    
    // Ajoutez les gestionnaires d'événements pour masquer le message d'erreur lors de la saisie dans les champs du formulaire signup
    $('.form-input').on('focus', function() {
        var input = $(this);
        var errorField = $('#' + input.attr('id') + 'error');
        
        if (input.val().trim() === '') {
            input.removeClass('is-invalid');
            errorField.tooltip('dispose'); // Supprime le tooltip
        }
    });

    $('#gender').on('change', function() {
        var select = $(this);
        var errorField = $('#' + select.attr('id') + 'error');
        
        if (select.val().trim() === '') {
            select.removeClass('is-invalid');
            errorField.tooltip('dispose'); // Supprime le tooltip
        }
    });
    
    // Ajoutez les gestionnaires d'événements pour afficher le message d'erreur lorsque les champs du formulaire signup perdent le focus
    $('.form-input').on('blur', function() {
        var input = $(this);
        var errorField = $('#' + input.attr('id') + 'error');
        
        if (input.val().trim() === '') {
            input.addClass('is-invalid'); // Ajoute la classe d'erreur
            errorField.tooltip('show');
        }
    });

    $('.form-input').on('blur', function() {
        var input = $(this);
        var errorField = $('#' + input.attr('id') + 'error');
        
        if (input.val().trim() === '') {
            input.addClass('is-invalid'); // Ajoute la classe d'erreur
            errorField.tooltip('show');
        }
    });

    $('#gender').on('change', function() {
        var select = $(this);
        var errorField = $('#' + select.attr('id') + 'error');
        
        if (select.val().trim() === '') {
            select.addClass('is-invalid'); // Ajoute la classe d'erreur
            errorField.tooltip('show');
        } else {
            select.removeClass('is-invalid'); // Supprime la classe d'erreur
            errorField.tooltip('hide');
        }
    });
 
});
</script>
@endsection
@endsection