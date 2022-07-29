@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="pt-3">
    @include('partials.session_message')
    </div>

    <div class="container pt-4 pb-5">
        <h1 class="my-3">{{$restaurant->name}}</h1>
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col img_desc">
                <img class="img-fluid w-100" src='{{ substr($restaurant->cover_image, 0, 4) == "http" ? $restaurant->cover_image  :  asset("storage/" . $restaurant->cover_image)}}' alt="immagine copertina ristorante">
                <p class="lead my-3"><span class="fw-bold">Descrizione: </span><br> {{$restaurant->description}} </p>
            </div>
            <div class="col data_restaurant d-flex justify-content-center align-items-start">
                <div class="card_data bg-light shadow-sm d-inline-block p-4">
                    <p><strong>Indirizzo: </strong> {{$restaurant->address}}</p>
                    <p><strong>Numero di telefono:</strong> {{$restaurant->phone_number}}</p>
                    <p><strong>Orario di apertura:</strong> {{$restaurant->opening_hours}}</p>
                    <p><strong>Orario di chiusura:</strong> {{$restaurant->closing_hours}}</p>
                    <p><strong>Prezzo consegne:</strong> {{$restaurant->delivery_cost}}€</p>
                    <p><strong>Partita iva:</strong> {{$restaurant->PIVA}}</p>
                    <a class="btn btn-success text-light" href="{{route('admin.restaurants.edit', $restaurant->slug)}}">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection