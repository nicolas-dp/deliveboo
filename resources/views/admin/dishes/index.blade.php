@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Dishes</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary">Create</a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Restaurant</th>
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
                                        <td>
                                            <a href="{{route('admin.dishes.show', $dish->slug )}}" class="btn btn-primary">Show</a>
                                            <a href="{{ route('admin.dishes.edit', $dish->slug) }}" class="btn btn-success">Edit</a>

                                            <form action="{{ route('admin.dishes.destroy', $dish) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
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


@endsection