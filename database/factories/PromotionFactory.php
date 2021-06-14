<?php

namespace Database\Factories;

use App\Models\Promotion;
use Illuminate\Database\Eloquent\Factories\Factory;

class PromotionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Promotion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'promotion_title' => $this->faker->text('50'),
          'description' => $this->faker->text('50'),
          'start_date' => "$this->faker->text('50')",
          'end_date' => $this->faker->text('50'),
          'url' => $this->faker->text('50'),
          'merchant' => $this->faker->unique('5clear')->randomNumber,
          'shop' => $this->faker->unique('5clear')->randomNumber,
          'mall' => $this->faker->unique('5clear')->randomNumber,        
          'brand' => $this->faker->unique('5clear')->randomNumber,
          'sub_brand' => $this->faker->unique('5clear')->randomNumber,
          'promotion_by' => $this->faker->unique('5clear')->randomNumber,
        ];
    }
}
