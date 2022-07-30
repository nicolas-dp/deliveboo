<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Restaurant;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {
    return [
        /* 'user_id' => $faker->unique()->numberBetween(1, App\Models\User::count()),
        //'name' => $faker->sentence(2),
        'description' => $faker->text(500),
        'address' => $faker->streetAddress,
        'delivery_cost' => rand(1,10),
        'opening_hours' => '08:00:00',
        'closing_hours' => '23:00:00',
        'phone_number' => $faker->phoneNumber,
        //'cover_image' => $faker->imageUrl(600, 300, 'Restaurant', true, '$restaurant->slug', false),
        'PIVA' => substr($faker ->unique() ->iban('IT'), 0, 11) */
    ];
});
