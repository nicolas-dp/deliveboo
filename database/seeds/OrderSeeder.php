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

                $year = rand(2017, date('Y'));

                if ($year == date('Y')) {
                    $month = rand(1, date('m'));
                } else {
                    $month = rand(1, 12);
                };

                if ($year == date('Y') && $month == date('m')) {
                    $day = rand(1, date('d'));
                } else {
                    if ($month == 2) {
                        $day = rand(1, 28);
                    } elseif ($month == 4 || $month == 6 || $month == 9 || $month == 11){
                        $day = rand(1, 30);
                    } else {
                        $day = rand(1, 31);
                    }
                }

                $order->order_date = $year . '-' . $month . '-' . $day;

                $order->slug = Str::slug($order['restaurant_id'], '-') . '-' . Str::slug($order['order_date'], '-') . '-' . rand(0, 1000000);
                $order->save();

                $dishes = Dish::inRandomOrder()->limit(rand(1, 10))->get();
                $order->dishes()->attach($dishes);
            });
    }
}
