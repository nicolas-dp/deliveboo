<?php

namespace App\Http\Controllers\Admin;

use App\Models\Restaurant;
use App\Models\User;
use App\Models\Category;
use App\Models\Dish;
use App\Http\Requests\RestaurantRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;

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

        $restaurant = Restaurant::where('user_id', '=', Auth::id())->get()->first();
        $categories = Category::all();
        if ($restaurant) {
            $restaurant = Restaurant::where('user_id', '=', Auth::id())->get()->first();
            return view('admin.restaurants.index', compact('restaurant', 'categories'));
        } else {
            return redirect()->route('admin.restaurants.create');
        }

        //dd($restaurant);

        // return view('admin.restaurants.index', compact('restaurant', 'categories'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $dishes = Dish::all();

        return view('admin.restaurants.create', compact('categories', 'dishes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantRequest $request)
    {
        // dd($request->all());

        // validazione dati
        $val_data = $request->validated();

        // genera slug
        $slug = Str::slug($request->name) . '-' . rand(1, 1000000);
        $val_data['slug'] = $slug;

        // assegna il ristorante all'utente registrato
        $val_data['user_id'] = Auth::id();

        if ($request->hasFile('cover_image')) {
            // validare il file
            $request->validate([
                'cover_image' => 'nullable|image|max:300'
            ]);
            // salvo il file nel filesystem
            // recupero il percorso
            //ddd($request->all());
            $path = Storage::put('restaurant_images', $request->cover_image);
            // passo il percorso all'array di dati validati per salvare la risorsa
            $val_data['cover_image'] = $path;
        }



        // $new_restaurant = Restaurant::create($val_data->except(['category_id']));
        // $new_restaurant->categories()->attach($request->get('category_id', []));
        $new_restaurant = Restaurant::create($val_data);
        $new_restaurant->categories()->attach($request->category_id);

        // dd($val_data);
        return redirect()->route('admin.restaurants.index')->with('message', 'Ristorante creato con successo!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $categories = Category::all();
        return view('admin.restaurants.edit', compact('restaurant', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(RestaurantRequest $request, Restaurant $restaurant)
    {
        // dd($request->all());

        // validazione dati
        $val_data = $request->validated();

        // genera slug
        $slug = Str::slug($request->name) . '-' . rand(1, 1000000);
        $val_data['slug'] = $slug;

        // assegna il ristorante all'utente registrato
        $val_data['user_id'] = Auth::id();

        if ($request->hasFile('cover_image')) {
            // validare il file
            $request->validate([
                'cover_image' => 'nullable|image|max:300'
            ]);
            // salvo il file nel filesystem
            // recupero il percorso
            //ddd($request->all());
            $path = Storage::put('restaurant_images', $request->cover_image);
            // passo il percorso all'array di dati validati per salvare la risorsa
            $val_data['cover_image'] = $path;
        }



        // $new_restaurant = Restaurant::create($val_data->except(['category_id']));
        // $new_restaurant->categories()->attach($request->get('category_id', []));
        $restaurant->update($val_data);
        $restaurant->categories()->sync($request->category_id);

        // dd($val_data);
        return redirect()->route('admin.restaurants.index')->with('message', 'Ristorante creato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
