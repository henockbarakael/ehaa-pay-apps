<div class="row">
    <div class="col-12">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('accueil')}}">
                    <div class="avatar avatar-40 icon"><i class="bi bi-house-door"></i></div>
                    <div class="col">Accueil</div>
                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" tabindex="-1">
                    <div class="avatar avatar-40 icon"><i class="bi bi-file-earmark-text"></i></div>
                    <div class="col">Mon Compte</div>
                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                </a>
            </li>
            <li class="nav-item">
                <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a class="nav-link" href="#" tabindex="-1" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                    <div class="avatar avatar-40 icon"><i class="bi bi-box-arrow-right"></i></div>
                    <div class="col">Déconnexion</div>
                </a>
            </li>
        </ul>
    </div>
</div>