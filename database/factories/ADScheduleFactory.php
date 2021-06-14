<?php

namespace Database\Factories;

use App\Models\ADSchedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class ADScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ADSchedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'created_date' => $this->faker->text('50'),
          'ad_ID' => $this->faker->text('50'),
          'ad_name' => $this->faker->text('50'),
          'ad_caption' => $this->faker->text('50'),
          'client_no' => $this->faker->unique('5clear')->randomNumber,
          'description' => $this->faker->text('50'),
          'visual_identity' => $this->faker->unique('5clear')->randomNumber,
          'start_date' => $this->faker->text('50'),
          'end_date' => $this->faker->text('50'),
          'page' => $this->faker->text('50'),
          'seconds' => 22.2,
          'rate' => 12.2,
          'number_of_week' => $this->faker->unique('5clear')->randomNumber,
          'slot' => $this->faker->unique('5clear')->randomNumber,
          'cost' => 10.2,
          'discount' => 122.2,
          'tax' => 1222.2,
          'total' => 2222.2,

        ];
    }
}
