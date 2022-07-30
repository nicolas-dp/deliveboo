<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;



class OrderController extends Controller
{
    public function statistics($id)
    {
        $orders = DB::table('orders')
            ->select('orders.order_date', 'orders.total_price')
            ->join('restaurants', 'restaurants.id', '=', 'orders.restaurant_id')
            ->where('restaurants.user_id', '=', $id)
            ->get();

        return $orders;
    }
}
