<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacante>
 */
class VacanteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(6, 5),
            'lugar'=> fake()->city().', '.fake()->country(),
            'salario' => fake()->randomFloat(2,0,2000),
            'moneda_id' => 2,
            'salario_id' => $this->faker->randomElement([1,2]),
            'empresa' => fake()->company(),
            'ultimo_dia' => fake()->dateTimeInInterval('+1 years'),
            'descripcion' => fake()->text(),
            'publicado'=>1,
            'created_at'=>'2024-01-20 02:02:33',
            'updated_at'=>'2024-01-20 02:02:33',
            'user_id'=>$this->faker->randomElement([1,3])
        ];
    }
}
