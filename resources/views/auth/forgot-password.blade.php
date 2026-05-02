@extends('layouts.plantilla')
@section('css')
        <link rel="stylesheet" href="staticBg.css">
@endsection
<x-guest-layout>
    <p class="text-muted small mb-3">
        ¿Has olvidado tu contraseña? Escribe tu email y te enviaremos un enlace para restablecerlo.
    </p>

    <x-auth-session-status class="mb-3" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   class="form-control @error('email') is-invalid @enderror"
                   required autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Enviar enlace</button>
        </div>
    </form>

</x-guest-layout>