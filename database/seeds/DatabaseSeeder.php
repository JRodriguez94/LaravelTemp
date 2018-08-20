<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(Permissions::class);
        $this->call(RoleTableSeeder::class);
        $this->call(RolePermissions::class);
    }
}
