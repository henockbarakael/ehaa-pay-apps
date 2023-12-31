@extends('layouts.master')
@section('content')
{!! Toastr::message() !!}
            <!-- wallet balance -->
            <div class="card barak-mode shadow-sm mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                          <a class="avatar avatar-44 rounded-10" href="{{ route('account') }}" ><img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt=""></a>
                        </div>
                        <div class="col px-0 align-self-center">
                            <p class="mb-0 text-color-theme"><a href="{{ route('account') }}" class="text-white">{{Auth::user()->firstname.' '.Auth::user()->lastname}}</a></p>
                            <p class="text-muted size-12">Tél. :<a href="{{ route('account') }}" class="text-white">{{Auth::user()->phone_number}}</a> | ID :<a href="{{ route('account') }}" class="text-white">{{$account}}</a></p>
                        </div>
                    </div>
                </div>
                <div class="card btn-service text-white border-0 text-center">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-6 col-md-6">
                        <div class="card  border-0">
                          <div class="card-body">
                              <div class="row">
                                <div class="col-12">
                                    <h4 class="fw-normal mb-2" style="font-size: 15px; font-weight:bold">
                                      {{number_format($balance['CDF'],2)}}
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
                </div>  
            </div>

           
            <div class="card text-center mb-4">
              <div class="card-body">
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
                            <a data-bs-target="#transfer_modal" data-bs-toggle="modal" class="avatar avatar-50 bg-ehaa shadow-sm mb-2 rounded-10 overlay  text-white" href="#" style="color: white;">
                                <span>
                                    <i class="nav-icon bi bi-arrow-right-circle"></i>
                                    
                                </span>
                            </a>
                            <p class="text-color-theme size-12 small">Transfert</p>
                        </div>

                        <div class="col-4 text-center" >
                            <a data-bs-target="#withdraw_modal" data-bs-toggle="modal" class="avatar avatar-50 shadow-sm mb-2 rounded-10 overlay bg-ehaa text-white" href="#" style="color: white;">
                                <span>
                                    <i class="bi bi-cash-stack"></i>
                                    
                                </span>
                            </a>
                            <p class="text-color-theme size-12 small">Retrait</p>
                        </div>
                </div>
              </div>
            </div>
        

            <!-- service provider -->
            <div class="row mb-3">
                <div class="col">
                    <h6 class="title">Nos Services</h6>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar avatar-44 shadow-sm rounded-10 bg-danger text-white">
                                        <i class="bi bi-heart vm"></i>
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <p class="mb-0 size-12"><span class="text-color-theme fw-medium">EHAA-PHARMACIE</span>
                                    </p>
                                    <p><small class="size-12 text-muted">Pharmacie en ligne 24h/24</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar avatar-44 shadow-sm rounded-10 bg-warning text-white">
                                        <i class="bi bi-tv vm"></i>
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <p class="mb-0 size-12"><span class="text-color-theme fw-medium">EHAA-TV</span>
                                    </p>
                                    <p><small class="size-12 text-muted">Réabonnement</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar avatar-44 shadow-sm rounded-10 bg-success text-white">
                                        <i class="bi bi-shop vm"></i>
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <p class="mb-0 size-12"><span class="text-color-theme fw-medium">EHAA-WENZE</span>
                                    </p>
                                    <p><small class="size-12 text-muted">Boutique en ligne</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar avatar-44 shadow-sm rounded-10 bg-info text-white">
                                        <i class="bi bi-house-door vm"></i>
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <p class="mb-0 size-12"><span class="text-color-theme fw-medium">EHAA-KELASY</span>
                                    </p>
                                    <p><small class="size-12 text-muted">Frais académique</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Modal de chargement -->
            <div class="modal fade" data-bs-backdrop="static" id="loading_modal" tabindex="-1" aria-labelledby="loading_modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xsm modal-dialog-centered">
                <div class="modal-content" style="background-color: #d5f3e2; color:#595959; font-weight:bold">
                    <div class="modal-body text-center">
                    <h5 style="font-size: 12px">Votre requête est en cours d'exécution. Veuillez patienter...</h5>
                    <p id="loading_counter">0s</p>
                    </div>
                </div>
                </div>
            </div>
            @section('script')
            
            <script>
                $(document).ready(function() {
                    var interval; // Déclaration de la variable interval en dehors des fonctions
                  $('#sendmoney_modal').on('show.bs.modal', function() {
                    $(this).addClass('modal-loading');
                  });
              
                  $('#sendmoney_modal').on('hide.bs.modal', function() {
                    $(this).removeClass('modal-loading');
                  });
              
                  $('#send_money_button').click(function(e) {
                    e.preventDefault();
                    $('#send_money_button').prop('disabled', true);
                    $('#loading_indicator').removeClass('d-none');
              
                    var formData = $('#sendmoneyForm').serialize();
              
                    $.ajaxSetup({
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                    });
              
                    $('#loading_modal').modal('show');
              
                    $.ajax({
                      url: "{{ route('send.money.request') }}",
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
                            window.location.href = "{{ route('accueil') }}";
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
                        $('#send_money_button').prop('disabled', false);
                        $('#loading_indicator').addClass('d-none');
                      }
                    });
                  });
                });
            </script>
            <script>
                $(document).ready(function() {
                    var interval; // Déclaration de la variable interval en dehors des fonctions
                  $('#withdraw_modal').on('show.bs.modal', function() {
                    $(this).addClass('modal-loading');
                  });
              
                  $('#withdraw_modal').on('hide.bs.modal', function() {
                    $(this).removeClass('modal-loading');
                  });
              
                  $('#withdraw_button').click(function(e) {
                    e.preventDefault();
                    $('#withdraw_button').prop('disabled', true);
                    $('#loading_indicator').removeClass('d-none');
              
                    var formData = $('#withdrawForm').serialize();
              
                    $.ajaxSetup({
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                    });
              
                    $('#loading_modal').modal('show');
              
                    $.ajax({
                      url: "{{ route('withdraw.request') }}",
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
                            window.location.href = "{{ route('accueil') }}";
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
                        $('#withdraw_button').prop('disabled', false);
                        $('#loading_indicator').addClass('d-none');
                      }
                    });
                  });
                });
            </script>
            @endsection
            
@endsection