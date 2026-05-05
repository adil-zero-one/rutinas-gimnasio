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
            // en teoria se puede actualizar las imagenes y subirla desde la categoria index
            // para cuando descargais el proyecto a la primera si no es en docker lo metere aqui asi que una vez
            // se ha hecho el seeder se subin automaticamente, sino lo vais a tener que hacer manualmete
            ['nom' => 'Braços', 'descripcio' => 'xercicis per treballar músculs dels braços i espatlla', 'imagen' => 'categorias/1zZ2Bwbl3ZCKIKXuikeGHCC7RNog73o6NK8XhQlN.webp'],
            ['nom' => 'Cames', 'descripcio' => 'Exercicis tren inferior', 'imagen' => 'categorias/hRp1rmPPGohYkqxAsLQgwtAo6pEIZu9EeCw8o6AG.jpg'],
            ['nom' => 'Pit', 'descripcio' => 'Exercicis de pit', 'imagen' => 'categorias/Qf6CJHgu1KXjB5hzdlKKaQvWiT6tJWPnxTLREsGr.jpg'],
            ['nom' => 'Esquena', 'descripcio' => 'Exercicis d\'esquena', 'imagen' => 'categorias/LGd7UZFgt3hVH0UY2sgDkabrneQl9BqYe4FCSoyL.jpg'],
            ['nom' => 'Core', 'descripcio' => 'Abdomen i zona lumbar', 'imagen' => 'categorias/ZgzVnYfKvKiVHv8Ir5k1dYnzdI4YeUAQbyv5r16n.webp'],
            // una mas de regalo <3
            ['nom' => 'Ratas Fuertes', 'descripcio' => 'Categoria para ratas fuertes (gym-rat)', 'imagen' => 'categorias/c9a9c973200c1034c5e3475317259c6c.jpg']

        ];

        // recorrimos el array categorias y llamamos al Modelo Categoria 
        // que nos encargara a guardar todos los elementos del array en base de datos

        foreach ($categorias as $categoria) {
            // llamar al modelo categria -> use App\..
            Categoria::create($categoria);
        }
    }
}
