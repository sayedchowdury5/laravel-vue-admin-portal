<?php

namespace Database\Factories;

use App\Models\NewShop;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewShopFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NewShop::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'shop_name' => $this->faker->text('50'),
            'merchant' => $this->faker->unique('5clear')->randomNumber,
            'brand' => $this->faker->unique('5clear')->randomNumber,
            'category' => $this->faker->unique('5clear')->randomNumber,
            'floor' => $this->faker->unique('5clear')->randomNumber,
            'mall' => $this->faker->unique('5clear')->randomNumber,
            'city' => $this->faker->text('50'),
            'selling_identity' => $this->faker->unique('5clear')->randomNumber,
            'free_shipping_min_amount' => $this->faker->unique('5clear')->randomNumber,
            'free_shipping_for_all' => $this->faker->unique('5clear')->randomNumber,
        ];
    }
}
