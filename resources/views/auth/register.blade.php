@extends('layouts.plantilla')
@section('css')
    <link rel="stylesheet" href="style.css">
@endsection
<x-guest-layout>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}"
                class="form-control @error('name') is-invalid @enderror" required autofocus autocomplete="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                class="form-control @error('email') is-invalid @enderror" required autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="data_naixement" class="form-label">Data Nacimiento</label>
            <input id="data_naixement" type="date" name="data_naixement" value="{{ old('data_naixement') }}"
                class="form-control @error('data_naixement') is-invalid @enderror" required autocomplete="username">
            @error('data_naixement')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="dni" class="form-label">Dni</label>
            <input id="dni" type="text" name="dni" value="{{ old('dni') }}"
                class="form-control @error('dni') is-invalid @enderror" required autocomplete="username">
            @error('dni')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="telefon" class="form-label">Telefono</label>
            <input id="telefon" type="text" name="telefon" value="{{ old('telefon') }}"
                class="form-control @error('telefon') is-invalid @enderror" required autocomplete="username">
            @error('telefon')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contrasenya</label>
            <input id="password" type="password" name="password"
                class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirma la contrasenya</label>
            <input id="password_confirmation" type="password" name="password_confirmation"
                class="form-control @error('password_confirmation') is-invalid @enderror" required
                autocomplete="new-password">
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('login') }}" class="text-muted small">Ya tienes cuenta?</a>
            <button type="submit" class="btn btn-primary">Registrar-se</button>
        </div>
    </form>
</x-guest-layout>
