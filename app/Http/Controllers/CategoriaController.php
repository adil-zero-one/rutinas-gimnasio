<?php

namespace App\Http\Controllers;

use App\Models\Categoria;

use Illuminate\Http\Request;
// para soporte imagenes
use Illuminate\Support\Facades\Storage;

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
        $validar = $request->validate([
            'nom' => 'required',
            'descripcio' => 'required',
            'imagen' => 'nullable|image|max:2048'
        ]);
        // soporte imagenes desde el exercici controller (origin)
        if ($request->hasFile('imagen')) {
            $validar['imagen'] = Storage::put('categorias', $request->imagen);
        }
        // llamar al model encargado de la columna i guardar la categoria nueva
        // apartir de lo que viene en el formulario
        Categoria::create($validar);
        // redirigir a la llista de categorias con un mensaje
        return redirect()->route('categorias.index')->with('categoriaCreada', 'Categoria creada correctamente');
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
     * PORFIIIIIIN HE ENCONTRADO LA SOLUCION DESPUES DE HORAS DEBUGING
     * EL UPDATE ME DABA UN ERROR THE PATH MUST NOT BE EMPTY, SINCERAMENTE HE USADO
     * 2 IA DIFERENTES PARA PODER SOLUCIONARLO Y NADA SON LAS 23:47 Y PORFIN SE HA RESUELTO
     * VALE LA PENA? SI
     * LA SOLUCION ESTA AQUI (STACKOVERFLOW) SIGUE BRILLANDO EN LA ERA DE LA IA <3
     * https://stackoverflow.com/questions/70093647/path-cannot-be-empty-laravel
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);

        // validar los datos
        $validar = $request->validate([
            'nom' => 'required',
            'descripcio' => 'required',
            'imagen' => 'nullable|image|max:2048',
        ]);

        // si sube nueva imagen → borrar la antigua
        if ($request->hasFile('imagen')) {
            // borrar la imagen antigua si existe
            if ($categoria->imagen) {
                Storage::delete($categoria->imagen);
                // Storage::disk('public')->delete($categoria->imagen);

            }
            // subir el nuevo imagen
            $validar['imagen'] = Storage::put('categorias', $request->imagen);
        }

        // actualizar categoria
        $categoria->update($validar);

        // redirigir a la misma vista  del edit con mensaje flash
        return redirect()->route('categorias.edit', $id)->with(
            'categoriaActualizada',
            'Categoria actualizada correctamente'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        // borro el imagen del storage y asi no se ocumulan imagenes
        if ($categoria->imagen) {
            Storage::delete($categoria->imagen);
            // Storage::disk('public')->delete($categoria->imagen);
        }
        $categoria->delete();

        return redirect()->route('categorias.index')->with('categoriaBorrada', 'Categoria borrada correctamente');
    }
}
