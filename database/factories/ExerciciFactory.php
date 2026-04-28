<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Exercici;

/**
 * @extends Factory<Exercici>
 */
class ExerciciFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Exercici::class;

    public function definition(): array
    {
        return [
            // voy a usar dades aleatories del factory
            // faker para probar como se ve cada cosa y hacer tests
            // de codigo
                // protected $fillable = ['nom', 'descripcio', 'imatge'];

            'nom' => $this->faker->name(),
            // text y imageUrl son segerencies del faker, mirare si funcionan
            'descripcio'=> $this->faker->text($maxNbChars = 100),
            'imatge'=>$this->faker->imageUrl()
        ];
    }
}
