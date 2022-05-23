<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cuenta>
 */
class CuentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $monto= $this->faker->biasedNumberBetween($min = 10, $max = 1000, $function = 'sqrt');
        return [
             'name' => $this->faker->unique()->word(10),
             'user_id' => User::all()->random()->id,
             'saldo' => 0,
        ];
    }
}
