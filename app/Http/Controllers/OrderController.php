<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

use Illuminate\Support\Str;


class OrderController extends Controller
{
    //
    public function store(Request $request) {

        //dd($request);

        $validate_data = $request->validate([
            'customer_name' => 'required|max:100',
            'customer_email' => 'required|max:100',
            'customer_phone' => 'required|max:100',
            'customer_address' => 'required|max:400',
            'restaurant_id' => 'required',
            'total_price' => 'required',
            'notes' => 'nullable|max:400',
        ]);

        //dd($validate_data->restaurant_id);
        
        $validate_data['restaurant_id'] = intval($validate_data['restaurant_id']);

        $validate_data['total_price'] = intval($validate_data['total_price']);
        
        $validate_data['order_date'] = date("Y-m-d");
        
        $validate_data['slug'] = Str::slug($validate_data['restaurant_id'], '-') . '-' . Str::slug($validate_data['order_date'], '-') . '-' . rand(0, 100000);
        
        //dd($validate_data);

        $order = Order::create($validate_data);

        //$order->save();
        return view("guest.home");
    }

/*     public function store(Request $request) {
        dd($request);
    } */
}
