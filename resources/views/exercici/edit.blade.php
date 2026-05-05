@extends('layouts.plantilla')

@section('titulo')
    Modificar Ejercicio
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('staticBg.css') }}">
@endsection

@section('content')
    <div class="container py-5">

        <h1 class="fw-bold mb-4">Editar ejercicio</h1>

        {{-- FLASH MESSAGE --}}
        @if (session('exerciciModifcado'))
            <div class="alert alert-warning text-center">
                {{ session('exerciciModifcado') }}
            </div>
        @endif

        <form action="{{ route('ejercicios.update', $exercici->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Nombre --}}
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nom" class="form-control" value="{{ old('nom', $exercici->nom) }}">
            </div>

            {{-- Descripción --}}
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea name="descripcio" class="form-control" rows="3">{{ old('descripcio', $exercici->descripcio) }}</textarea>
            </div>

            {{-- Categoría --}}
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <select name="categoria_id" class="form-select">
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}"
                            {{ $categoria->id == $exercici->categoria_id ? 'selected' : '' }}>
                            {{ $categoria->nom }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Imagen actual --}}
            <div class="mb-3">
                <label class="form-label">Imagen actual</label><br>

                @if (Str::startsWith($exercici->imatge, 'http'))
                    <img src="{{ $exercici->imatge }}" class="card-img-top" style="height:180px;object-fit:cover;">
                @else
                    <img src="{{ asset('storage/' . $exercici->imatge) }}" class="card-img-top"
                        style="height:180px;object-fit:cover;">
                @endif

            </div>

            {{-- Nueva imagen --}}
            <div class="mb-3">
                <label class="form-label">Nueva imagen</label>
                <input type="file" name="imatge" class="form-control">
            </div>

            <button class="btn btn-warning">Actualizar</button>
            <a href="{{ route('ejercicios.index') }}" class="btn btn-secondary">Volver</a>
        </form>

    </div>
@endsection
