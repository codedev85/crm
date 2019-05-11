<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => "Admin",
        'email' => "admin@admin.com",
        'role_id' => $faker->number(1),
        'company_id' => $faker->number(1),
        'password' => '$2y$10$VTohEtTA0OL7cw21o.OB6.MSm1yDQE.bWeO6tBIV0Fkb2shofm3Wq', // password
        'remember_token' => str_random(10),
    ];
});