@extends('layouts.plantilla')
@section('titulo')
    Crear nueva categoria
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('staticBg.css') }}">
@endsection
@section('content')
    <div class="container py-5">

        <h1 class="fw-bold mb-4 text-center">Crear categoria</h1>
        {{-- Mostrar errores del formulario --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('categorias.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nom" class="form-control" value="{{ old('nom') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea name="descripcio" class="form-control">{{ old('descripcio') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input type="file" name="imagen" class="form-control">
            </div>

            <button class="btn btn-primary">Guardar</button>
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Volver</a>
        </form>

    </div>
@endsection
