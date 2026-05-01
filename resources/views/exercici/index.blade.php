@extends('layouts.plantilla')
@section('titulo')
    Ejercicios
@endsection
@section('content')
    {{-- test idea exercici count 1 < no tienes ejercicios añaadidos
con button añade ejercicios --}}
    <h1>welcome section de mofidicar test</h1>
    @foreach ($exercicis as $exercici)
        <ul>
            <li>
                {{ $exercici->categoria->nom }}
                {{ $exercici->nom }}
            </li>
        </ul>
        <li>

            @if ($exercici->categoria)
                {{ $exercici->categoria->nom }}
            @else
                <p>sin categoria</p>
            @endif
        </li>
        <li>
            @if ($exercici->imatge)
                <img src="{{$exercici->imatge}}" width="100">
            @else
                <p>sin imagen</p>
            @endif
        </li>
    @endforeach
    @foreach ($categorias as $categoria)
        
    @endforeach
@endsection
