@extends('layouts.plantilla')
@section('titulo')
    Modificacion rutina
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('staticBg.css') }}">
@endsection
@section('content')
    <div class="container py-5">

        <h1 class="fw-bold mb-4">Editar rutina</h1>

        {{-- FLASH MESSAGE --}}
        @if (session('rutinaActualizada'))
            <div class="alert alert-warning text-center">
                {{ session('rutinaActualizada') }}
            </div>
        @endif

        {{-- Mostrar errores --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('rutinas.update', $rutina->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Nombre --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Nombre</label>
                <input type="text" name="nom" class="form-control" value="{{ old('nom', $rutina->nom) }}" required>
            </div>

            {{-- Resumen --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Resumen</label>
                <textarea name="resum" class="form-control" rows="3" required>{{ old('resum', $rutina->resum) }}</textarea>
            </div>

            {{-- Duración --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Duración (minutos)</label>
                <input type="number" name="duracio" class="form-control" value="{{ old('duracio', $rutina->duracio) }}"
                    min="1" required>
            </div>

            <button class="btn btn-warning">Actualizar</button>
            <a href="{{ route('rutinas.index') }}" class="btn btn-secondary">Volver</a>
        </form>

    </div>
@endsection
