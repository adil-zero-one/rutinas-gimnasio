@extends('layouts.plantilla')
@section('css')
        <link rel="stylesheet" href="staticBg.css">
@endsection
@section('content')
 
<x-guest-layout>
   @if (session('noAdminNoLogin'))
        <div class="alert alert-danger text-center mt-3">
            {{ session('noAdminNoLogin') }}
        </div>
    @endif

    <x-auth-session-status class="mb-3" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   class="form-control @error('email') is-invalid @enderror"
                   required autofocus autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input id="password" type="password" name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   required autocomplete="current-password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 form-check">
            <input id="remember_me" type="checkbox" name="remember" class="form-check-input">
            <label for="remember_me" class="form-check-label">Recuérdeme</label>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-muted small">
                    ¿Has olvidado tu contraseña?
                </a>
            @endif
            <button type="submit" class="btn btn-primary">Iniciar sessión</button>
        </div>

        <hr>
        <div class="text-center small">
            ¿No tienes cuenta?
            <a href="{{ route('register') }}">regístrate</a>
        </div>
    </form>
</x-guest-layout>
@endsection