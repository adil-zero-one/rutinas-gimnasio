@extends('layouts.plantilla')
@section('titulo')
    Nueva rutina
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('staticBg.css')}}">
@endsection
@section('content')
    <div class="container py-5">

        <h1 class="fw-bold mb-4 mt-4 text-center">Crear un nuevo ejercicio</h1>
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

        <form action="{{ route('ejercicios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Nombre --}}
            {{-- protected $fillable = ['categoria_id', 'nom', 'descripcio', 'imatge']; --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Categoria</label>
                <select name="categoria_id" class="form-select" required>
                    <option value="">Selecciona una categoría</option>
                    @foreach ($categorias as $categoria)
                    {{-- arreglo categoria id se quedaba en null mientras era numeric required  --}}
                        <option value="{{$categoria->id}}">{{ $categoria->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Nombre del ejercicio</label>
                <input type="text" name="nom" class="form-control" required>
            </div>

            {{-- Resumen --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Descripción</label>
                <textarea name="descripcio" class="form-control" rows="3" required></textarea>
            </div>

            {{-- imatge --}}
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input type="file" name="imatge" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Añadir nuevo ejercicio
            </button>
            <a href="{{ route('ejercicios.index') }}" class="btn btn-secondary">Volver</a>

        </form>

    </div>
@endsection
