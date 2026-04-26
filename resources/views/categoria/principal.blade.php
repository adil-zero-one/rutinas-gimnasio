@foreach ($categorias as $categoria)
    <ul>
        <li>{{$categoria->nom}}</li>
        <li>{{$categoria->descripcio}}</li>
    </ul>
@endforeach