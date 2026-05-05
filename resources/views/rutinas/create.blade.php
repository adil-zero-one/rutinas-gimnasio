@extends('layouts.plantilla')
@section('titulo')
    Nueva rutina
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('staticBg.css') }}">
@endsection
@section('content')

    <div class="container py-5">

        <h1 class="fw-bold mb-4 mt-4 text-center">Crear nueva rutina</h1>
        {{-- mostrar todos los errores que salen en el formulario --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('rutinas.store') }}" method="POST">
            @csrf
            {{-- Nombre --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Nombre de la rutina</label>
                <input type="text" name="nom" class="form-control" required>
            </div>
            {{-- mi habia olvidado de la tabla entre-media series y repes.. 🥲 --}}
            {{-- $table->integer('series'); --}}
            {{-- $table->integer('repeticions'); --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Numero de series</label>
                <input type="number" name="series" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Numero de repeticions</label>
                <input type="number" name="repeticions" class="form-control" required>
            </div>

            {{-- Resumen --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Resumen</label>
                <textarea name="resum" class="form-control" rows="3" required></textarea>
            </div>

            {{-- Duración --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Duración (minutos)</label>
                <input type="number" name="duracio" class="form-control" min="1" required>
            </div>

            <button type="submit" class="btn btn-primary">
                Guardar rutina
            </button>
            <a href="{{ route('rutinas.index') }}" class="btn btn-secondary">Volver</a>

        </form>

    </div>
@endsection
