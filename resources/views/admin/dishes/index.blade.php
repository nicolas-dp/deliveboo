@extends('layouts.admin')

@section('content')


@if(Auth::check() && $restaurant && count($dishes) <= 0) <div class="container-fluid ">
    <img class="bg-admin" src="https://img.freepik.com/premium-vector/food-doodle-set_160308-239.jpg?w=2000" alt="">
    <div class="admin-wrapper">
        <div class="admin-cards  p-admin">
            <h3>Aggiungi un nuovo piatto!</h3>
            <div class="buttons">
                <a href="{{route('admin.dishes.create')}}" class="blob-btn">
                    Crea nuovo piatto
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
    </div>
    @elseif(Auth::check() && $restaurant)
    <div class="dish_container pt-5">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between p-3">
                        <h3>Piatti</h3>
                        <div>
                            <a href="{{route('admin.dishes.create')}}" class="btn btn-info text-light">Crea Piatto</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th class="d-none d-md-table-cell">Descrizione</th>
                                            <th class="d-none d-sm-table-cell">Immagine</th>
                                            <th class="d-none d-sm-table-cell">Prezzo</th>
                                            <th class="d-none d-md-table-cell">Ristorante</th>
                                            <th>Disponibile</th>
                                            <th>Azioni</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dishes as $dish)
                                        <tr>
                                            <td>{{ $dish->name }}</td>
                                            <td style="max-width: 400px" class="d-none d-sm-table-cell">{{ $dish->description }}</td>
                                            <td class="d-none d-md-table-cell">
                                                <img src='{{ substr($dish->cover_image, 0, 4) == "http" ? $dish->cover_image  :  asset("storage/" . $dish->cover_image)}}' alt="{{$dish->name}}" style="max-width: 100px">
                                            </td>
                                            <td class="d-none d-sm-table-cell">{{ $dish->price }} €</td>
                                            <td class="d-none d-md-table-cell">{{ $dish->restaurant->name }}</td>
                                            <td>{{ $dish->is_available == 1 ? 'Disponibile' : 'Non Disponibile' }}</td>
                                            <td>
                                                <a href="{{route('admin.dishes.show', $dish->slug )}}" class="btn btn-primary mb-2 mb-xl-0 text-light btn-sm">Dettagli</a>
                                                <a href="{{ route('admin.dishes.edit', $dish->slug) }}" class="btn btn-success mb-2 mb-xl-0 text-light btn-sm" >Modifica</a>

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger text-light btn-sm" data-bs-toggle="modal" data-bs-target="#delete-dish-{{$dish->id}}">
                                                    Elimina
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="delete-dish-{{$dish->id}}" role="dialog" tabindex="-1" aria-labelledby="modelTitle-{{$dish->id}}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Elimina Piatto</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Sei sicuro di voler eliminare {{$dish->name}}?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>

                                                                <form action="{{ route('admin.dishes.destroy', $dish->slug) }}" method="POST" style="display: inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger text-light">Elimina</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <h1>Welcome vatti a fare un ristorante</h1>
    <a href="{{route('admin.restaurants.create')}}">Crea un nuovo Ristorante</a>
    @endif



    @endsection