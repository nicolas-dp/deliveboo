<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chart;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $restaurant = Restaurant::where('user_id', '=', Auth::id())->get()->first();

        // $orders = Order::select('order_date')->where('restaurant_id', '=', $restaurant->id)->get()->groupBy('id');


        // // Prendiamo solo gli ordini del ristorante loggato
        // $orders = Order::where('restaurant_id', '=', $restaurant->id)->get();

        // // Trasfmoriamo i dati in un array di array di date
        // $orders = $orders->map(function ($order) {
        //     return [
        //         'date' => $order->order_date,
        //         'value' => $order->total_price,
        //     ];
        // });

        // dd($orders);

        // ottengo un array di oggetti contenente gli ID di tutti gli ordini effettuati al ristoratore connesso
          $orders = DB::table('orders')
            ->select('orders.order_date', 'orders.total_price')
            ->join('restaurants', 'restaurants.id', '=', 'orders.restaurant_id')
            ->where('restaurants.user_id', '=', Auth::id())
            ->get();
            
            // dd($orders);


        // trasformo questo array di oggetti in array normale
        $orders = $orders->map(function ($order) {
            return [
                'date' => $order->order_date,
                'value' => $order->total_price,
            ];
        });
      
        $json = json_encode($orders);
     
        return view('admin.charts.index')->with('orders', json_encode($orders, JSON_UNESCAPED_UNICODE));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function show(Chart $chart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function edit(Chart $chart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chart $chart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chart $chart)
    {
        //
    }
}
