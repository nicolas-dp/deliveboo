@extends('layouts.admin')

@section('content')

<div class="container">
    @if(Auth::check() && $restaurant)
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Orders</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Customer Address</th>
                                        <th>Customer Email</th>
                                        <th>Customer Phone</th>
                                        <th>Restaurant name</th>
                                        <th>Order Date</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->customer_name }}</td>
                                        <td>{{ $order->customer_address }}</td>
                                        <td>{{ $order->customer_email }}</td>
                                        <td>{{ $order->customer_phone }}</td>
                                        <td>{{ $order->restaurant->name }}</td>
                                        <td>{{ $order->order_date }}</td>
                                        <td>{{ $order->total_price }}</td>


                                        <td>
                                            <a href="{{route('admin.orders.show', $order->slug )}}" class="btn btn-primary">Show</a>



                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#order">
                                                Delete
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="order" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="order" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="order">Delete current</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete this order?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                            <form action="{{ route('admin.orders.destroy', $order->slug) }}" method="POST" style="display: inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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