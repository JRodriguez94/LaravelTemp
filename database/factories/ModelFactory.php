<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'username' => $faker->name,
        'last_name' => $faker->lastName,
        'second_last_name' => $faker->lastName,
        'street' => $faker->streetName,
        'outside_number' => $faker->buildingNumber,
        'interior_number' => $faker->buildingNumber,
        'neighborhood' => $faker->citySuffix,
        'postal_code' => 45130,
        'city' => $faker->city,
        'state' => $faker->state,
        'phonenumber' => 33221100,
        'cellphone' => 44221100,
        'base_salary' => 500,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'display_name' => $faker->word,
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});

$factory->define(App\Permission::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'display_name' => $faker->word,
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});
