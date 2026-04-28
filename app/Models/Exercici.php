<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Exercici extends Model
{

    // principalmente entrare dades con el faker
    Use HasFactory;

    
    // taulas que se van a omplir massivaamente
    // aqui me faltaba el id de la categoria tambien 😵‍💫
    protected $fillable = ['categoria_id', 'nom', 'descripcio', 'imatge'];

    // Funcion para acceder a la informacion de la categoria 1 a n
    public function categoria()
    {
        // un cliente solo tiene un perfil de usuario
        // relacion 1 a 1 -> user 1 a client 1
        return $this->belongsTo(Categoria::class);
    }

    // relacion many a many entre modulos n y ejercicios n
    public function rutinas()
    {
        return $this->belongsToMany(Rutina::class)->withPivot('series', 'repeticions');
    }
}
