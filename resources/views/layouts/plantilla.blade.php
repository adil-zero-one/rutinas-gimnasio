{{-- aqui voy a crear la estractura html que voy a pasar a todas las paginas-views-rutas que voy a usar en mi proyecto
asi no tendre que repiterlo en cada fitxer que añado --}}


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo')</title>
    {{-- por si quiero añadir css en una sola vista --}}
    @yield('css')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    {{-- voy a usar auth y guest mas simple y rapido
    en vez de usar @if(Auth::check()) else.. --}}
    @auth
         {{-- logeado muestra --}}
    @include('layouts.navigation')
    <div class="container-fluid">

        @yield('content')
    </div>
    @endauth
    @guest
    {{-- no logeado muestra --}}
        @yield('content')
    @endguest
    @yield('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
