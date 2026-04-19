<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // guardar los datos que tenemos en la variable
        $categorias = [
            // cata array guarda daros en la columna 'nom' i 'descripcio' de la taula/modelo Categoria
        ['nom' => 'Braços', 'descripcio' => 'xercicis per treballar músculs dels braços i espatlla'],
        ['nom' => 'Cames', 'descripcio' => 'Exercicis tren inferior'],
        ['nom' => 'Pit', 'descripcio' => 'Exercicis de pit'],
        ['nom' => 'Esquena', 'descripcio' => 'Exercicis d\'esquena'],
        ['nom' => 'Core', 'descripcio' => 'Abdomen i zona lumbar'],
        ];

        // recorrimos el array categorias y llamamos al Modelo Categoria 
        // que nos encargara a guardar todos los elementos del array en base de datos
        
        foreach($categorias as $categoria){
            // llamar al modelo categria -> use App\..
            Categoria::create($categoria);
        }
    }
}
