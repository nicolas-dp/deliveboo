@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <img class="img_opacity" src="https://img.freepik.com/premium-vector/food-doodle-set_160308-239.jpg?w=2000" alt="">
    <div class="container py-5">
        <div class="card_dish rounded m-auto d-flex flex-column my_shadow bg_black_trasparent p-4">
            <h3 class="text-white"><strong class="my_yellow">{{$dish->name}}</strong> </h3>
            <div class="img_dish">
                <img class="py-4 img-fluid" src='{{ substr($dish->cover_image, 0, 4) == "http" ? $dish->cover_image  :  asset("storage/" . $dish->cover_image)}}' alt="{{$dish->name}}">
            </div>
            @if($dish->is_available)
            <div class="text-white"><strong class="my_yellow">Disponibilità:</strong> Disponibile</div>
            @else
            <div class="text-white"><strong class="my_yellow">Disponibilità:</strong> Non disponibile</div>
            @endif
            <div class="text-white"><strong class="my_yellow">Ingredienti: </strong> {{$dish->ingredients}}</div>
            <div class="text-white"><strong class="my_yellow">Descrizione: </strong>{{$dish->description}}</div>
            <h4 class="text-white mt-3"><strong class="my_yellow">Prezzo: </strong>{{$dish->price}}€</h4>
        </div>
        <!-- /.card_dish -->
    </div>
    <!-- /.container -->
</div>

@endsection