<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Brand::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category' => $this->faker->unique('5clear')->randomNumber,
            'product' => $this->faker->unique('5clear')->randomNumber,
            'brand' => $this->faker->text('50'),
            'merchant' => $this->faker->unique('5clear')->randomNumber,
            'shop' => $this->faker->unique('5clear')->randomNumber,
            'activation' => $this->faker->unique('5clear')->randomNumber,
        ];
    }
}
