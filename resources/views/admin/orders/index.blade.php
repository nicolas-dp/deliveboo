@extends('layouts.admin')

@section('content')

<div class="container pt-4 pb-5">
    @if(Auth::check() && $restaurant)
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Orders</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th class="d-none d-sm-table-cell">Customer Address</th>
                                        <th class="d-none d-md-table-cell">Customer Email</th>
                                        <th>Customer Phone</th>
                                        <th class="d-none d-md-table-cell">Restaurant name</th>
                                        <th class="d-none d-md-table-cell">Order Date</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->customer_name }}</td>
                                        <td class="d-none d-sm-table-cell">{{ $order->customer_address }}</td>
                                        <td class="d-none d-md-table-cell">{{ $order->customer_email }}</td>
                                        <td>{{ $order->customer_phone }}</td>
                                        <td class="d-none d-md-table-cell">{{ $order->restaurant->name }}</td>
                                        <td class="d-none d-md-table-cell">{{ $order->order_date }}</td>
                                        <td>{{ $order->total_price }} €</td>
                                        <td>
                                            <a href="{{route('admin.orders.show', $order->slug )}}" class="btn btn-primary text-light">Show</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <h1>Welcome vatti a fare un ristorante</h1>
    <a href="{{route('admin.restaurants.create')}}">Create New Restaurant</a>
    @endif
</div>

@endsection