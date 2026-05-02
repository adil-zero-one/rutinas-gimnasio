@extends('layouts.plantilla')
@section('css')
    <link rel="stylesheet" href="staticBg.css">
@endsection
@foreach ($categorias as $categoria)
    <ul>
        <li>{{$categoria->nom}}</li>
        <li>{{$categoria->descripcio}}</li>
    </ul>
@endforeach