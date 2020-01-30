<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    $now = now();
    return [
        'username' => $faker->unique()->slug,
        'real_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8',
        'group_id' => 4,
        'registered' => $now,
        'registration_ip' => $faker->ipv4,
        'last_visit' => $now,
        'activate_string' => Str::random(10),
    ];
});
