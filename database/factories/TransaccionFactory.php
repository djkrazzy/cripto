<?php

namespace Database\Factories;

use App\Models\Cuenta;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaccion>
 */
class TransaccionFactory extends Factory
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
            
            'user_id' => User::all()->random()->id,
            'cuenta_id' => Cuenta::all()->random()->id,
            'operacion' => $this->faker->randomElement(['deposito','retiro']),
            'tipo' => $this->faker->randomElement(['deposito','bitcoin']),
            'status' => $this->faker->randomElement(['pendiente','aprobado','cancelado']),
            'monto' => number_format( $monto, 2),
            'numero' => $this->faker->ean13(),
            'boleta' => $this->faker->randomNumber(8),
        ];
    }
}
