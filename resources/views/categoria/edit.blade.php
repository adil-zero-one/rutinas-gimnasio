@extends('layouts.plantilla')
@section('titulo')
    Modificar Categoria
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('staticBg.css') }}">
@endsection
@section('content')
    <div class="container py-5">

        <h1 class="fw-bold mb-4">Editar categoria</h1>

        @if (session('categoriaActualizada'))
            <div class="alert alert-warning text-center">
                {{ session('categoriaActualizada') }}
            </div>
        @endif
        <form action="{{ route('categorias.update', $categoria->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nom" class="form-control" value="{{ old('nom', $categoria->nom) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea name="descripcio" class="form-control">{{ old('descripcio', $categoria->descripcio) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Imagen actual</label><br>

                @if ($categoria->imagen)
                    <img src="{{ asset('storage/' . $categoria->imagen) }}"
                        style="width: 200px; height: 150px; object-fit: cover;" class="rounded mb-3">
                @else
                    <p class="text-muted">No hay imagen</p>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Nueva imagen</label>
                <input type="file" name="imagen" class="form-control">
            </div>

            <button class="btn btn-warning">Actualizar</button>
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Volver</a>
        </form>

    </div>
@endsection
