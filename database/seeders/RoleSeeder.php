<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Laravel\Jetstream\Rules\Role as RulesRole;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Superadmin']);
        $role2 = Role::create(['name' => 'Admin']);
        $role3 = Role::create(['name' => 'User']);

        ///permisos transaciones usuario
         Permission::create(['name' => 'user.usertransacciones.index'])->syncRoles([$role,$role2,$role3]);
         Permission::create(['name' => 'user.usertransacciones.create'])->syncRoles([$role,$role2,$role3]);
         Permission::create(['name' => 'user.usertransacciones.edit'])->syncRoles([$role,$role2,$role3]);
         Permission::create(['name' => 'user.usertransacciones.destroy'])->syncRoles([$role,$role2,$role3]);

         Permission::create(['name' => 'user.configuracion'])->syncRoles([$role,$role2,$role3]);
         Permission::create(['name' => 'user.confirmacion'])->syncRoles([$role,$role2,$role3]);
        ///transacciones de administrador
        

         Permission::create(['name' => 'admin.configuracion'])->syncRoles([$role,$role2]);
         Permission::create(['name' => 'ckeditor.image-upload'])->syncRoles([$role,$role2]);
         Permission::create(['name' => 'transaccion.index'])->syncRoles([$role,$role2]);
         Permission::create(['name' => 'admin'])->syncRoles([$role,$role2]);

         Permission::create(['name' => 'admin.transacciones.index'])->syncRoles([$role,$role2]);
         Permission::create(['name' => 'admin.transacciones.create'])->syncRoles([$role,$role2]);
         Permission::create(['name' => 'admin.transacciones.edit'])->syncRoles([$role,$role2]);
         Permission::create(['name' => 'admin.transacciones.destroy'])->syncRoles([$role,$role2]);

         Permission::create(['name' => 'admin.user.index'])->syncRoles([$role,$role2]);
         Permission::create(['name' => 'admin.user.create'])->syncRoles([$role,$role2]);
         Permission::create(['name' => 'admin.user.edit'])->syncRoles([$role,$role2]);
         Permission::create(['name' => 'admin.user.destroy'])->syncRoles([$role,$role2]);




    }
}
