<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    // taulas que se van a omplir massivaamente
    // ALERTA: 
    // voy a añadir una columna que guarda imagenes en categoria
    // para mostrarlo en el index de categoria
    // queda feo sin imagenes de la categoria, espero que no pete laravel al hacer eso

    protected $fillable = ['nom', 'descripcio', 'imagen'];

    // Funcion para acceder a la informacion de todos los ejercicios

    public function exercicis()
    {
        // relacion 1 a n -> categoria 1 a exercicis n
        return $this->hasMany(Exercici::class);
    }
}
