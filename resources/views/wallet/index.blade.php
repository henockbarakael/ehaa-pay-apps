@extends('layouts.master')
@section('content')
<div class="card barak-mode shadow-sm mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-auto">
              <a class="avatar avatar-44 rounded-10" href="{{ route('account') }}" ><img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt=""></a>
            </div>
            <div class="col px-0 align-self-center">
                <p class="mb-0 text-color-theme"><a href="{{ route('account') }}" class="text-white">{{Auth::user()->username}}</a></p>
                <p class="text-muted size-12"><a href="{{ route('account') }}" class="text-white">{{Auth::user()->phone_number}}</a></p>
            </div>
            <div class="col-auto">
                <p class="mb-1">N° Compte</p>
                <a href="{{ route('account') }}" class="text-muted size-12">{{ $account }}</a>
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
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="fw-normal mb-2" style="font-size: 15px; font-weight:bold">
                                        {{number_format($balance['CDF'])}}
                                        <span class="small text-muted">CDF</span>
                                    </h4>
                                    <p class="mb-0 text-muted size-12">Solde du compte</p>
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
                                        {{number_format($balance['USD'],2)}}
                                        <span class="small text-muted">USD</span>
                                    </h4>
                                    <p class="mb-0 text-muted size-12">Solde du compte</p>
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
<div class="row mb-3">
    <div class="col">
        <h6>Recherger votre compte</h6>
    </div>
</div>
<form id="depositForm" class="row h-100 mb-4">
    <div class="col-12 col-md-6 col-lg-4">
        <div class="form-floating mb-3">
            <select class="form-control" id="method">
                <option value="momo" selected>Mobile money</option>
                <option value="bank-card"  hidden>Carte bancaire</option>
            </select>
            <label for="country">Méthode de recharge</label>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-4">
        <div class="form-group form-floating mb-3">
            <input type="tel" class="form-control" name="phone_number" id="phone_number" required autofocus autocomplete="off">
            <label for="phone_number">Numéro mobile money</label>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-4">
        <div class="form-group form-floating mb-3">
            <input type="number" class="form-control" name="amount"  id="amount" required autofocus autocomplete="off">
            <label for="amount">Montant de recharge</label>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-4">
        <div class="form-floating mb-3">
            <select class="form-control" id="currency" name="currency" required autofocus autocomplete="off">
                <option selected="">Choisir la devise</option>
                <option value="CDF">CDF</option>
                <option value="USD">USD</option>
            </select>
            <label for="currency">Devise</label>
        </div>
    </div>
    
    
    <div class="col-12 mb-4">
        <button id="deposit_button" type="submit" class="btn btn-default btn-lg w-100"><span id="loader" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>Je recharge</button>
    </div>
</form>

@section('script')
<script>
    function validatePHONE(input) {
      input.value = input.value.replace(/\D/g, '').slice(0, 10);
    }
</script>
<script>
    $(document).ready(function() {
        var interval; // Déclaration de la variable interval en dehors des fonctions
        $('#deposit_button').click(function(e) {
            e.preventDefault();
            $('#deposit_button').prop('disabled', true);
            $('#loading_indicator').removeClass('d-none');
    
            var formData = $('#depositForm').serialize();
    
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
    
            $('#loading_modal').modal('show');
    
            $.ajax({
            url: "{{ route('deposit.request') }}",
            type: "POST",
            data: formData,
            beforeSend: function() {
                var counter = 0;
                interval = setInterval(function() {
                    counter++;
                    $('#loading_counter').text(counter + 's');
                }, 1000);
            },
            success: function(response) {
                // Arrêter le compteur et masquer le modal de chargement
                clearInterval(interval);
                $('#loading_modal').modal('hide');

                if (response.status_code === 200) {
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
                    }
                }).then(function() {
                    window.location.href = "{{ route('wallet') }}";
                });
                } else if (response.status_code === 401) {
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
                    // Effectuer une déconnexion en envoyant une requête POST
                    var logoutForm = document.createElement('form');
                    logoutForm.method = 'POST';
                    logoutForm.action = '{{ route("logout") }}';

                    // Ajouter le token CSRF si nécessaire
                    var csrfToken = document.querySelector('meta[name="csrf-token"]');
                    if (csrfToken) {
                        var csrfInput = document.createElement('input');
                        csrfInput.type = 'hidden';
                        csrfInput.name = '_token';
                        csrfInput.value = csrfToken.content;
                        logoutForm.appendChild(csrfInput);
                    }

                    document.body.appendChild(logoutForm);
                    logoutForm.submit();
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
            },
            complete: function() {
                $('#deposit_button').prop('disabled', false);
                $('#loading_indicator').addClass('d-none');
            }
            });
        });
    });
</script>
@endsection
@endsection