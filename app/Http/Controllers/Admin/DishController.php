<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DishRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $restaurants = Restaurant::all('id', 'slug', 'name');
        $restaurant = Restaurant::where('user_id', '=', Auth::id())->get()->first();
        if($restaurant) {
            $dishes = Dish::where('restaurant_id', '=', $restaurant->id)->get();
            // dd($dishes);
            return view('admin.dishes.index', compact('dishes', 'restaurant'));
        } else {
            return redirect()->route('admin.restaurants.create');
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = Restaurant::where('user_id', '=', Auth::id())->get()->first();
        $restaurants_id = $restaurants->id;
        return view('admin.dishes.create', compact('restaurants_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\DishRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DishRequest $request)
    {
        // dd($request->all());
        // validazione dati 
        $val_data = $request->validated();

        // genera slug
        $slug = Str::slug($request->name) . '-' . rand(1, 1000000);
        $val_data['slug'] = $slug;

        //assegna ai piatti il restaurante a cui appartengono
        $restaurants = Restaurant::where('user_id', '=', Auth::id())->get()->first();
        $val_data['restaurant_id'] = $restaurants->id;

        if ($request->hasFile('cover_image')) {
            // validare il file
            $request->validate([
                'cover_image' => 'nullable|image|max:300'
            ]);
            // salvo il file nel filesystem
            // recupero il percorso
            //ddd($request->all());
            $path = Storage::put('dish_images', $request->cover_image);
            // passo il percorso all'array di dati validati per salvare la risorsa
            $val_data['cover_image'] = $path;
        }

        // dd($val_data);

        Dish::create($val_data);

        // dd($val_data);
        return redirect()->route('admin.dishes.index')->with('message', 'Piatto creato con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\DishRequest   $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(DishRequest $request, Dish $dish)
    {
        $val_data = $request->validated();

        // genera slug
        $slug = Str::slug($request->name) . '-' . rand(1, 1000000);
        $val_data['slug'] = $slug;

        if ($request->hasFile('cover_image')) {
            // validare il file
            $request->validate([
                'cover_image' => 'nullable|image|max:300'
            ]);
            // salvo il file nel filesystem
            // recupero il percorso
            //ddd($request->all());
            $path = Storage::put('dish_images', $request->cover_image);
            // passo il percorso all'array di dati validati per salvare la risorsa
            $val_data['cover_image'] = $path;
        }

        $dish->update($val_data);

        return redirect()->route('admin.dishes.index')->with('message', 'Piatto aggiornato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        Storage::delete($dish->cover_image);
        $dish->delete();
        return redirect()->route('admin.dishes.index')->with('message', 'Piatto eliminato con successo');
    }
}
