<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'image' => $this->faker->text('50'),
          'name' => $this->faker->text('50'),
          'phone_no' => $this->faker->unique('5clear')->randomNumber,
          'email' => $this->faker->text('50'),
          'password' => $this->faker->text('50'),
          'dashboard' => 1,
          'floor' => 1,
          'merchant' => 1,
          'product' => 1,
          'customer' => 0,
          'stock' => 1,
          'voucher' => 1,
          'advertisement' => 0,
          'promotion' => 1,
          'manage_admin' => 1,
          'setting' => 1,
          'mall' => 1,
          'sales' => 1,
          'transaction' => 1,
          'reports' => 1,
        ];
    }
}
