<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Exercici;
use App\Models\Rutina;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // este controlador lo hago para dejar el web.php limpio
    // y usare la logica aqui para pasar variables al dashboard sin tener que hacerlo en web.php
    // solo necesito el index aqui nomes
    public function index()
    {
        $categorias = Categoria::all();

        // el ultimo bug fins ahora, y vamos a dormirrrrr!!
        // me habia olvidado filtrar el dashboard tambien
        if (Auth::user()->email === 'admin@admin.cat') {
            $rutinas = Rutina::all();
        } else {
            $client  = Auth::user()->client;
            $rutinas = $client->rutinas;
        }

        $exercicis = Exercici::paginate(6);
        /* voy a pasar esta variable extra para sacar el count entero de los ejercicios
        para que aparezca como contador de exercicis tipo badge, se puede ver en el /dashboard
        porque la variable exercici solo muestra 6 al hacer el count */
        $exercicisTotals = Exercici::all();
        $clients = Client::all();

        /* como he separado las rutas del index de rutinas por conflictos del index admin contra cliente
        voy a guardar las rutas que corresponden en una variable para usarla a redirigir
        (he difinido esta variable en el dashboard view pero no era lo ideal)
        */
        $rutinasUrl = Auth::user()->email === 'admin@admin.cat' ? route('adminRutinas.index') : route('rutinas.index');
        return view('dashboard', compact('categorias', 'rutinas', 'exercicis', 'exercicisTotals', 'clients', 'rutinasUrl'));
    }
}
