<?php

namespace Database\Factories;

use App\Models\Mall;
use Illuminate\Database\Eloquent\Factories\Factory;

class MallFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mall::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mall_name' => $this->faker->text('50'),
            'contact_person' => $this->faker->text('50'),
            'contact_number' => $this->faker->unique('5clear')->randomNumber,
            'email_address' => $this->faker->text('50'),
            'address' => $this->faker->text('50'),
            'zip_code' => $this->faker->unique('5clear')->randomNumber,
            'country' => $this->faker->text('50'),
            'city' => $this->faker->text('50'),
            'activation' => $this->faker->unique('5clear')->randomNumber,
        ];
    }
}
