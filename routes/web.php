<?php

use App\Http\Controllers\Admin\OrderController;
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


//rotte per salvare ordini ?
//Route::get('contact-form', 'OrderController@index')->name('contact-form.index');
Route::post('order-received', 'OrderController@store');



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

    Route::resource('orders', 'OrderController')->parameters([
        'orders' => 'order:slug'
    ])->except('create', 'store', 'edit', 'update');

    Route::resource('charts', 'ChartController');

    //Route::get('order-received/mail/orders/', 'MailController@index');
});
//Route::get('order-received', 'MailController@index');



Route::get("{any?}", function () {
    return view("guest.home");
})->where("any", ".*");