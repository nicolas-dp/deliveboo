<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Restaurant;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//api ristoranti -> ti restituisce tutti i ristoranti
Route::get('restaurants', 'API\RestaurantController@index');

//api ristorante -> ti restituisce il singolo ristorante
//Route::get('restaurants/{restaurant:slug}', 'API\RestaurantController@index');

//api categorie -> ti restituisce le categorie
Route::get('categories', 'API\CategoryController@index');

//api piatti
Route::get('dishes', 'API\DishController@index');