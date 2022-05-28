<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Referencias>
 */
class ReferenciasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           
            'name_emergency' => $this->faker->name(),
            'tel_emergency' => $this->faker->phoneNumber,
            'status' => $this->faker->randomElement(['pendiente','aprobado','enviado']),
            'user_id' => User::all()->random()->id,
        ];
    }
}
