<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rutina extends Model
{
    // taulas que se van a omplir massivaamente
    // aqui tambien me faltaba el id del cliente
    protected $fillable = ['client_id', 'nom', 'resum', 'duracio'];

    // relacion rutinas n a client 1
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // relacion many to many, rutina n exercicis n
    public function exercicis()
    {
        return $this->belongsToMany(Exercici::class)
            ->withPivot('series', 'repeticions');
    }
}
