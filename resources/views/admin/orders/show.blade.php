@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <img class="img_opacity" src="https://img.freepik.com/premium-vector/food-doodle-set_160308-239.jpg?w=2000" alt="">
    <div class="container py-5">
        <div class="card mt-5 bg_black_trasparent my_shadow p-4">
            <div class="card-top">
                <h3 class="text-white"><strong class="my_yellow">Ordine di: </strong> {{ $order->customer_name }}</h3>
            </div>
            <div class="card-body">
                <div class="text-white"><strong class="my_yellow">Indirizzo: </strong> {{ $order->customer_address }}</div>
                <div class="text-white"><strong class="my_yellow">Email: </strong>{{ $order->customer_email }}</div>
                <div class="text-white"><strong class="my_yellow">Telefono: </strong>{{ $order->customer_phone }}</div>
                <div class="text-white"><strong class="my_yellow">Data ordine: </strong>{{ $order->order_date }}</div>
                <div class="text-white"><strong class="my_yellow">Note: </strong>{{ $order->notes }}</div>
                <h4 class="text-white mt-3"><strong class="my_yellow">Prezzo: </strong>{{ $order->total_price }}€</h4>
            </div>
        </div>

    </div>
</div>

@endsection