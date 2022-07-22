@extends('layouts.admin')

@section('content')

<div class="container pt-4 pb-5">
    @include('partials.errors')
    <h1>Edit Dish</h1>
    <hr>
    <form action="{{ route('admin.dishes.update', $dish->slug) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" 
                value="{{ old('name', $dish->name) }}" required maxlength="45" required minlength="5">
                
            @include('partials.single_error',['variable' => 'name'])
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $dish->description) }}</textarea>
            @include('partials.single_error',['variable' => 'description'])
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step=".01" class="form-control" id="price" name="price" value="{{ old('price', $dish->price) }}" required min="1" max="4" required pattern="[^-,]+">
            @include('partials.single_error',['variable' => 'price'])
        </div>

        <div class="form-group">
            <label for="ingredients">Ingredients</label>
            <textarea class="form-control" id="ingredients" name="ingredients" rows="3">{{ old('ingredients', $dish->ingredients) }}</textarea>
            @include('partials.single_error',['variable' => 'ingredients'])
        </div>

        <div class="form-group">
            <label for="is_available">Availability</label>
            <select class="form-control" id="is_available" name="is_available" required='selected'>
                <option value="{{old('is_available', $dish->is_available)}}" selected="{{ old('is_available', $dish->is_available) == 1 }}" >Available</option>
                <option value="{{ old('is_available', $dish->is_available)}}" selected="{{ old('is_available', $dish->is_available) == 0 }}">Not Available</option>
            </select>
            @include('partials.single_error',['variable' => 'is_available'])
        </div>

        <div class="form-group">
            <label for="cover_image">Cover Image</label>
            <input type="file" class="form-control-file" id="cover_image" name="cover_image">
            @include('partials.single_error',['variable' => 'cover_image'])
        </div>

        <button type="submit" class="btn btn-primary text-light">Update</button>
    </form>
</div>

@endsection