@extends('layouts.master')
@section('content')
            <!-- user information -->
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-auto">
                            <figure class="avatar avatar-60 rounded-10">
                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="">
                            </figure>
                        </div>
                        <div class="col px-0 align-self-center">
                            <h3 class="mb-0 text-color-theme">{{Auth::user()->username}}</h3>
                            <p class="text-muted ">{{Auth::user()->phone_number}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- profile information -->
            <div class="row mb-3">
                <div class="col">
                    <h6>Informations générales</h6>
                </div>
            </div>
            <form id="generalInformation" class="row h-100 mb-4">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="form-group form-floating  mb-3">
                        <input type="text" class="form-control" value="{{Auth::user()->lastname}}"  id="lastname">
                        <label for="lastname">Nom</label>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="form-group form-floating  mb-3">
                        <input type="text" class="form-control" value="{{Auth::user()->firstname}}"  id="firstname">
                        <label for="firstname">Prénom</label>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="form-group form-floating mb-3">
                        <input type="text" class="form-control" value="{{Auth::user()->email}}"  id="email">
                        <label for="email">E-mail</label>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="form-group form-floating mb-3">
                        <input type="text" class="form-control" value="{{Auth::user()->phone_number}}"  id="phone_number">
                        <label for="phone_number">Téléphone</label>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="form-floating mb-3">
                        <select class="form-control" id="country">
                            <option value="Congo-Kinshasa" {{ Auth::user()->country === 'Congo-Kinshasa' ? 'selected' : '' }}>Congo-Kinshasa (+243)</option>
                        </select>
                        <label for="country">Pays</label>
                    </div>
                </div>
                
                
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="form-group form-floating mb-3">
                        <input type="file" class="form-control" id="fileupload">
                        <label for="fileupload">Photo de profil</label>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12">
                    <div class="form-group form-floating mb-3">
                        <input type="text" class="form-control" value="{{Auth::user()->address}}" id="address" >
                        <label class="form-control-label" for="address">Adresse physique</label>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <button type="submit" class="btn btn-default btn-lg w-100"><span id="loader" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>Modifier</button>
                </div>
            </form>

           
            <!-- add edit address form -->
            <div class="row mb-3 mt-4">
                <div class="col">
                    <h6>Authentification</h6>
                </div>
            </div>

            <!-- change password -->
            <div class="row mb-3">
                <div class="col">
                    <h6>Changer le mot de passe</h6>
                </div>
            </div>
            <form id="authInformation" class="row h-100 mb-4">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="form-floating  mb-3">
                        <input oninput="validatePIN(this)" pattern="[0-9]{6}" inputmode="numeric" minlength="6" maxlength="6" type="password" class="form-control is-invalid" id="password">
                        <label for="password">Mot de passe actuel</label>
                        <span style="font-size: 12px" class="text-danger" id="currentPassword_error" data-bs-toggle="tooltip" data-bs-placement="top"></span>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="form-floating  mb-3">
                        <input oninput="validatePIN(this)" pattern="[0-9]{6}" inputmode="numeric" minlength="6" maxlength="6" type="password" class="form-control is-invalid"  id="newpassword">
                        <label for="password">Nouveau mot de passe</label>
                        <span style="font-size: 12px" class="text-danger" id="newPassword_error" data-bs-toggle="tooltip" data-bs-placement="top"></span>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="form-floating mb-3">
                        <input oninput="validatePIN(this)" pattern="[0-9]{6}" inputmode="numeric" minlength="6" maxlength="6" type="password" class="form-control is-invalid"  id="confirmpassword">
                        <label for="confirmpassword">Confirmer mot de passe</label>
                        <span style="font-size: 12px" class="text-danger" id="confirmPassword_error" data-bs-toggle="tooltip" data-bs-placement="top"></span>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <button type="submit" class="btn btn-default btn-lg w-100"><span id="loader2" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>Modifier</button>
                </div>
            </form>

@section('script')
<script>
    function validatePIN(input) {
      input.value = input.value.replace(/\D/g, '').slice(0, 6);
    }
    function validatePHONE(input) {
      input.value = input.value.replace(/\D/g, '').slice(0, 10);
    }
</script>
<script>
    $(document).ready(function() {
        $('#generalInformation').submit(function(event) {
            event.preventDefault(); // Empêche le comportement par défaut du formulaire
            $('#loader').removeClass('d-none');
            // Récupérer les valeurs des champs
            var lastname = $('#lastname').val();
            var firstname = $('#firstname').val();
            var email = $('#email').val();
            var phone_number = $('#phone_number').val();
            var country = $('#country').val();
            var address = $('#address').val();
            var fileupload = $('#fileupload').prop('files')[0]; // Récupérer le fichier

            // Créer un objet FormData pour envoyer les données
            var formData = new FormData();
            formData.append('lastname', lastname);
            formData.append('firstname', firstname);
            formData.append('email', email);
            formData.append('phone_number', phone_number);
            formData.append('country', country);
            formData.append('address', address);
            formData.append('fileupload', fileupload);

            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Envoyer la requête AJAX
            $.ajax({
                url: "{{route('account.general')}}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success === true) {
                          Swal.fire({
                            title: 'Success',
                            icon: 'success',
                            width: '400px',
                            didOpen: function() {
                              const contentElement = Swal.getContent();
                              if (contentElement) {
                                const spanElement = document.createElement('span');
                                spanElement.innerHTML = response.message;
                                spanElement.style.fontSize = '12px';
                                contentElement.appendChild(spanElement);
                              }
                            }}).then(function() {
                                window.location.href = "{{ route('account') }}";
                            });
                    } else {
                          Swal.fire({
                            title: 'Erreur',
                            icon: 'error',
                            width: '400px',
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
                    console.log("Erreur AJAX : " + status + " - " + error);
                    Swal.fire({
                            title: 'Erreur',
                            icon: 'error',
                            width: '400px',
                            didOpen: function() {
                              const contentElement = Swal.getContent();
                              if (contentElement) {
                                const spanElement = document.createElement('span');
                                spanElement.innerHTML = "Erreur AJAX : " + status + " - " + error;
                                spanElement.style.fontSize = '12px';
                                contentElement.appendChild(spanElement);
                              }
                            }
                    }).then(function() {
                        location.reload();
                    });
                    $('#loader').addClass('d-none');
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('[data-bs-toggle="tooltip"]').tooltip();
        $('#authInformation').submit(function(event) {
            event.preventDefault();

            // Récupérer les valeurs des champs
            var currentPassword = $('#password').val();
            var newPassword = $('#newpassword').val();
            var confirmPassword = $('#confirmpassword').val();

            // Afficher le spinner de chargement
            $('#loader2').removeClass('d-none');

            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Effectuer la requête Ajax
            $.ajax({
                url: "{{route('account.auth')}}",
                method: 'POST',
                data: {
                    currentPassword: currentPassword,
                    newPassword: newPassword,
                    confirmPassword: confirmPassword
                },
                success: function(response) {
                    // Cacher le spinner de chargement
                    $('#loader2').addClass('d-none');

                    if (response.success === true) {
                          Swal.fire({
                            title: 'Success',
                            icon: 'success',
                            width: '400px',
                            didOpen: function() {
                              const contentElement = Swal.getContent();
                              if (contentElement) {
                                const spanElement = document.createElement('span');
                                spanElement.innerHTML = response.message;
                                spanElement.style.fontSize = '12px';
                                contentElement.appendChild(spanElement);
                              }
                            }}).then(function() {
                                window.location.href = "{{ route('account') }}";
                            });
                    } else {
                        var errors = response.errors;
            for (var field in errors) {
                var errorMessage = errors[field];
                $('#' + field + '_error').text(errorMessage);
            }
                    }
                    $('#loader2').addClass('d-none');
                },
                // error: function(xhr, status, error) {
                //     Swal.fire({
                //             title: 'Erreur',
                //             icon: 'error',
                //             width: '400px',
                //             didOpen: function() {
                //               const contentElement = Swal.getContent();
                //               if (contentElement) {
                //                 const spanElement = document.createElement('span');
                //                 spanElement.innerHTML = "Erreur AJAX : " + status + " - " + error;
                //                 spanElement.style.fontSize = '12px';
                //                 contentElement.appendChild(spanElement);
                //               }
                //             }
                //     }).then(function() {
                //         location.reload();
                //     });
                //     $('#loader2').addClass('d-none');

                // }
                error: function(xhr, status, error) {
                    var response = xhr.responseJSON;
                    if (response && response.errors) {
                        var errors = response.errors;
                        for (var field in errors) {
                            var errorMessage = errors[field];
                            $('#' + field).addClass('is-invalid'); // Ajoute la classe 'is-invalid' au champ
                            $('#' + field + '_error').text(errorMessage);
                        }
                    } 
                    $('#loader2').addClass('d-none');
                }
            });
        });
    });
</script>
@endsection
@endsection