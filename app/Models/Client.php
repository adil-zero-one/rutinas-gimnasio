<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // taulas que se van a omplir massivaamente
    // me faltaba el user_id aqui, si no no se guarda al conectar los dos
    protected $fillable = ['user_id','dni', 'data_naixement', 'telefon'];

    // un cliente solo tiene un perfil de usuario
    public function user()
    {
        // relacion 1 a 1 -> user 1 a client 1
        return $this->belongsTo(User::class);
    }

    // un cliente podra tener muchas rutinas
    public function rutinas()
    {
        // acceder a datos de la taula rutinas
        // relacion 1 a n -> client 1 a rutinas n
        return $this->hasMany(Rutina::class);
    }
}
