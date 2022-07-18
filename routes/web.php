<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();


Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function (){
    // admin dashboard
    Route::get('/', 'HomeController@index')->name('home');

    // admin Restaurants
    Route::resource('restaurants', 'RestaurantController')->parameters([
        'restaurants' => 'restaurant:slug'
    ]); 

    Route::resource('dishes', 'DishController')->parameters([
        'dishes' => 'dish:slug'
    ]);
});






Route::get("{any?}", function () {
    return view("guest.home");
})->where("any", ".*");