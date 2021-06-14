<?php

namespace Database\Factories;

use App\Models\Voucher;
use Illuminate\Database\Eloquent\Factories\Factory;

class VoucherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Voucher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'voucher_title' => $this->faker->text('50'),
          'mall' => $this->faker->unique('5clear')->randomNumber,
          'merchant' => $this->faker->unique('5clear')->randomNumber,
          'shop' => $this->faker->unique('5clear')->randomNumber,
          'sub_brand' => $this->faker->unique('5clear')->randomNumber,
          'voucher_code' => $this->faker->unique('5clear')->randomNumber,
          'start_date' => $this->faker->text('50'),
          'end_date' => $this->faker->text('50'),
          'min_spend' => $this->faker->unique('5clear')->randomNumber,
          'discount_amount' => $this->faker->unique('5clear')->randomNumber,
          'maximum_usage' => $this->faker->unique('5clear')->randomNumber,
          'voucher_belongs_to' => $this->faker->text('50'),
        ];
    }
}
