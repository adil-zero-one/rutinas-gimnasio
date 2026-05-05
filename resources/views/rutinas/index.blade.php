@extends('layouts.plantilla')
@section('titulo')
    Rutinas Home
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('staticBg.css') }}">
@endsection
@section('content')
    <div class="container py-5">

        @if (auth()->user()->email !== 'admin@admin.cat')
            <h1 class="fw-bold text-center mb-4">Tus rutinas</h1>
        @else
            <h1 class="fw-bold text-center text-danger mb-4">Hola Admin</h1>
            <p class="text-muted text-center mb-4">
                Los usuarios han creado {{ $rutinas->count() }} rutinas en total
            </p>
        @endif

        {{-- FLASH MESSAGES --}}
        @if (session('rutinaCreada'))
            <div class="alert alert-warning text-center">
                {{ session('rutinaCreada') }}
            </div>
        @endif

        @if (session('rutinaBorrada'))
            <div class="alert alert-danger text-center">
                {{ session('rutinaBorrada') }}
            </div>
        @endif

        {{-- Botón crear rutina solo visible al cliente --}}
        @if (auth()->user()->email !== 'admin@admin.cat')
            <div class="text-center mb-4">
                <a href="{{ route('rutinas.create') }}" class="btn btn-primary">
                    Crear nueva rutina
                </a>
            </div>
        @endif

        <div class="row g-4">
            @foreach ($rutinas as $rutina)
                <div class="col-12 col-md-4">
                    <div class="card h-100 shadow-sm">

                        <div class="card-body text-center">
                            <h5 class="fw-bold">{{ $rutina->nom }}</h5>
                            <p class="text-muted small">{{ $rutina->resum }}</p>
                            <p class="fw-semibold">{{ $rutina->duracio }} min</p>
                            @if (auth()->user()->email !== 'admin@admin.cat')
                                <div class="d-flex justify-content-center gap-2 mt-3">
                                    <a href="{{ route('rutinas.show', $rutina->id) }}" class="btn btn-info btn-sm">
                                        Ver
                                    </a>

                                    <a href="{{ route('rutinas.edit', $rutina->id) }}" class="btn btn-warning btn-sm">
                                        Editar
                                    </a>

                                    <form action="{{ route('rutinas.destroy', $rutina->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            @endforeach
            @if (auth()->user()->email !== 'admin@admin.cat')
                <div class="col-12 col-md-4">
                    <a href="{{ route('rutinas.create') }}" class="text-decoration-none">
                        <div class="card h-100 shadow-sm d-flex align-items-center justify-content-center p-4">

                            <div class="text-center">
                                <div class="mb-3">
                                    <i class="bi bi-plus-circle fs-1 text-primary"></i>
                                </div>
                                <h5 class="fw-bold text-primary">Crear nueva rutina</h5>
                            </div>

                        </div>
                    </a>
                </div>
            @endif
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
            {{-- Botón para volver --}}
            <div class="text-center mb-4">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                    Volver al dashboard
                </a>
            </div>
        </div>

    </div>
@endsection
