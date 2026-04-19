{{-- aqui voy a crear la estractura html que voy a pasar a todas las paginas-views-rutas que voy a usar en mi proyecto
asi no tendre que repiterlo en cada fitxer que añado --}}


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo')</title>
    {{-- por si quiero añadir css en una sola vista --}}
    @yield('css')

    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid" id="navBar15">

            <!-- LOGO / NOMBRE A LA IZQUIERDA -->
            <a class="navbar-brand" href="/">
                MiGimnasio
            </a>

            <!-- BOTÓN HAMBURGUESA MÓVIL -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- CONTENIDO DEL NAV -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

                @if (Route::has('login'))
                    <ul class="navbar-nav">

                        @auth
                            <!-- SI ESTÁ LOGUEADO -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                            </li>
                        @else
                            <!-- SI NO ESTÁ LOGUEADO -->
                            <li class="nav-item">
                                <a class="nav-link" href="#loginSection">Log in</a>
                            </li>

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @endauth

                    </ul>
                @endif

            </div>
        </div>
    </nav>

    {{-- ***** AQUI COMIENÇA EL BODY DESPUES DEL NAV ******** --}}
    {{-- script toggle mode light switch dark -> light 
en una practica de javaScript en classe hemos hecho esta actividad
de dark-light mode, lo implemento aqui tambien  --}}
    <button class="btn btn-dark m-2 mb-0" id="toggle-mode"><span class="text">Dark</span></button>
    <div class="container my-5">
        <div class="row g-4">

            @foreach (['Rutinas', 'Ejercicios', 'Categorías', 'Nutrición', 'Progreso', 'Clases'] as $item)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card custom-card">
                        <img src="/img/default.jpg" class="card-img-top" alt="...">

                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $item }}</h5>

                            <a href="#loginSection" class="btn btn-primary discover-btn" >
                                Descúbrelo
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div id="loginSection" class="login-wrapper">
        <div class="login-card">

            <h2 class="text-center mb-4">Iniciar sesión</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- EMAIL -->
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror" required autofocus
                        autocomplete="username">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- PASSWORD -->
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input id="password" type="password" name="password"
                        class="form-control @error('password') is-invalid @enderror" required
                        autocomplete="current-password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- REMEMBER -->
                <div class="mb-3 form-check">
                    <input id="remember_me" type="checkbox" name="remember" class="form-check-input">
                    <label for="remember_me" class="form-check-label">Recuérdame</label>
                </div>

                <!-- BOTÓN + FORGOT -->
                <div class="d-flex justify-content-between align-items-center">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-muted small">
                            ¿Has olvidado la contraseña?
                        </a>
                    @endif

                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                </div>

                <hr>

                <!-- REGISTER -->
                <div class="text-center small">
                    ¿No tienes cuenta?
                    <a href="#registerSection">Regístrate</a>
                </div>

            </form>

        </div>
    </div>


    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
    @yield('scripts')
   
{{-- script toggle mode light switch dark -> light --}}
<script>

	const lightSwitch = document.querySelector("#toggle-mode")
	const selectAll = document.querySelector("body")

	lightSwitch.addEventListener('click', () => {
		document.body.classList.toggle('dark-mode')
		if (document.body.classList.contains('dark-mode')) {
			lightSwitch.textContent = 'Light'

		} else {
			lightSwitch.textContent = 'Dark'
		}
	})
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
