@extends('layouts.admin')

@section('content')

@if($orders->count() > 0)
<div class="container pt-4 pb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Ordini</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nome Cliente</th>
                                        <th class="d-none d-sm-table-cell">Indirizzo</th>
                                        <th class="d-none d-md-table-cell">Email</th>
                                        <th>Telefono</th>
                                        <th class="d-none d-md-table-cell">Data Ordine</th>
                                        <th>Prezzo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->customer_name }}</td>
                                        <td class="d-none d-sm-table-cell">{{ $order->customer_address }}</td>
                                        <td class="d-none d-md-table-cell">{{ $order->customer_email }}</td>
                                        <td>{{ $order->customer_phone }}</td>

                                        <td class="d-none d-md-table-cell">{{ $order->order_date }}</td>
                                        <td>{{ $order->total_price }} €</td>
                                        <td>
                                            <a href="{{route('admin.orders.show', $order->slug )}}" class="btn btn-primary text-light btn-sm">Dettagli</a>
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
</div>

@else
<div class="container-fluid">
    <img class="bg-admin" src="https://img.freepik.com/premium-vector/food-doodle-set_160308-239.jpg?w=2000" alt="">
    <div class="admin-wrapper">
        <div class="admin-card-order p-orders">
            <div>
                <h3>Nessun ordine presente!</h3>
            </div>
        </div>
    </div>
</div>

@endif

@endsection