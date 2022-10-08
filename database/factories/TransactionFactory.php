<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaction;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\User;

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

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'total_spent' => $faker->numberBetween(10, 90),
        'total_saving' => $faker->numberBetween(10, 90),
        'user_id' => User::inRandomOrder()->first()->id,
    ];
});
