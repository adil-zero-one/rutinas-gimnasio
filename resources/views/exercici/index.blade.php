@extends('layouts.plantilla')
@section('titulo')
    Ejercicios
@endsection
@section('css')
    <link rel="stylesheet" href="staticBg.css">
@endsection
@section('content')
    <div class="container py-5">

        @if (auth()->user()->email === 'admin@admin.cat')
            <h1 class="text-center text-danger">Hola Admin</h1>
        @endif
        <h1 class="fw-bold text-center mb-4">Nuestros ejercicios</h1>
        <p class="text-center text-muted mb-4">
            Estas son nuestros ejercicios descatados. sientete libre a añadirlos en tu rutina.
        </p>

        {{-- Dejare este buton arriba por si hay muchas categorias creadas --}}
        @if (auth()->user()->email === 'admin@admin.cat')
            <div class="text-end mb-4 text-center">
                <a href="{{ route('ejercicios.create') }}" class="btn btn-outline-primary">Añadir un ejercicio</a>
            </div>
        @endif

        {{-- MENSAJES FLAAASH! --}}
        @if (session('exerciciCreado'))
            <div class="alert alert-success text-center">
                {{ session('exerciciCreado') }}
            </div>
        @endif

        @if (session('exerciciBorrado'))
            <div class="alert alert-danger text-center">
                {{ session('exerciciBorrado') }}
            </div>
        @endif

        <div class="row g-4 mb-4" id="categorias">
            @foreach ($exercicis as $exercici)
                <div class="col-12 col-md-4">
                    <div class="card h-100 shadow-sm">
                        {{-- ESTAS IMAGENES SON UN URL SUBIDO CON EL FAKER --}}
                        {{-- Aqui necesitaba un if else para poder mostrar las dos imagenes 
                        las del faker que iban con url y las otras que el admin podra crear que estan en public --}}
                        {{-- si columna string empieza con http lo que entre al seeder con factory entonces mostraalas
                        sino mostra las del public --}}
                        @if (Str::startsWith($exercici->imatge, 'http'))
                            <img src="{{ $exercici->imatge }}" class="card-img-top" style="height:180px;object-fit:cover;">
                        @else
                            <img src="{{ asset('storage/' . $exercici->imatge) }}" class="card-img-top"
                                style="height:180px;object-fit:cover;">
                        @endif


                        {{-- ['categoria_id', 'nom', 'descripcio', 'imatge']; --}}
                        <div class="card-body text-center">
                            <h5 class="fw-bold">{{ $exercici->categoria->nom }}</h5>
                            <p class="text-muted small">{{ $exercici->descripcio }}</p>

                            @if (auth()->user()->email === 'admin@admin.cat')
                                <div class="d-flex justify-content-center gap-2 mt-3">
                                    <a href="{{ route('ejercicios.edit', $exercici->id) }}"
                                        class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('ejercicios.destroy', $exercici->id) }}" method="POST">
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
                    <a href="{{ route('ejercicios.create') }}" class="text-decoration-none">
                        <div class="card h-100 shadow-sm d-flex align-items-center justify-content-center p-4">

                            <div class="text-center">
                                <div class="mb-3">
                                    {{-- libreria bootstrap 
                                https://icons.getbootstrap.com/ --}}
                                    <i class="bi bi-plus-circle fs-1 text-primary"></i>
                                </div>
                                <h5 class="fw-bold text-primary">Añadir nuevo ejercicio</h5>
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
