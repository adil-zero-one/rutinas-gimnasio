@extends('layouts.plantilla')
@section('css')
    <link rel="stylesheet" href="staticBg.css">
@endsection
<x-guest-layout>
    <p class="text-muted small mb-3">
        Ésta es un área segura. Confirma tu contraseña antes de continuar.
    </p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input id="password" type="password" name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   required autocomplete="current-password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Confirmar</button>
        </div>
    </form>
</x-guest-layout>