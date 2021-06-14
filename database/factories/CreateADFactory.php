<?php

namespace Database\Factories;

use App\Models\CreateAD;
use Illuminate\Database\Eloquent\Factories\Factory;

class CreateADFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CreateAD::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ad_name' => $this->faker->text('50'),
            'selling_identity' => $this->faker->unique('5clear')->randomNumber,
            'ad_caption' => $this->faker->text('50'),
            'ad_client' => $this->faker->unique('5clear')->randomNumber,
            'merchant' => $this->faker->unique('5clear')->randomNumber,
            'client_name' => $this->faker->unique('5clear')->randomNumber,
            'ad_duration' => $this->faker->unique('5clear')->randomNumber,
            'visual_identity' => $this->faker->unique('5clear')->randomNumber,

        ];
    }
}
