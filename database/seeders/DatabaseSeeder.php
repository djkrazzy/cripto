<?php

namespace Database\Seeders;

use App\Models\Cuenta;
use App\Models\Transaccion;
use App\Models\Referencias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Storage::deleteDirectory('public/dpi');
         Storage::makeDirectory('public/dpi');

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        Cuenta::factory(99)->create();
        Transaccion::factory(200)->create();
        Referencias::factory(50)->create();
    }
}
