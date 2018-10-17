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
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Repaircreate::class,function(Faker\Generator $faker){
    return [
        'user_id' => $faker->numerify('#########'),
        'user_name' => $faker->name,
        'user_phone' => $faker->phoneNumber,
        'user_dormitory_id' =>$faker->numerify('西##'),
        'user_room' => $faker->numerify('###'),
        'user_message' => $faker->text,

    ];
});

$factory->define(App\Models\Administrator::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});