<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisos = [
            //roles
            'ver-rol', 
            'crear-rol', 
            'editar-rol', 
            'borrar-rol',
            //blogs
            'ver-blog', 
            'crear-blog', 
            'editar-blog', 
            'borrar-blog',
        ];

        foreach($permisos as $permiso)
        {
            Permission::create(['name' =>$permiso]);
        }
    }
}
