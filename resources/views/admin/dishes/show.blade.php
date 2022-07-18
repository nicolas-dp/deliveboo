@extends('layouts.admin')

@section('content')

<div class="container">
    <h1>{{$dish->name}}</h1>
    <img src='{{ substr($dish->cover_image, 0, 4) == "http" ? $dish->cover_image  :  asset("storage/" . $dish->cover_image)}}' alt="{{$dish->name}}">
    <p>Ingredients: {{$dish->ingredients}}</p>
    <p>desciption: {{$dish->description}}</p>
    <h5>Price: {{$dish->price}}</h5>
    @if($dish->is_available)
    <h5>Available: Disponibile</h5>
    @else
    <h5>Not available: non disponibile</h5>
    @endif
</div>

@endsection