<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use App\Models\Dish;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{

    /*    public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $restaurant = Restaurant::with(['categories', 'dishes'])->first();
        //$restaurant = Restaurant::where('user_id', '=', Auth::id())->get()->first();
           
        $user = User::where('id', '=', $restaurant['user_id'])->get()->first();
        //dd($restaurant, $user);
        return view('mail.orders.admin_mail', compact('user'));
    }


    
}
