@extends('layouts.admin')

@section('content')

@include('partials.session_message')

<div class="container text-center pt-4 pb-5">

    <h1>RISTORANTEEE</h1>

    <p>{{$restaurant->name}}</p>
    <p>{{$restaurant->description}}</p>
    <p>{{$restaurant->address}}</p>
    <p>{{$restaurant->delivery_cost}}</p>

    <img src="{{$restaurant->cover_image}}" alt="">

    <a class="btn btn-success text-light" href="{{route('admin.restaurants.edit', $restaurant->slug)}}">Edit</a>

</div>
@endsection