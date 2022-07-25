@extends('layouts.admin')

@section('content')

<div class="container pt-4 pb-5">
@include('partials.errors')
    <h1>Create Dish</h1>
    <hr>
    <form action="{{ route('admin.dishes.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name*</label>
            <input type="text" minlength="5" maxlength="50" required="required" class="form-control" id="name" name="name" value="{{ old('name') }}" v-model="dish_name" v-on:keyup="countCharDishName" :class="{'input_correct': dish_name_check == 1, 'input_error': dish_name_check == 2}">
            @include('partials.single_error',['variable' => 'name'])
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
            @include('partials.single_error',['variable' => 'description'])
        </div>
        
        <div class="form-group">
            <label for="price">Price*</label>
            <input type="number" step=".01" min="0" required="required" class="form-control" id="price" name="price" value="{{ old('price') }}" v-model="dish_price" v-on:keyup="checkDishPrice" :class="{'input_correct': dish_price_check == 1, 'input_error': dish_price_check == 2}">
            @include('partials.single_error',['variable' => 'price'])
        </div>

        <div class="form-group">
            <label for="ingredients">Ingredients</label>
            <textarea class="form-control" id="ingredients" name="ingredients" rows="3">{{ old('ingredients') }}</textarea>
            @include('partials.single_error',['variable' => 'ingredients'])
        </div>

        <div class="form-group">
            <label for="is_available">Availability</label>
            <select class="form-control" id="is_available" name="is_available">
                <option value="1" {{ old('is_available') == 1 ? 'selected' : '' }}>Available</option>
                <option value="0" {{ old('is_available') == 0 ? 'selected' : '' }}>Not Available</option>
            </select>
            @include('partials.single_error',['variable' => 'is_availability'])
        </div>

        <div class="form-group">
            <label for="cover_image">Cover Image</label>
            <input type="file" class="form-control-file" id="cover_image" name="cover_image">
            @include('partials.single_error',['variable' => 'cover_image'])
        </div>

        <label class="d-block mb-2">I campi contrassegnati con <strong>*</strong> sono obbligatori.</label>

        <button type="submit" class="btn btn-primary text-light">Create</button>
    </form>
</div>

@endsection