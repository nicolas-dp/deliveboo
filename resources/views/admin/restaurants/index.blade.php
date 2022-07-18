@extends('layouts.admin')

@section('content')

@include('partials.session_message')

@if ($restaurant)
    
<h1>RISTORANTEEE</h1>

<p>{{$restaurant->name}}</p>
<p>{{$restaurant->description}}</p>
<p>{{$restaurant->address}}</p>
<p>{{$restaurant->delivery_cost}}</p>
<img src="{{$restaurant->cover_image}}" alt="">

@else

<h1>Crea qui il tuo ristorante</h1>

<a class="btn btn-primary" href="{{route('admin.restaurants.create')}}">Crea</a>

@endif



@endsection
