@extends('layouts.plantilla')
@section('titulo')
    Detalle Rutina
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('staticBg.css') }}">
@endsection
@section('content')
    <div class="container py-5">

        <h1 class="fw-bold text-center mb-4 hover-card">{{ $rutina->nom }}</h1>

        <div class="card shadow-sm mx-auto hover-card" style="max-width: 600px;">
            <div class="card-body">

                <h5 class="fw-bold text-center hover-card">Resumen</h5>
                <p class="text-muted hover-card text-center">{{ $rutina->resum }}</p>

                <h5 class="fw-bold mt-3 hover-card text-center">Duración</h5>
                <p class="fw-semibold hover-card text-center">{{ $rutina->duracio }} minutos</p>

                <hr>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('rutinas.index') }}" class="btn btn-secondary hover-card">
                        Volver
                    </a>

                    <a href="{{ route('rutinas.edit', $rutina->id) }}" class="btn btn-warning hover-card">
                        Editar
                    </a>

                    <form action="{{ route('rutinas.destroy', $rutina->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger hover-card">
                            Eliminar
                        </button>
                    </form>
                </div>

            </div>
        </div>


        <hr class="my-5">

        {{-- accordion bootstrap  --}}
        <div class="accordion" id="rutinaAccordion">

            {{-- ejercicios añadidos  --}}
            <div class="accordion-item mb-3">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-bold hover-card" type="button" data-bs-toggle="collapse"
                        data-bs-target="#ejerciciosAñadidos">
                        Ejercicios añadidos
                    </button>
                </h2>

                <div id="ejerciciosAñadidos" class="accordion-collapse collapse">
                    <div class="accordion-body">

                        @if ($rutina->exercicis->isEmpty())
                            <p class="text-muted">No hay ejercicios añadidos todavía.</p>
                        @else
                            @foreach ($rutina->exercicis as $ex)
                                <div class="card shadow-sm mb-3">
                                    <div class="card-body">

                                        <h5 class="fw-bold text-center">{{ $ex->nom }}</h5>

                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <label class="fw-semibold">Series</label>
                                                <form action="{{ route('rutinas.updatePivot', [$rutina->id, $ex->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="number" name="series" value="{{ $ex->pivot->series }}"
                                                        class="form-control">
                                            </div>

                                            <div class="col-md-6">
                                                <label class="fw-semibold">Reps</label>
                                                <input type="number" name="repeticions"
                                                    value="{{ $ex->pivot->repeticions }}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="d-flex gap-2 mt-3">
                                            <button class="btn btn-warning btn-sm">Actualizar</button>
                                            </form>

                                            <form action="{{ route('rutinas.borrarPivot', [$rutina->id, $ex->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>

            {{-- añadir ejercicios --}}
            <div class="accordion-item mb-3">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-bold hover-card" type="button" data-bs-toggle="collapse"
                        data-bs-target="#añadirEjercicio">
                        Añadir ejercicio
                    </button>
                </h2>

                <div id="añadirEjercicio" class="accordion-collapse collapse">
                    <div class="accordion-body">

                        <div class="card shadow-sm">
                            <div class="card-body">

                                <form action="{{ route('rutinas.addExercici', $rutina->id) }}" method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="fw-semibold">Ejercicio</label>
                                            <select name="exercici_id" class="form-select">
                                                @foreach ($exercicis as $ex)
                                                    <option value="{{ $ex->id }}">{{ $ex->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="fw-semibold">Series</label>
                                            <input type="number" name="series" class="form-control" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="fw-semibold">Reps</label>
                                            <input type="number" name="repeticions" class="form-control" required>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary mt-3 w-100">Añadir ejercicio</button>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
