@extends('layouts.plantilla')
@section('titulo')
    @if (auth()->user()->email === 'admin@admin.cat')
        Area Admin
    @else
        Area Cliente
    @endif
@endsection

@section('css')
    <link rel="stylesheet" href="staticBg.css">
@endsection
@section('content')
    <div class="container py-5">
        {{-- SALUDO --}}
        <h1 class="fw-bold text-center mb-4 hover-card">
            @if (auth()->user()->email === 'admin@admin.cat')
                Hola Admin!
                {{-- mensaje flash intenta entrar a http://rutinas_gimnas.test/rutinas/4/edit siendo admin  --}}
                @if (session('adminTrampa'))
                    <div class="alert alert-danger text-center mb-3 mt-3">
                        {{ session('adminTrampa') }}
                    </div>
                @endif
            @else
                Hola socio {{ Auth::user()->name }}
            @endif
        </h1>

        {{-- ICONOS PRINCIPALES --}}
        <div class="d-flex justify-content-center gap-5 my-4">

            <a href="{{ route('categorias.index') }}" class="text-center dashboard-icon">
                <p class="mt-2 fw-semibold border-bottom position-relative">Categorías
                    {{-- badges laravel --}}
                    <span class="position-absolute top-10 start-150 translate-middle badge rounded-pill bg-info">
                        {{ $categorias->count() }}
                    </span>
                </p>
            </a>

            <a href="{{ $rutinasUrl }}" class="text-center dashboard-icon">
                <p class="mt-2 fw-semibold position-relative">Rutinas
                    {{-- badges laravel --}}
                    <span class="position-absolute top-10 start-150 translate-middle badge rounded-pill bg-info">
                        {{ $rutinas->count() }}
                    </span>
                </p>
            </a>

            <a href="{{ route('ejercicios.index') }}" class="text-center dashboard-icon">
                <p class="mt-2 fw-semibold position-relative">Ejercicios
                    {{-- badges laravel --}}
                    <span class="position-absolute top-10 start-150 translate-middle badge rounded-pill bg-info">
                        {{-- este solo mostraba 6 porque esta variable pasa el paginator (6) aunque habia mas ejercicios en bd --}}
                        {{-- {{ $exercicis->count() }} --}}
                        {{ $exercicisTotals->count() }}
                    </span>
                </p>
            </a>

        </div>

        <hr class="my-5">

        {{-- CATEGORÍAS --}}
        <h2 class="fw-semibold mb-3 text-center hover-card">Nuestras categorías</h2>

        <div class="row g-3">
            @for ($i = 0; $i < 3; $i++)
                <div class="col-12 col-md-4">
                    <div class="card custom-card p-3 text-center hover-card">
                        <h5>{{ $categorias[$i]->nom }}</h5>
                        @if ($categorias[$i]->imagen)
                            <img src="{{ asset('storage/' . $categorias[$i]->imagen) }}" class="card-img-top"
                                style="height: 180px; object-fit: cover;">
                        @endif
                    </div>
                </div>
            @endfor

            {{-- TARJETA MÁS CATEGORÍAS --}}
            {{-- edit: centrada en medio, mas garnde y con icono bootstrap --}}
            <div class="col-12 d-flex justify-content-center">
                <div class="col-12 col-md-4">
                    <a href="{{ route('categorias.index') }}"
                        class="card custom-card p-3  text-decoration-none text-center hover-card">
                        <h5 class="fw-bold text-primary text-center"> {{-- libreria bootstrap 
                                https://icons.getbootstrap.com/ --}}
                            Más categorías <i class="bi bi-arrow-right-square "></i>
                            <link rel="stylesheet"
                                href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
                        </h5>
                    </a>
                </div>
            </div>

        </div>

        <hr class="my-5">

        {{-- RUTINAS --}}

        {{-- Si es admin le mostrare las rutinas que han añadido los usuarios/clientes 
        recientamente, pero no le dejare modificar/ni borrarlas solo verlas --}}
        @if (Auth::user()->email === 'admin@admin.cat')
            <h2 class="fw-semibold mb-3 text-center">Rutinas recientes de los usuarios</h2>

            @if ($rutinas->count() === 0)
                <p class="text-muted text-center text-danger">Ningún usuario ha creado rutinas aún.</p>
            @else
                <div class="row g-3">
                    @foreach ($rutinas as $rutina)
                        <div class="col-12 col-md-4">
                            <div class="card custom-card p-3 hover-card">
                                <h5 class="text-center">{{ $rutina->nom }}</h5>
                                <p class="text-muted small text-center">Creada por: {{ $rutina->client->user->name }}</p>
                                {{-- Admin solo puede ver, no editar ni borrar --}}
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @else
            <h2 class="fw-semibold mb-3 text-center hover-card">Tus rutinas</h2>

            @if ($rutinas->count() === 0)
                <p class="text-muted text-center hover-card">Oops… no tienes rutinas creadas aún :(</p>

                <a href="{{ route('rutinas.create') }}"
                    class="btn btn-primary mt-2 text-center d-flex justify-content-center hover-card">
                    + Crear rutina
                </a>

                {{-- RUTINA DE EJEMPLO --}}
                <div class="card custom-card text-center mt-4 p-3 hover-card">
                    <h5>Rutina de ejemplo</h5>
                    <p>Puedes modificarla a tu gusto.</p>
                </div>
            @else
                <div class="row g-3">
                    @foreach ($rutinas as $rutina)
                        <div class="col-12 col-md-4">
                            <div class="card p-3 shadow-sm hover-card">
                                <h5 class="fw-bold mb-1">{{ $rutina->nom }}</h5>
                                <p class="text-muted mb-1">
                                    {{ $rutina->resum }}
                                </p>
                                <p class="fw-semibold mb-0">
                                    Duración: {{ $rutina->duracio }} min
                                </p>
                            </div>
                        </div>
                    @endforeach
                    {{-- Card: Mira tus rutinas --}}
                    <div class="col-12 col-md-4">
                        <a href="{{ route('rutinas.index') }}" class="text-decoration-none">
                            <div
                                class="card p-3 shadow-sm h-100 d-flex flex-column justify-content-center text-center hover-card">

                                <h5 class="fw-bold text-primary">
                                    Mira tus rutinas
                                    <i class="bi bi-arrow-right-square"></i>
                                </h5>

                            </div>
                        </a>
                    </div>

                    {{-- Card: Crear rutina --}}
                    <div class="col-12 col-md-4">
                        <a href="{{ route('rutinas.create') }}" class="text-decoration-none">
                            <div
                                class="card p-3 shadow-sm h-100 d-flex flex-column justify-content-center text-center hover-card">

                                <h5 class="fw-bold text-success">
                                    Crear rutina
                                    <i class="bi bi-plus-circle"></i>
                                </h5>

                            </div>
                        </a>
                    </div>
                </div>
            @endif
        @endif


        <hr class="my-5">

        {{-- EJERCICIOS --}}
        <h2 class="fw-semibold mb-3 text-center">Ejercicios que podrían interesarte</h2>

        <div class="row g-3">
            @foreach ($exercicis as $exercici)
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card custom-card p-2 text-center hover-card">
                        {{-- Sin imagen muestra --}}
                        @if (empty($exercici->imatge))
                            <div class="text-muted small d-flex align-items-center justify-content-center">
                                ejercicios sin imagen
                            </div>
                            {{-- imagen subido con url seeder muestra --}}
                        @elseif (Str::startsWith($exercici->imatge, 'http'))
                            <img src="{{ $exercici->imatge }}" class="img-fluid rounded">
                        @else
                        {{-- imagen local public storage muestra --}}
                            <img src="{{ asset('storage/' . $exercici->imatge) }}" class="img-fluid rounded">
                        @endif
                        <h6 class="mt-2">{{ $exercici->nom }}</h6>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- copia pegar paginator estilo de proyecto estudiantes  --}}
        <div class="d-flex justify-content-center mt-4 hover-card">

            {{-- Mostrando: {{$estudiantes->count()}} estudiantes de {{ $estudiantes -> total()}} --}}
            Mostrando {{ $exercicis->firstItem() }} al {{ $exercicis->lastItem() }} de {{ $exercicis->total() }}
            resultados

        </div>
        <div class="d-flex justify-content-center mt-4 hover-card">

            {{ $exercicis->links() }}
        </div>
    </div>
@endsection
