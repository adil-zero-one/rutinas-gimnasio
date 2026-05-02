@extends('layouts.plantilla')

@section('titulo')
    perfil
@endsection
@section('css')
    <link rel="stylesheet" href="staticBg.css">
@endsection
    <div class="container py-5">
        @include('profile.partials.update-profile-information-form')
        @include('profile.partials.update-password-form')
        @include('profile.partials.delete-user-form')
    </div>
