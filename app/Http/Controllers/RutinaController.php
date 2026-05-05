<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Database;
use Illuminate\Http\Request;
use App\Models\Rutina;
use App\Models\Exercici;
use App\Models\Categoria;
use App\Models\User;
use App\Models\Client;
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
        // cambiar despues para mostrar solo rutinas de clientes propios
        // admin ve todas las rutinas, cliente solo las suyas
        if (Auth::user()->email === 'admin@admin.cat') {
            $rutinas = Rutina::all();
        } else {
            $client = Auth::user()->client;
            $rutinas = $client->rutinas;
        }
        // asi para poder añadir rutinas basadas del exercicis que ya existen
        // o escogir categoria etc..
        $exercicis = Exercici::all();
        $categorias = Categoria::all();
        // variable para contar todas las rutinas que haya en basa de datos, (para aadmin)
        return view('rutinas.index', compact('rutinas', 'exercicis', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // redirigir nomas
        $exercicis = Exercici::all();
        return view('rutinas.create', compact('exercicis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // me saltaba el error de create nueva rutina del
        // ( Field 'client_id' doesn't have a default value )
        // encontre la solucion aqui:
        // https://stackoverflow.com/questions/43651446/general-error-1364-field-user-id-doesnt-have-a-default-value
        // resumen no habia validado el id del usuario, porque eran (me acabo de darme cuenta)
        // tenia un fallo grave en el controlador de rutinas
        $validator = $request->validate([
            // 'client_id' => auth()->id,
            // o asi:
            // 'client_id' => Auth::user()->id,
            'nom' => 'required',
            'resum' => 'required',
            // la pongo como integer y despues añado min string?
            // rutina -> duracio }} mins 
            // bueno recordar poner el type number o algo
            'duracio' => 'required|integer|min:1',
        ]);
        // validar el client_id y despues guardar lo que viene del formulario hacia ese cliente
        // $client = Auth::user()->client;
        $validator['client_id'] = auth()->user()->client->id;


        Rutina::create($validator);

        return redirect()->route('rutinas.index')->with('rutinaCreada', 'Rutina creada correctamente!');
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
        return redirect()->route('rutinas.edit', $id)->with('rutinaActualizada', 'Rutina actualizada correctamente');
    }

    public function pivotSeriesRepes(Request $request, string $id)
    {
        $rutina = Rutina::findOrFail($id);
        // validar series i repes
        $request->validate([
            'exercici_id' => 'required|integer',
            'series' => 'required|integer|min:1',
            'repeticions' => 'required|integer|min:1',
        ]);
        // validar el ejercicio si no existe 404
        $exercici = Exercici::findOrFail($request->exercici_id);

        // Evitar duplicados (extra)
        if ($rutina->exercicis->contains($exercici->id)) {
            return redirect()->route('rutinas.show', $id)->with('duplicadoRutina', 'Este ejercicio ya lo tienes en tus rutinas.');
        }

        // insertar en el pivot
        $rutina->exercicis()->attach($exercici->id, [
            'series'      => $request->series,
            'repeticions' => $request->repeticions,
        ]);

        // redirigo al show por si quiere modificar o hacerle mas cosas el usuario a la rutina
        return redirect()->route('rutinas.show', $id)->with('rutinaNueva', 'Se ha añadido el ejercicio correctamente!');
    }

    public function borrarPivot(string $rutinaId, string $exerciciId)
    {
        $rutina = Rutina::findOrFail($rutinaId);

        $rutina->exercicis()->detach($exerciciId);

        return redirect()->route('rutinas.show', $rutinaId)
            ->with('exerciciEliminat', 'Ejercicio eliminado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rutina = Rutina::findOrFail($id);
        //limpiar pivot antes de borrar
        $rutina->exercicis()->detach();
        $rutina->delete();
        return redirect()->route('rutinas.index')->with('rutinaBorrada', 'Rutina borrada correctamente!');
    }

    public function updatePivot(Request $request, string $rutinaId, string $exerciciId)
    {
        $rutina = Rutina::findOrFail($rutinaId);

        $request->validate([
            'series' => 'required|integer|min:1',
            'repeticions' => 'required|integer|min:1',
        ]);

        $rutina->exercicis()->updateExistingPivot($exerciciId, [
            'series' => $request->series,
            'repeticions' => $request->repeticions,
        ]);

        return redirect()->route('rutinas.show', $rutinaId)
            ->with('pivotActualizado', 'Series i repeticiones axtualizados!');
    }
}
