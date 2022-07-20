@extends('layouts.admin')

@section('content')

<div class="container text-center">
    @if(Auth::check() && $restaurant)
        <h1>Welcome {{ Auth::user()->name }}</h1>
    @else
        <h1>Welcome vatti a fare un ristorante</h1>
        <a href="{{route('admin.restaurants.create')}}">Create New Restaurant</a>
    @endif
</div>
@endsection