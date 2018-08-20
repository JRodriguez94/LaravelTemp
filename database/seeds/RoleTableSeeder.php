<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('role_user')->truncate();
        DB::table('roles')->truncate();
        Schema::enableForeignKeyConstraints();

        /* CREATE NEW ROLE'S */

        $admin = new App\Role();
        $admin->name         = 'admin';
        $admin->display_name = 'Administrador'; // optional
        $admin->description  = 'Usuario con todos los permisos'; // optional
        $admin->save();

        $user = App\User::find(1);
        $user->attachRole($admin);
    }
}
