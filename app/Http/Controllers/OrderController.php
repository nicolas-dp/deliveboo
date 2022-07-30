<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewOrderMade;
use App\Mail\NewOrderMadeAdmin;
use Illuminate\Support\Str;


class OrderController extends Controller
{
    //qui sotto il codice per salvare nel database i dati dell'ordine 
    //quando un ordine viene effettuato
    //in più viene mandata una mail
    public function store(Request $request) {

        //dd($request);

        $validate_data = $request->validate([
            'customer_name' => 'required|max:100',
            'customer_email' => 'required|max:100',
            'customer_phone' => 'required|max:100',
            'customer_address' => 'required|max:400',
            'restaurant_id' => 'required',
            'total_price' => 'required',
            'list_dishes' => 'nullable',
            'notes' => 'nullable|max:400',
        ]);

        //dd($validate_data->restaurant_id);
        
        $validate_data['restaurant_id'] = intval($validate_data['restaurant_id']);

        $validate_data['total_price'] = intval($validate_data['total_price']);
        
        $list_dish =  $validate_data['list_dishes'];

        $validate_data['order_date'] = date("Y-m-d");
        
        $validate_data['slug'] = Str::slug($validate_data['restaurant_id'], '-') . '-' . Str::slug($validate_data['order_date'], '-') . '-' . rand(0, 100000);
        
        // dd($validate_data);

        $order = Order::create($validate_data);
        $restaurant = Restaurant::where('id', '=', $validate_data['restaurant_id'])->get()->first();
        $user = User::where('id', '=', $restaurant['user_id'])->get()->first();
        // dd($user);
        //$order->save();
        // dd($validate_data['customer_email']);
        Mail::to($validate_data['customer_email'])->send(new NewOrderMade($order, $list_dish));
        Mail::to($user['email'])->send(new NewOrderMadeAdmin($order, $list_dish));
        return view("guest.home");
    }

/*     public function store(Request $request) {
        dd($request);
    } */
}
