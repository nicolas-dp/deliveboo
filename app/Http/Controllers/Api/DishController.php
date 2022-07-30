<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Dish::all();
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
        $dish = Dish::where('slug', $slug)->first();

        if($dish) {
            return $dish;
        } else {
            return response()->json([
                'status_code' => 404,
                'status_text' => 'single dish not found'
            ]);
        }
    }

    

}
