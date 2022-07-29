@extends('layouts.admin')

@section('content')

<div class="container-fluid ">
    @if(Auth::check() && $restaurant && count($dishes) <= 0) <img class="bg-admin" src="https://img.freepik.com/premium-vector/food-doodle-set_160308-239.jpg?w=2000" alt="">
        <div class="admin-wrapper">
            <div class="admin-cards  p-admin">
                <h3>Aggiungi un nuovo piatto!</h3>
                <div class="buttons">
                    <a href="{{route('admin.restaurants.create')}}" class="blob-btn">
                        Create New Dish
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

        @elseif(Auth::check() && $restaurant)
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Dishes</h3>
                    </div>

                    <div class="card-body">                                    
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th class="d-none d-md-table-cell">Description</th>
                                        <th class="d-none d-sm-table-cell">cover_image</th>
                                        <th class="d-none d-sm-table-cell">Price</th>
                                        <th class="d-none d-md-table-cell">Restaurant</th>
                                        <th>Availability</th>
                                        <th>Actions</th>
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
                                        <td>{{ $dish->is_available == 1 ? 'Available' : 'Not Available' }}</td>
                                        <td>
                                            <a href="{{route('admin.dishes.show', $dish->slug )}}" class="btn btn-primary text-light">Show</a>
                                            <a href="{{ route('admin.dishes.edit', $dish->slug) }}" class="btn btn-success text-light">Edit</a>

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger text-light" data-bs-toggle="modal" data-bs-target="#delete-dish-{{$dish->id}}">
                                                    Delete
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="delete-dish-{{$dish->id}}" role="dialog" tabindex="-1" aria-labelledby="modelTitle-{{$dish->id}}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Delete current</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete this dish {{$dish->name}}?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                                <form action="{{ route('admin.dishes.destroy', $dish->slug) }}" method="POST" style="display: inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger text-light">Delete</button>
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
        @else
        <h1>Welcome vatti a fare un ristorante</h1>
        <a href="{{route('admin.restaurants.create')}}">Create New Restaurant</a>
        @endif
</div>


@endsection