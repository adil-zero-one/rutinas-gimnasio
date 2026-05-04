@extends('layouts.plantilla')
@section('titulo')
    Nueva rutina
@endsection
@section('content')

    <div class="container py-5">

        <h1 class="fw-bold mb-4 mt-4 text-center">Crear nueva rutina</h1>

        <form action="{{ route('rutinas.store') }}" method="POST">
            @csrf

            {{-- Nombre --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Nombre de la rutina</label>
                <input type="text" name="nom" class="form-control" required>
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

            <button type="submit" class="btn btn-primary w-100">
                Guardar rutina
            </button>

        </form>

    </div>
@endsection
