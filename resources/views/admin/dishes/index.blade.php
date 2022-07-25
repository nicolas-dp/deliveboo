@extends('layouts.admin')

@section('content')

<div class="container pt-4 pb-5">
    @if(Auth::check() && $restaurant && count($dishes) <= 0)
    <div class="text-center">
        <h1 class="pb-4">Inserisci qui i tuoi piatti</h1>
        <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary text-light">Create</a>
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
                        <div class="col-md-12">
                            <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary text-light">Create</a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Restaurant</th>
                                        <th>Availability</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dishes as $dish)
                                    <tr>
                                        <td>{{ $dish->name }}</td>
                                        <td>{{ $dish->description }}</td>
                                        <td>{{ $dish->price }}</td>
                                        <td>{{ $dish->restaurant->name }}</td>
                                        
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