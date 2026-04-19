<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\RutinaController;
use App\Http\Controllers\ExerciciController;

// aqui hare la pagina inicial de mi gimnasio - antes del login
// intentare poner una pequeña introducion de mi aplicacion para el cliente
Route::get('/', function () {
    return view('welcome');
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

Route::middleware(['auth', 'asegurarAdmin'])->group(function () {
    Route::get('/admin', function () {
        return "Hola Admin!";
    });
});


require __DIR__.'/auth.php';
