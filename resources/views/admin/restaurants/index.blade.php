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

<a class="btn btn-success" href="{{route('admin.restaurants.edit', $restaurant->slug)}}">Edit</a>
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#restaurant">
    Delete
</button>

<!-- Modal -->
<div class="modal fade" id="restaurant" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restaurant" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="restaurant">Delete current</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this restaurant?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                <form action="{{ route('admin.restaurants.destroy', $restaurant->slug) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

@else

<h1>Crea qui il tuo ristorante</h1>

<a class="btn btn-primary" href="{{route('admin.restaurants.create')}}">Crea</a>

@endif



@endsection