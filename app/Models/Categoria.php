<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    // taulas que se van a omplir massivaamente
    protected $fillable = ['nom', 'descripcio'];

    // Funcion para acceder a la informacion de todos los ejercicios

    public function exercicis()
    {
        // relacion 1 a n -> categoria 1 a exercicis n
        return $this->hasMany(Exercici::class);
    }
}
