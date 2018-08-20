<?php

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
        factory(App\User::class)->create([
            'name' => 'Admin',
            'lastNameFather' => 'Apellido 1',
            'lastNameMother' => 'Apellido 2',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('secret'),
            'street' => 'calle perenganita',
            'exterior_number' => 12345,
            'neighborhood' => 'Vecindario chido',
            'security_social_number' => '1234512345',
            'birthday' => '1988-08-30',
        ]);
        factory(App\User::class)->create([
            'username' => 'Ako',
            'last_name' => '...',
            'second_last_name' => '...',
            'street' => 'black street',
            'outside_number' => 12345,
            'interior_number' => 7,
            'neighborhood' => 'San Martin town',
            'postal_code' => '45620',
            'city' => 'GDL',
            'state' => 'Jal',
            'phonenumber' => '3315725626',
            'cellphone' => '3315725626',
            'email' => 'Ako@Dev.com',
            'password' => bcrypt('Ako12345'),



            'security_social_number' => '1234512345',
            'birthday' => '1988-08-30',
        ]);
    }
}
