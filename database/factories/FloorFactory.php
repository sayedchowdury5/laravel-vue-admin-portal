<?php

namespace Database\Factories;

use App\Models\Floor;
use Illuminate\Database\Eloquent\Factories\Factory;

class FloorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Floor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'floor_name' => $this->faker->text('50'),
            'floor_category' => $this->faker->text('50'),
            'activation' => $this->faker->unique('5clear')->randomNumber,
        ];
    }
}
