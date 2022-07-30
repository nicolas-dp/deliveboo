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
Route::get('restaurants', 'Api\RestaurantController@index');


//api ristorante -> ti restituisce il singolo ristorante
Route::get('restaurants/{restaurant:slug}', 'Api\RestaurantController@show');

//filtra ristoranti per categoria
Route::get('restaurants/filter/{id}', 'Api\RestaurantController@filter');
//api categorie -> ti restituisce le categorie

Route::get('restaurants/filterplus/{id1}/{id2?}/{id3?}', 'Api\RestaurantController@filterPlus');
Route::get('categories', 'Api\CategoryController@index');

//api piatti
Route::get('dishes', 'Api\DishController@index');

//api piatto singolo -> ti restituisce il singolo piatto 
Route::get('dishes/{dish:slug}', 'Api\DishController@show');


//Pagamento
Route::get('generate', 'Api\PaymentController@generate');
Route::post('make/payment', 'Api\PaymentController@makePayment');
//Statistiche
Route::get('orders/statistics/{id}', 'Api\OrderController@statistics');
