<?php

namespace Database\Factories;

use App\Models\SellingIdentity;
use Illuminate\Database\Eloquent\Factories\Factory;

class SellingIdentityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SellingIdentity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'selling_identity' => $this->faker->text('50'),
            'description' => $this->faker->text('50'),
            'activation' => $this->faker->unique('5clear')->randomNumber
        ];
    }
}
