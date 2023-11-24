<div class="sidebar-wrap  sidebar-pushcontent">
    <!-- Add overlay or fullmenu instead overlay -->
    <div class="closemenu text-muted">Close Menu</div>
    <div class="sidebar dark-bg">
        <!-- user information -->
        <div class="row my-3">
            <div class="col-12 ">
                <div class="card shadow-sm bg-opac text-white border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <figure class="avatar avatar-44 rounded-15">
                                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="">
                                </figure>
                            </div>
                            <div class="col px-0 align-self-center">
                                <p class="mb-1">{{Auth::user()->username}}</p>
                                <p class="text-muted size-12">{{Auth::user()->phone_number}}</p>
                            </div>
                            <div class="col-auto">
                                <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a href="#" class="btn btn-44 btn-light" tabindex="-1" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                                    <i class="bi bi-box-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- user emnu navigation -->
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('accueil')}}">
                            <div class="avatar avatar-40 rounded icon"><i class="bi bi-house-door"></i></div>
                            <div class="col">Accueil</div>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                            <div class="avatar avatar-40 rounded icon"><i class="bi bi-person"></i></div>
                            <div class="col">Mon Compte</div>
                            <div class="arrow"><i class="bi bi-plus plus"></i> <i class="bi bi-dash minus"></i>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item nav-link" href="{{ route('account') }}">
                                    <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar2"></i></div>
                                    <div class="col">Profile</div>
                                </a></li>
                            <li><a class="dropdown-item nav-link" href="">
                                    <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar-check"></i>
                                    </div>
                                    <div class="col">Paramètre</div>
                                </a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" tabindex="-1">
                            <div class="avatar avatar-40 rounded icon"><i class="bi bi-chat-text"></i></div>
                            <div class="col">Messages</div>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="" tabindex="-1">
                            <div class="avatar avatar-40 rounded icon"><i class="bi bi-bell"></i></div>
                            <div class="col">Notification</div>
                        </a>
                    </li>

                    <li class="nav-item">
                        <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();" tabindex="-1">
                            <div class="avatar avatar-40 rounded icon"><i class="bi bi-box-arrow-right"></i></div>
                            <div class="col">Déconnexion</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>