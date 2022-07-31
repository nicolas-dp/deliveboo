@extends('layouts.admin')

@section('content')

@if(Auth::check() && $restaurant)

    <div class="container-fluid">
        <div class="pt-3">
            @include('partials.session_message')
        </div>
        <img class="img_opacity" src="https://img.freepik.com/premium-vector/food-doodle-set_160308-239.jpg?w=2000" alt="">
        <div class="container pt-4 pb-5">
            <div class="card_restaurant rounded m-auto my_shadow bg_black_trasparent py-4 px-3">
                <h1 class="text-center my_yellow py-3">Ciao {{ Auth::user()->name }}</h1>
                <h2 class="my-3 my_yellow">{{$restaurant->name}}</h2>
                <div class="row row-cols-1 row-cols-md-2 ">
                    <div class="col img_desc">
                        <img class="img-fluid w-100" src='{{ substr($restaurant->cover_image, 0, 4) == "http" ? $restaurant->cover_image  :  asset("storage/" . $restaurant->cover_image)}}' alt="immagine copertina ristorante">
                        <p class="text-white my-3"><strong class="my_yellow">Descrizione:</strong><br> {{$restaurant->description}} </p>
                    </div>
                    <div class="col data_restaurant d-flex justify-content-center align-items-start mt-4">
                        <div class="card_data rounded bg-light shadow-sm d-inline-block p-4">
                            <p><strong>Indirizzo: </strong> {{$restaurant->address}}</p>
                            <p><strong>Numero di telefono:</strong> {{$restaurant->phone_number}}</p>
                            <p><strong>Orario di apertura:</strong> {{$restaurant->opening_hours}}</p>
                            <p><strong>Orario di chiusura:</strong> {{$restaurant->closing_hours}}</p>
                            <p><strong>Prezzo consegne:</strong> {{$restaurant->delivery_cost}}€</p>
                            <p><strong>Partita iva:</strong> {{$restaurant->PIVA}}</p>
                            <a class="btn btn-success text-light" href="{{route('admin.restaurants.edit', $restaurant->slug)}}">Modifica</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else

<div class="container-fuid">
    <img class="bg-admin" src="https://img.freepik.com/premium-vector/food-doodle-set_160308-239.jpg?w=2000" alt="">
    <div class="admin-wrapper">
        <div class="admin-cards p-admin">
            <h3>Registra qui il tuo ristorante</h3>
            <div class="buttons">
                <a class="blob-btn" href="{{route('admin.restaurants.create')}}">
                    Crea nuovo Ristorante
                    <span class="blob-btn__inner">
                        <span class="blob-btn__blobs">
                            <span class="blob-btn__blob"></span>
                            <span class="blob-btn__blob"></span>
                            <span class="blob-btn__blob"></span>
                            <span class="blob-btn__blob"></span>
                        </span>
                    </span>
                </a>
                <br />

                <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                    <defs>
                        <filter id="goo">
                            <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10"></feGaussianBlur>
                            <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 21 -7" result="goo"></feColorMatrix>
                            <feBlend in2="goo" in="SourceGraphic" result="mix"></feBlend>
                        </filter>
                    </defs>
                </svg>
            </div>
        </div>
    </div>

    @endif
    @endsection