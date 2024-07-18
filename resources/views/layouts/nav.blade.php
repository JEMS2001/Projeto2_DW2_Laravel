<style>
    .navbar {
        background-color: rgba(0, 0, 0, 0.8);
        padding: 1rem;
        box-shadow: 0 0 15px rgba(128, 0, 255, 0.7);
    }
    .navbar-nav {
        margin-left: auto;
    }
    .nav-item {
        margin-left: 1rem;
    }
    .nav-link {
        color: #fff !important;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    .nav-link:before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background-color: #a855f7;
        transition: all 0.3s ease;
    }
    .nav-link:hover {
        color: #a855f7 !important;
        text-shadow: 0 0 5px #a855f7;
    }
    .nav-link:hover:before {
        width: 100%;
    }
    .navbar-brand {
        color: #fff !important;
        font-weight: bold;
        transition: all 0.3s ease;
    }
    .navbar-brand:hover {
        color: #a855f7 !important;
        text-shadow: 0 0 10px #a855f7;
    }
    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 0.8)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }
    .dropdown-menu {
        background-color: rgba(0, 0, 0, 0.8);
        border: none;
        box-shadow: 0 0 15px rgba(128, 0, 255, 0.7);
    }
    .dropdown-item {
        color: #fff;
    }
    .dropdown-item:hover {
        background-color: rgba(168, 85, 247, 0.2);
        color: #a855f7;
    }
</style>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('criar_curso') }}">Criar Curso</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Perfil
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('meus_cursos') }}">Meus Cursos</a></li>
                        <li><a class="dropdown-item" href="{{ route('profile.show') }}">Ver Perfil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>