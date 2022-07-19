<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $restaurants = Restaurant::with(['categories', 'dishes'])->paginate(10);

        return $restaurants;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $restaurant = Restaurant::with(['categories', 'dishes'])->where('slug', $slug)->first();

        if($restaurant) {
            return $restaurant;
        } else {
            return response()->json([
                'status_code' => 404,
                'status_text' => 'single restaurant not found'
            ]);
        }
    }

}
