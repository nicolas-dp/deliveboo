@extends('layouts.admin')

@section('content')

<div class="container text-center">
    <div>{{ $order->customer_name }}</div>
    <div>{{ $order->customer_address }}</div>
    <div>{{ $order->customer_email }}</div>
    <div>{{ $order->customer_phone }}</div>
    <div>{{ $order->restaurant->name }}</div>
    <div>{{ $order->order_date }}</div>
    <div>{{ $order->total_price }}</div>
    <td>{{ $order->notes }}</td>

</div>

@endsection