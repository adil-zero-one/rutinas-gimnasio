@extends('layouts.plantilla')
@section('css')
    <link rel="stylesheet" href="staticBg.css">
@endsection
<x-guest-layout>
    @section('navbar')
    @endsection
    <p class="text-muted small mb-3  text-center">
        ¿Has olvidado tu contraseña? Escribe tu email y te enviaremos un enlace para restablecerlo.
    </p>

    <x-auth-session-status class="mb-3" :status="session('status')" />

    <form method="POST" id="forgot-form" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                class="form-control @error('email') is-invalid @enderror" required autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Enviar enlace</button>
        </div>
        <div class="d-flex justify-content-evenly mt-3">
            <a href="{{ route('login') }}#login-form" class="btn btn-outline-primary">
                Volver al login
            </a>

            <a href="/" class="btn btn-outline-primary">
                Volver a página inicial
            </a>
        </div>


    </form>

</x-guest-layout>
