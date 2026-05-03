<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Exercici;
use App\Models\Rutina;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // este controlador lo hago para dejar el web.php limpio
    // y usare la logica aqui para pasar variables al dashboard sin tener que hacerlo en web.php
    // solo necesito el index aqui nomes
    public function index()
    {
        $categorias = Categoria::all();
        $rutinas = Rutina::all();
        // $exercicis = Exercici::all();
        $exercicis = Exercici::paginate(6);
        /* voy a pasar esta variable extra para sacar el count entero de los ejercicios
        para que aparezca como contador de exercicis tipo badge, se puede ver en el /dashboard
        porque la variable exercici solo muestra 6 al hacer el count */
        $exercicisTotals = Exercici::all();
        return view('dashboard', compact('categorias', 'rutinas', 'exercicis', 'exercicisTotals'));
    }
}
