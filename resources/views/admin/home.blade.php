@extends('layouts.admin')

@section('content')

<div class="container text-center pt-4 pb-5">
    @if(Auth::check() && $restaurant)
        <h1>Welcome {{ Auth::user()->name }}</h1>
    @else
        <h1>Welcome vatti a fare un ristorante</h1>
        <a href="{{route('admin.restaurants.create')}}">Create New Restaurant</a>
    @endif
</div>
@endsection