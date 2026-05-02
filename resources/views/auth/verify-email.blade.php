@extends('layouts.plantilla')
@section('css')
        <link rel="stylesheet" href="staticBg.css">
@endsection
<x-guest-layout>
    <p class="text-muted small mb-3">
        Gràcies per registrar-te! Verifica el teu email fent clic a l'enllaç que t'hem enviat.
    </p>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success small">
            S'ha enviat un nou enllaç de verificació al teu email.
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mt-3">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-primary btn-sm">Reenviar email</button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-link btn-sm text-muted">Tancar sessió</button>
        </form>
    </div>
</x-guest-layout>