<?php

namespace Database\Factories;

use App\Models\Merchant;
use Illuminate\Database\Eloquent\Factories\Factory;

class MerchantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Merchant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'merchant_name' => $this->faker->text('50'),
            'ssm_no' => $this->faker->unique('5clear')->randomNumber,
            'primary_contact_no' => $this->faker->unique('5clear')->randomNumber,
            'secondary_contact_no' => $this->faker->unique('5clear')->randomNumber,
            'email' => $this->faker->text('50'),
            'address' => $this->faker->text('50'),
            'zip_code' => $this->faker->unique('5clear')->randomNumber,
            'city' => $this->faker->text('50'),
            'state' => $this->faker->text('50'),
            'country' => $this->faker->text('50'),
            'bank_name' => $this->faker->text('50'),
            'bank_acc_no' => $this->faker->text('50'),
            'activation' => $this->faker->unique('5clear')->randomNumber,
        ];
    }
}
