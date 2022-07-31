@extends('layouts.admin')

@section('content')

<div class="container-fluid index-restaurant">
    <div class="pt-md-3">
        @include('partials.session_message')
    </div>

    <div class="container pt-1 pb-1 pt-md-4 pb-md-5">
        <img class="img_opacity" src="https://img.freepik.com/premium-vector/food-doodle-set_160308-239.jpg?w=2000" alt="">
        <div class="card_restaurant rounded-sm m-auto my_shadow bg_black_trasparent p-4 ps-5 rounded">
            <h1 class="my-3 my_yellow">{{$restaurant->name}}</h1>
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col img_desc">
                    <img class="img-fluid w-100" src='{{ substr($restaurant->cover_image, 0, 4) == "http" ? $restaurant->cover_image  :  asset("storage/" . $restaurant->cover_image)}}' alt="immagine copertina ristorante">
                    <p class="text-white my-3"><strong class="my_yellow">Descrizione:</strong><br> {{$restaurant->description}} </p>
                </div>
                <div class="col data_restaurant d-flex justify-content-center align-items-start pt-5">
                    <div class="card_data rounded bg-light shadow-sm d-inline-block px-4 py-3">
                        <p><strong>Indirizzo: </strong> {{$restaurant->address}}</p>
                        <p><strong>Numero di telefono:</strong> {{$restaurant->phone_number}}</p>
                        <p><strong>Orario di apertura:</strong> {{$restaurant->opening_hours}}</p>
                        <p><strong>Orario di chiusura:</strong> {{$restaurant->closing_hours}}</p>
                        <p><strong>Prezzo consegna:</strong> {{$restaurant->delivery_cost}}€</p>
                        <p><strong>Partita iva:</strong> {{$restaurant->PIVA}}</p>
                        <a class="btn btn-success text-light" href="{{route('admin.restaurants.edit', $restaurant->slug)}}">Modifica</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection