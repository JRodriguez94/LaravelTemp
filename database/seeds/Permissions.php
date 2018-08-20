<?php

use Illuminate\Database\Seeder;

class Permissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('permissions')->truncate();
        Schema::enableForeignKeyConstraints();

           DB::table('permissions')->insert([

               //Permisos de permisos
               [
                   'name' => 'lista_permisos',
                   'display_name' => 'Lista de permisos',
                   'description' => 'Consulta de todos los permisos en el sistema',
                   'created_at' => date('Y-m-d H:i:s'),
               ],

               //Permisos de roles
               [
                   'name' => 'lista_roles',
                   'display_name' => 'Lista de roles',
                   'description' => 'Consulta de todos los roles en el sistema',
                   'created_at' => date('Y-m-d H:i:s'),
               ],
               [
                   'name' => 'crear_rol',
                   'display_name' => 'Crear rol',
                   'description' => 'Creación de nuevos roles',
                   'created_at' => date('Y-m-d H:i:s'),
               ],
               [
                   'name' => 'editar_rol',
                   'display_name' => 'Editar rol',
                   'description' => 'Edición de los roles registrados en el sistema',
                   'created_at' => date('Y-m-d H:i:s'),
               ],
               [
                   'name' => 'eliminar_rol',
                   'display_name' => 'Eliminar rol',
                   'description' => 'Eliminación de los roles registrados en el sistema',
                   'created_at' => date('Y-m-d H:i:s'),
               ],
               //Permisos de usuarios
               [
                   'name' => 'lista_usuarios',
                   'display_name' => 'Lista de usuarios',
                   'description' => 'Consulta de todos los usuarios en el sistema',
                   'created_at' => date('Y-m-d H:i:s'),
               ],
               [
                   'name' => 'crear_usuarios',
                   'display_name' => 'Crear usuario',
                   'description' => 'Creación de nuevos usuarios',
                   'created_at' => date('Y-m-d H:i:s'),
               ],
               [
                   'name' => 'editar_usuarios',
                   'display_name' => 'Editar usuario',
                   'description' => 'Edición de los usuarios registrados en el sistema',
                   'created_at' => date('Y-m-d H:i:s'),
               ],
               [
                   'name' => 'eliminar_usuarios',
                   'display_name' => 'Eliminar usuario',
                   'description' => 'Eliminación de los usuarios registrados en el sistema',
                   'created_at' => date('Y-m-d H:i:s'),
               ],

           ]);
    }
}
