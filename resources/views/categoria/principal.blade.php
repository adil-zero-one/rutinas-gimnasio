@extends('layouts.plantilla')
@section('css')
    <link rel="stylesheet" href="staticBg.css">
@endsection
@section('content')
    <div class="container py-5">
        @if (auth()->user()->email === 'admin@admin.cat')
            <h1 class="text-center text-danger">Hola Admin</h1>
        @endif
        <h1 class="fw-bold text-center mb-4">Nuestras categorías</h1>
        <p class="text-center text-muted mb-4">
            Estas son nuestras categorías principales. Cada una representa un grupo muscular distinto.
        </p>

        {{-- Dejare este buton arriba por si hay muchas categorias creadas --}}
        @if (auth()->user()->email === 'admin@admin.cat')
            <div class="text-end mb-4 text-center">
                <a href="{{ route('categorias.create') }}" class="btn btn-outline-primary">Crear categoria</a>
            </div>
        @endif

        <div class="row g-4 mb-4" id="categorias">
            @foreach ($categorias as $categoria)
                <div class="col-12 col-md-4">
                    <div class="card h-100 shadow-sm">
                        {{-- TODAS LAS IMAGENES SUBIDAS SE HAN COMPRIMIDO ANTES DE SUBIRLAS --}}
                        @if ($categoria->imagen)
                            <img src="{{ asset('storage/' . $categoria->imagen) }}" class="card-img-top"
                                style="height: 180px; object-fit: cover;">
                        @endif

                        <div class="card-body text-center">
                            <h5 class="fw-bold">{{ $categoria->nom }}</h5>
                            <p class="text-muted small">{{ $categoria->descripcio }}</p>

                            @if (auth()->user()->email === 'admin@admin.cat')
                                <div class="d-flex justify-content-center gap-2 mt-3">
                                    <a href="{{ route('categorias.edit', $categoria->id) }}"
                                        class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            @endforeach
            {{-- Tarjeta "Crear categoría" --}}
            @if (auth()->user()->email === 'admin@admin.cat')
                <div class="col-12 col-md-4">
                    <a href="{{ route('categorias.create') }}" class="text-decoration-none">
                        <div class="card h-100 shadow-sm d-flex align-items-center justify-content-center p-4">

                            <div class="text-center">
                                <div class="mb-3">
                                    {{-- libreria bootstrap 
                                https://icons.getbootstrap.com/ --}}
                                    <i class="bi bi-plus-circle fs-1 text-primary"></i>
                                </div>
                                <h5 class="fw-bold text-primary">Crear categoría</h5>
                                <link rel="stylesheet"
                                    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
                            </div>

                        </div>
                    </a>
                </div>
            @else
                {{-- si es cliente entonces mandarlo a crear rutina --}}
                <div class="col-12 col-md-4">
                    <a href="{{ route('rutinas.create') }}" class="text-decoration-none">
                        <div class="card h-100 shadow-sm d-flex align-items-center justify-content-center p-4">

                            <div class="text-center">
                                <div class="mb-3">
                                    {{-- libreria bootstrap 
                                https://icons.getbootstrap.com/ --}}
                                    <i class="bi bi-plus-circle fs-1 text-success"></i>
                                </div>
                                <h5 class="fw-bold text-success">Crea tu rutina</h5>
                                <link rel="stylesheet"
                                    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
                            </div>
                        </div>
                    </a>
                </div>
            @endif
        </div>

    </div>
@endsection
