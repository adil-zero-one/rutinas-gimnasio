@extends('layouts.plantilla')
@section('titulo')
    Detalle Rutina
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('staticBg.css') }}">
@endsection
@section('content')
    <div class="container py-5">

        <h1 class="fw-bold text-center mb-4">{{ $rutina->nom }}</h1>

        <div class="card shadow-sm mx-auto" style="max-width: 600px;">
            <div class="card-body">

                <h5 class="fw-bold">Resumen</h5>
                <p class="text-muted">{{ $rutina->resum }}</p>

                <h5 class="fw-bold mt-3">Duración</h5>
                <p class="fw-semibold">{{ $rutina->duracio }} minutos</p>

                <hr>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('rutinas.index') }}" class="btn btn-secondary">
                        Volver
                    </a>

                    <a href="{{ route('rutinas.edit', $rutina->id) }}" class="btn btn-warning">
                        Editar
                    </a>

                    <form action="{{ route('rutinas.destroy', $rutina->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">
                            Eliminar
                        </button>
                    </form>
                </div>

            </div>
        </div>

    </div>
@endsection
