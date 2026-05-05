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
    // el admin solamente podra ver las rutinas de un cliente
    // Route::resource('rutinas', RutinaController::class)->only(['index']);
    // despues de muchas peleas(el ultimo bug (creo)) admin no podia accedir al index, o si puede
    // el cliente no podra accedir al index de rutina, una de las dos
    // entonces hare un url separado del index rutinas admin asi no habra conflictos
    Route::get('/admin/rutinas', [RutinaController::class, 'index'])->name('adminRutinas.index');
    Route::resource('ejercicios', ExerciciController::class);
});

// he creado un middleware de cliente donde verifico que el cliente no sea admin
// asi quito el derecho al admin a modificar o tocar rutinas de clientes
Route::middleware(['auth', 'soloCliente'])->group(function () {
    Route::resource('rutinas', RutinaController::class);
    // rutas del pivot
    // añadir eejercicio to rutina (attach)
    Route::post('/rutinas/{rutina}/añadir', [RutinaController::class, 'pivotSeriesRepes'])->name('rutinas.addExercici');

    // DELETE exercise from rutina (detach)
    Route::delete('/rutinas/{rutina}/{exercici}/borrar', [RutinaController::class, 'borrarPivot'])->name('rutinas.borrarPivot');

    // actualizar pivot (series + repeticions)
    Route::put('/rutinas/{rutina}/{exercici}/actualizar', [RutinaController::class, 'updatePivot'])->name('rutinas.updatePivot');
});

Route::middleware(['auth'])->group(function () {
    // Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.principal');
    // Route::get('/ejercicios', [ExerciciController::class, 'index'])->name('exercicis.principal');
    // Route::get('/rutinas', [RutinaController::class, 'index'])->name('rutinas.principal');

    // el cliente nomes podra ver el index de los ejercicios (el llistado)
    Route::resource('ejercicios', ExerciciController::class)->only(['index']);
    // fix cliente solo puede ver el index y no puede modificar nada, asi:
    // Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
    // o mas simple:
    Route::resource('categorias', CategoriaController::class)->only(['index']);
});
require __DIR__ . '/auth.php';

// test categoria index
