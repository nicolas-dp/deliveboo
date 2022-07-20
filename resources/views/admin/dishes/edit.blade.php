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
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $dish->name) }}">
            @include('partials.single_error',['variable' => 'name'])
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $dish->description) }}</textarea>
            @include('partials.single_error',['variable' => 'description'])
        </div>
        
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step=".01" class="form-control" id="price" name="price" value="{{ old('price', $dish->price) }}">
            @include('partials.single_error',['variable' => 'price'])
        </div>

        <div class="form-group">
            <label for="ingredients">Ingredients</label>
            <textarea class="form-control" id="ingredients" name="ingredients" rows="3">{{ old('ingredients', $dish->ingredients) }}</textarea>
            @include('partials.single_error',['variable' => 'ingredients'])
        </div>

        <div class="form-group">
            <label for="is_availability">Availability</label>
            <select class="form-control" id="is_availability" name="is_availability">
                <option value = "1" {{ old('is_availability') == 1 ? 'selected' : '' }}>Available</option>
                <option value = "0" {{ old('is_availability') == 0 ? 'selected' : '' }}>Not Available</option>
            </select>
            @include('partials.single_error',['variable' => 'is_availability'])
        </div>

        <div class="form-group">
            <label for="cover_image">Cover Image</label>
            <input type="file" class="form-control-file" id="cover_image" name="cover_image">
            @include('partials.single_error',['variable' => 'cover_image'])
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection