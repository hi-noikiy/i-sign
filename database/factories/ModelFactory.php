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
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'mobile' => $faker->unique()->phoneNumber,
        'password' => $password ?: $password = bcrypt('secret'),
        'sex' => random_int(0, 1),
        'company' => $faker->company,
        'position' => $faker->jobTitle,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Bus::class, function (Faker\Generator $faker) {

    static $i = 1;
    return [
        'name' => $i++.'号车',
        'description' => '',
        'seat_count' => '40'
    ];

});



