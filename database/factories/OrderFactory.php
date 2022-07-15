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
        'order_date' => $faker->date('Y-m-d', 'now'),
        'total_price' => rand(10, 1000),
        'notes' =>$faker->text(500),  
    ];
});
