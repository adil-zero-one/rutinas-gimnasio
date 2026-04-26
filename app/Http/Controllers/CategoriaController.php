<?php

namespace App\Http\Controllers;

use App\Models\Categoria;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Iba a crear controlador para cliente tambien
     * que tindra solamente listas de index y show
     * pero los voy a compaginar con el controlador
     * de admin tambien, pero admin tendra funciones
     * de borrar, editar, y actualizar y el cliente no
     */
    public function index()
    {
        // carga todas las categrias
        $categorias = Categoria::all();
        // envialas a la vista
        return view('categoria.principal', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // solo muestra el formulario
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validar los datos introducidos en el formulario
        $request->validate([
            'nom' => 'required',
            'descripcio' => 'required'
        ]);

        // llamar al model encargado de la columna i guardar la categoria nueva
        // apartir de lo que viene en el formulario
        Categoria::created($request->all());
        // redirigir a la llista de categorias con un mensaje
        return redirect()->route('categoria.principal')->with('categoriaCreada', 'Categoria creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * En este caso no usare el find or fail, laravel lo hace automaticamente
     * laravel mira la url categorias/4 y busca en bd:
     * Categoria::findOrFail(7)? lo pasa a $categoria : 404
     */
    public function edit(Categoria $categoria)
    {
        // mostrar el formulario de edicion
        // laravel hace el find() automaticamente y me da la categoria lista
        return view('categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        // validar los datos
        $request->validate([
            'nom' => 'required',
            'descripcio' => 'required'
        ]);

        // actualizar categoria
        $categoria->update($request->all());

        // redirigir a la vista principal
        return redirect()->route('categorias.principal')->with('categoriaActualizada',
        'Categoria actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categoria.principal')->with('categoriaBorrada', 'Categoria borrada correctamente');
    }
}
