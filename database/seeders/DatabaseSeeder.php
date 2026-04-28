<?php

namespace Database\Seeders;

use App\Models\Exercici;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Exercici::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);


        // llamamos al seeders creados (Admin y Categoria)
        /* dos maneras bueno 3 la primera no apta para lo que se nos pedio
        1. seria implementar admin y categorias aqui (private function seedAdmin(){
        lo que tengo en adminSeeder.php lo pondre aqui }) y lo mismo por categoria function.. 
        sepues llamar al self seed-> self::seedAdmi();
        2. seria usar el metodo $this->call: 
        y despued desde el termian db:seed
        */
        $this->call([
            AdminSeeder::class, CategoriaSeeder::class
        ]);
        /* la tercera es la que he hecho y es simple,
        usando el comandero(Laravelx13 oficial doc) podras llamar a cada seeder class 
        que tu escoges: php artisan db:seed --class=AdminSeeder
        al correr este comandero no me hicia falta las 2 opciones de arriba
        llamaba el seeder de categoria i de admin
        esta bien si no tienes muchos seeders, sino no sera buena opcion la tercera!
        */

    }
}
