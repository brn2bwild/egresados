<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Egresado>
 */
class EgresadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->nombre(),
            'carrera' => $this->faker->carrera(),
            'matricula' => $this->faker->matricula(),
            'generacion_id' => $this->faker->numberBetween(1,6),
            'clave' => $this->faker->clave()
        ];
    }
}
