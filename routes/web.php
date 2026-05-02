<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\RutinaController;
use App\Http\Controllers\ExerciciController;
use App\Models\Exercici;

// aqui hare la pagina inicial de mi gimnasio - antes del login
// intentare poner una pequeña introducion de mi aplicacion para el cliente
Route::get('/', function () {
    /* voy a añadir las imagenes de exercicis de momento en el landing page
    principal que tengo para hacer pruebas, de momento cogo los datos de exercici
    despues a lo mejor usare categorias tambien
    */
    $exercicis = Exercici::all();
    return view('welcome', compact('exercicis'));
});

// lo que devolvere cuando un usuario esta logeado
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['asegurarAdmin'])->group(function () {
    Route::get('/admin', function () {
        return "Hola Admin!";
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.principal');
    Route::get('/ejercicios', [ExerciciController::class, 'index'])->name('exercicis.principal');
});
require __DIR__ . '/auth.php';

// test categoria index
