<?php

namespace Database\Seeders;

use Hash;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario = User::create([
            'name' => 'Jose Lopez',
            'email' => 'jlopez@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        //$rol = Role::create(['name' => 'Administrador']);

        // $permisos = Permission::pluck('id', 'id')->all();

        // $rol->syncPermissions($permisos);

        $usuario->assignRole('Administrador');
    }
}
