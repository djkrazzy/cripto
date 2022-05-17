<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name' => 'Oscar Lopez',
                'telefono' => '22107171',
                'email' => 'infovideogala@gmail.com',
                'password' => bcrypt('academia0312'), 
            ]
        );
        User::factory(99)->create();
    }
}
