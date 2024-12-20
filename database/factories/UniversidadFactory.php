<?php

namespace Database\Factories;

use App\Models\Universidad;
use Illuminate\Database\Eloquent\Factories\Factory;

class UniversidadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Universidad::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'nombreUniversidad' => $this->faker->name(),
            'direccionUniversidad' => $this->faker->paragraph(),
        ];
    }
}
