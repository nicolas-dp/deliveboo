<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Dish;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Order::class, 2222)
            ->make()
            ->each(function ($order) {
                // $order->slug = Str::slug($order->customer_name) . '-' . rand(1, 1000000);
                $order->slug = Str::slug($order['restaurant_id'], '-') . '-' . Str::slug($order['order_date'], '-') . '-' . rand(0, 1000000);
                $order->save();

                $dishes = Dish::inRandomOrder()->limit(rand(1, 10))->get();
                $order->dishes()->attach($dishes);
            });
    }
}
