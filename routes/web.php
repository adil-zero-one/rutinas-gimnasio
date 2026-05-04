<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RutinaController;
use App\Http\Controllers\ExerciciController;
use App\Models\Exercici;
use Illuminate\Support\Facades\Auth;

// aqui hare la pagina inicial de mi gimnasio - antes del login
// intentare poner una pequeña introducion de mi aplicacion para el cliente
Route::get('/', function () {
    /* voy a añadir las imagenes de exercicis de momento en el landing page
    principal que tengo para hacer pruebas, de momento cogo los datos de exercici
    despues a lo mejor usare categorias tambien
    */
    $exercicis = Exercici::all();

    /* arreglo, cuando el usuario registrado clicka en el logo
    lo redirige al landing page que tenia login y cosas que el usuario
    no quiero que vea, entonces si esta logeado lo voy a redirigir al dashboard
    */
    if (Auth::check()) {
        // all retornar la vista asi me daba error, porque pasaba variables desde el controlador
        // y aqui directamente redirigir de la vista daba error y laravel no conocia estos variables
        // return view('dashboard');
        // lo pasare al controlador
        return redirect()->route('dashboard');
    }
    return view('welcome', compact('exercicis'));
});

// lo que devolvere cuando un usuario esta logeado
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['asegurarAdmin'])->group(function () {
    Route::get('/admin', function () {
        return "Hola Admin!";
    });
    // vaig a provar com funciona el resource, crud entero del controllador
    // en vez de difinir cada ruta aqui index, create, destroy..
    // laravel lo hace automaticamente
    Route::resource('categorias', CategoriaController::class);
});

Route::middleware(['auth'])->group(function () {
    // Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.principal');
    // Route::get('/ejercicios', [ExerciciController::class, 'index'])->name('exercicis.principal');
    // Route::get('/rutinas', [RutinaController::class, 'index'])->name('rutinas.principal');
    Route::resource('ejercicios', ExerciciController::class);
    // fix cliente solo puede ver el index y no puede modificar nada, asi:
    // Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
    // o mas simple:
    Route::resource('categorias', CategoriaController::class)->only(['index']);
    Route::resource('rutinas', RutinaController::class);
});
require __DIR__ . '/auth.php';

// test categoria index
