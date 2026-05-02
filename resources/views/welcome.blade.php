@extends('layouts.plantilla')
@section('css')
    <link rel="stylesheet" href="{{ asset('style.css') }}">
@endsection
@section('content')
    {{-- ***** AQUI COMIENÇA EL BODY DESPUES DEL NAV ******** --}}
    {{-- script toggle mode light switch dark -> light 
en una practica de javaScript en classe hemos hecho esta actividad
de dark-light mode, lo implemento aqui tambien  --}}
    <button class="btn btn-dark m-2 mb-0 text" id="toggle-mode"><span class="text">Dark</span></button>
    <div class="container my-5">
        <div class="row g-4">

            @foreach (['Rutinas', 'Ejercicios', 'Categorías', 'Nutrición', 'Progreso', 'Clases'] as $i => $item)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card custom-card">
                        {{-- @foreach ($exercicis as $exercici) --}}
                        <img src="{{ $exercicis[$i]->imatge }}" class="card-img-top" alt="...">
                        {{-- @endforeach --}}

                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $item }}</h5>

                            <a href="#loginSection" class="btn btn-primary discover-btn">
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
                    <a href="{{ route('register') }}">Regístrate</a>
                </div>

            </form>

        </div>
    </div>


    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif

@section('scripts')
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
@endsection

@endsection
