<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    public function run()
    {
        // Crear los roles
        $admin = Role::create(['name' => 'admin']);
        $ventas = Role::create(['name' => 'ventas']);
        $cliente = Role::create(['name' => 'cliente']);

        // Crear permisos (podrías definir permisos específicos aquí)
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage records']);
        Permission::create(['name' => 'manage products']);
        Permission::create(['name' => 'view landing page']);

        // Asignar permisos a los roles
        $admin->givePermissionTo(['manage users', 'manage records', 'manage products']);
        $ventas->givePermissionTo(['manage sales', 'manage products']);
        $cliente->givePermissionTo('view landing page');
    }
}
