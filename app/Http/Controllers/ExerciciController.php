<?php

namespace App\Http\Controllers;

use App\Models\Exercici;
use App\Models\Categoria;
use App\Models\Rutina;
use Illuminate\Http\Request;
// para soporte imagenes
use Illuminate\Support\Facades\Storage;

class ExerciciController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // cliente + admin podran ver ejercicios

        // otra version
        // $ejercicios = Exercici::with('categoria')->get();
        $exercicis = Exercici::all();
        $categorias = Categoria::all();
        return view('exercici.index', compact('exercicis', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // aqui el admin escogera en que categoria creara el ejercicio
        $categorias = Categoria::all();
        // redirigir donde rellenara el usuari el formulario
        return view('exercici.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validar los datos para guardarlos
        // validacion de datos antes de inserir a bd
        // validate sigue la regla de 3 arrays -> 1-validar 2. mensajes personalizados
        // 3.. cambiar el nombre de los atributos
        $validarDatosFormulario = $request->validate(
            [
                'nom' => 'required|min:3|max:100',
                'descripcio' => 'required|min:10',
                // para sacar en que categoria partenece el ejercicio que quiere
                // añadir el cliente
                'categoria_id' => 'required|numeric',
                'imatge' => 'nullable|image|max:2048'
            ],
            //    pondré aqui los errores customizados del validate
            // hay miles de maneras para hacer este cambio, si son muchos campos es mejor modificar
            // o instalar el idioma desde el fitxero validation
            [
                // para el campo nom
                'nom.required' => 'El nombre es obligatorio',
                'nom.min' => 'El nombre no podra tener menos de 3 letras',
                'nom.max' => 'El nombre no podra tener mas de 100 letras',

                // para el cambo descripcio
                'descripcio.min' => 'Si añades una descripcion, debe tener minimo 10 letras! Echale ganas va.',

                // categoria id
                'categoria_id.required' => 'El id es obligatorio',
                'categoria_id.numeric' => 'El id debe ser numerico',

                // imatge
                'imatge.max' => 'Baja un poco la resolucion amigo gimnaciero',
            ],
            [
                // si quiero cambier el nombre de los atributos
            ]
        );

        // siguiendo la manera del profe para guardar el imagen como url texto en bd
        if ($request->hasFile('imatge')) {
            /* como no he usado la version de $categoria = new Categoria()..
            $categoria->nom = $request->name; ...
            $categoria->save()
            apartir del validator tenia que crear el nuevo ejercicio(version mas moderna
            (que ahorra codigo)) 
            en vez de $exercici->imatge = Storage::put('exercicis', $request->imatge);
            tego que hacerlo con el validator tambien aqui, como el validator es un array asociativo
            entonces tenia que accedir a 'imatge' con la clave de array position ['imatge']
            */
            $validarDatosFormulario['imatge'] = Storage::put('exercicis', $request->imatge);
        }
        // save() al ejercicio apartir de lo que viene del validator arriba
        Exercici::create($validarDatosFormulario);

        return redirect()->route('ejercicios.index')->with('exerciciCreado', 'Ejercicio creado correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $exercici = Exercici::findOrFail($id);
        // me habia olvidado de categoria aqui y petaba todo el rato AAAA
        $categorias = Categoria::all();
        return view('exercici.edit', compact('exercici', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $exercici = Exercici::findOrFail($id);

        // usamos las mismas reglas de antes:
        $validarDatosFormulario = $request->validate(
            [
                'nom' => 'required|min:3|max:100',
                'descripcio' => 'nullable|min:10',
                'categoria_id' => 'required|numeric',
                'imatge' => 'nullable|image|max:2048'
            ],
            [],
            [
                // si quiero cambier el nombre de los atributos
                'nom' => 'Nombre del ejercicio',
                'descripcio' => 'Descripcion del ejercicio',
                'categoria_id' => 'Categoria del ejercicio',
                'imatge' => 'Imagen del ejercicio'
            ]
        );

        // aqui me faltaba actualizar y borrar imagenes antiguas(mirar categoria controller)
        // si sube nueva imagen → borrar la antigua
        if ($request->hasFile('imatge')) {
            // borrar la imagen antigua si existe
            if ($exercici->imatge) {
                Storage::delete($exercici->imatge);
            }
            // subir el nuevo imagen
            $validarDatosFormulario['imatge'] = Storage::put('exercicis', $request->imatge);
        }

        // actualizar 
        $exercici->update($validarDatosFormulario);

        //redirigir
        // redirect('/modificar/estudiante/' . $id)
        return redirect()->route('ejercicios.edit', $id)->with('exerciciModifcado', 'Ejercicio modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $exercici = Exercici::findOrFail($id);
        // borro el imagen del storage y asi no se ocumulan imagenes
        if ($exercici->imatge) {
            Storage::delete($exercici->imatge);
        }
        $exercici->delete();
        return redirect()->route('ejercicios.index')->with('exerciciBorrado', 'Ejercicio borrado completamente!');
    }
}
