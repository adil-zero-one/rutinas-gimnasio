<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container-fluid">

        <!-- LOGO -->
        <a class="navbar-brand fw-bold" href="/">
            MiGimnasio
        </a>

        <!--  BOTÓN HAMBURGUESA -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- NAV  -->
        <div class="collapse navbar-collapse justify-content-end" id="mainNav">

            <ul class="navbar-nav">
                {{-- como las rutas no estan en el mmiddleware dle auth me salta error creo
                voy a descomentar luego a ver si acierto --}}
                @auth
                    <!-- SI ESTÁ LOGUEADO -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categorias.principal') }}">Categorías</a>
                    </li>

                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('rutinas.index') }}">Rutinas</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('exercici.index') }}">Ejercicios</a>
                    </li>  --}}

                    <!-- PERFIL DROPDOWN -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-bold" href="#" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    Editar perfil
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        Cerrar sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <!-- SI NO ESTÁ LOGUEADO -->
                    <li class="nav-item">
                        <a class="nav-link" href="#loginSection">Log in</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endauth

            </ul>

        </div>
    </div>
</nav>
