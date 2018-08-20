<?php

use Illuminate\Database\Seeder;

class RolePermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         Schema::disableForeignKeyConstraints();
         DB::table('permission_role')->truncate();
         Schema::enableForeignKeyConstraints();

         $adminRole = \App\Role::where('name', 'admin')->first();
         $adminRole->attachPermissions(\App\Permission::get());
    }
}
