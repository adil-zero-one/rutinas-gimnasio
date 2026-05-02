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
 
        <h1 class="mt-4">Bienvenido al Dashboard</h1>
        hello world
@endsection
