<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rutina;
use App\Models\Exercici;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;
class RutinaController extends Controller
{
    /**
     * Manera cutre rapida de hacer el controlador
     * despues ya ire arreglando los bugs seguro
     */
    public function index()
    {
        // si lo pongo en el middleware del cliente sera suficiente?
        $rutinas = Rutina::all();
        // asi para poder añadir rutinas basadas del exercicis que ya existen
        // o escogir categoria etc..
        $exercicis = Exercici::all();
        $categorias = Categoria::all();
        return view('rutinas.index', compact('rutinas', 'exercicis', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // redirigir nomas
        return view('rutinas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = $request->validate([
            'nom' => 'required',
            'resum' => 'required',
            // la pongo como integer y despues añado min string?
            // rutina -> duracio }} mins 
            // bueno recordar poner el type number o algo
            'duracio' => 'required'
        ]);

        Rutina::create($validator);

        return redirect()->route('rutinas.index');
    }

    /**
     * vista del detalle de la rutina
     */
    public function show(string $id)
    {
        $rutina = Rutina::findOrFail($id);
        // ejerccios disponibles a escogir
        $exercicis = Exercici::all();
        return view('rutinas.show', compact('exercicis', 'rutina'));
    }

    /**
     * GET /rutinas/{id}/edit  -> formulario editar rutina
     */
    public function edit(string $id)
    {
        // encontramos la rutina o 403
        $rutina = Rutina::findOrFail($id);
        // redirigir al formulario para modificar
        return view('rutinas.edit', compact('rutina'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // actualizar rutina
        $rutina = Rutina::findOrFail($id);

        $validator = $request->validate([
            'nom' => 'required',
            'resum' => 'required',
            'duracio' => 'required'
        ]);
        // actualizar
        $rutina->update($validator);
        return redirect()->route('rutinas.index')->with('rutinaActualizar', 'Rutina actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rutina = Rutina::findOrFail($id);
        $rutina->delete();
        return redirect()->route('rutinas.index');
    }
}
