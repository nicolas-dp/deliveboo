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
        $restaurants = Restaurant::with(['categories', 'dishes'])->get();

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

    /* 
    la seguente api restituische i ristoranti che contengono la categoria desiderata all'url /api/restaurants/filter/{nomeCategoria}
    */
    /*  public function filter($name)
    {
        //dd($name);
        $restaurants = Restaurant::with('categories')->whereHas('categories', function ($q) use ($name) {
            $q->where('name', '=', $name);
        })->get();

        if ($restaurants) {
            return $restaurants;
        } else {
            return response()->json([
                'status_code' => 404,
                'status_text' => 'Nessun ristorante della categoria selezionata'
            ]);
        }
    } */

    public function filter($id)
    {
        //dd($id);
        $restaurants = Restaurant::with('categories')->whereHas('categories', function ($q) use ($id) {
            $q->where('id', '=', $id);
        })->get();

        if ($restaurants) {
            return $restaurants;
        } else {
            return response()->json([
                'status_code' => 404,
                'status_text' => 'Nessun ristorante della categoria selezionata'
            ]);
        }
    }

    public function filterPlus($id1, $id2 = null, $id3 = null)
    {
        //dd($id1, $id2, $id3);

        if ($id2 == null && $id3 == null) {
            $restaurants = Restaurant::with('categories')->whereHas('categories', function ($q) use ($id1) {
                $q->where('id', '=', $id1);
            })->get();

            if ($restaurants) {
                return $restaurants;
            } else {
                return response()->json([
                    'status_code' => 404,
                    'status_text' => 'Nessun ristorante della categoria selezionata'
                ]);
            }
        } elseif ($id3 == null) {
            $restaurants = Restaurant::with('categories')->whereHas('categories', function ($q) use ($id1) {
                $q->where('id', '=', $id1);
            })->whereHas('categories', function ($q) use ($id2) {
                $q->where('id', '=', $id2);
            })->get();

            if ($restaurants) {
                return $restaurants;
            } else {
                return response()->json([
                    'status_code' => 404,
                    'status_text' => 'Nessun ristorante con categorie selezionate'
                ]);
            }
        } else {
            $restaurants = Restaurant::with('categories')->whereHas('categories', function ($q) use ($id1) {
                $q->where('id', '=', $id1);
            })->whereHas('categories', function ($q) use ($id2) {
                $q->where('id', '=', $id2);
            })->whereHas('categories', function ($q) use ($id3) {
                $q->where('id', '=', $id3);
            })->get();

            if ($restaurants) {
                return $restaurants;
            } else {
                return response()->json([
                    'status_code' => 404,
                    'status_text' => 'Nessun ristorante con categorie selezionate'
                ]);
            }
        }
    }

}
