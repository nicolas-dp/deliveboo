<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'restaurant_id' => $faker->numberBetween(1, App\Models\Restaurant::count()),
        'customer_name' => $faker->name(),
        'customer_address' => $faker->streetAddress,
        'customer_email' => $faker->safeEmail,
        'customer_phone' => $faker->phoneNumber,
        //'order_date' => $faker->date('Y-m-d', 'now'),
        //'order_date' => rand(2017, 2022) . '-' . rand(1, 12) . '-' . rand(1, 28),
        'total_price' => rand(5, 700),
        'notes' =>$faker->text(500),  
    ];
});
