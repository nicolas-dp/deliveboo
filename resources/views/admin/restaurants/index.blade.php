@extends('layouts.admin')

@section('content')
<h1>RISTORANTEEE</h1>

<p>{{$restaurant->name}}</p>
<p>{{$restaurant->description}}</p>
<p>{{$restaurant->address}}</p>
<p>{{$restaurant->delivery_cost}}</p>
<img src="{{$restaurant->cover_image}}" alt="">

@endsection
