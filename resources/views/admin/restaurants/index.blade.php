@extends('layouts.admin')

@section('content')

@include('partials.session_message')

<div class="container pt-4 pb-5">

    <h1 class="tetx-center">{{$restaurant->name}}</h1>

    <img class="img-fluid" src='{{ substr($restaurant->cover_image, 0, 4) == "http" ? $restaurant->cover_image  :  asset("storage/" . $restaurant->cover_image)}}' alt="immagine copertina ristorante">
    <p>Indirizzo: {{$restaurant->address}}</p>
    <p>Numero di telefono: {{$restaurant->phone_number}}</p>
    <p>Descrizione: </p>
    <p>{{$restaurant->description}}</p>
    <p>Orario di apertura: {{$restaurant->opening_hours}}</p>
    <p>Orario di chiusura: {{$restaurant->closing_hours}}</p>
    <p>Prezzo consegne: {{$restaurant->delivery_cost}}€</p>
    <p>Partita iva: {{$restaurant->PIVA}}</p>
    
    <h4>Modifica le informazioni del tuo ristorante</h4>
    <a class="btn btn-success text-light" href="{{route('admin.restaurants.edit', $restaurant->slug)}}">Edit</a>
    

</div>
@endsection