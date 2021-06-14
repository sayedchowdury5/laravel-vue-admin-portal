<?php

namespace Database\Factories;

use App\Models\ADClient;
use Illuminate\Database\Eloquent\Factories\Factory;

class ADClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ADClient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ad_client' => $this->faker->unique('5clear')->randomNumber,
            'merchant' => $this->faker->unique('5clear')->randomNumber,
            'client_name' => $this->faker->text('50'),
            'selling_identity' => $this->faker->unique('5clear')->randomNumber,
            'reference_no' => $this->faker->text('50'),
            'contact_number' => $this->faker->unique('5clear')->randomNumber,
            'contact_person' => $this->faker->text('50'),
            'email' => $this->faker->text('50'),
        ];
    }
}
