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
            'photo_dpi_front'=> 'dpi/'.$this->faker->image('public/storage/dpi',640,480,null,false),
            'photo_dpi_back'=> 'dpi/'.$this->faker->image('public/storage/dpi',640,480,null,false),
            'photo_selfie'=> 'dpi/'.$this->faker->image('public/storage/dpi',640,480,null,false),
            'name_emergency' => $this->faker->name(),
            'tel_emergency' => $this->faker->phoneNumber,
            'status' => $this->faker->randomElement(['pendiente','aprobado']),
            'user_id' => User::all()->random()->id,
        ];
    }
}
