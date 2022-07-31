@extends('layouts.admin')

@section('content')

<div class="container-fluid py-5">
    <img class="img_opacity" src="https://img.freepik.com/premium-vector/food-doodle-set_160308-239.jpg?w=2000" alt="">
    <div class="container rounded my_shadow bg_black_trasparent p-5">
        @include('partials.errors')
        <h1 class="my_yellow">Crea Piatto</h1>
        <hr>
        <form action="{{ route('admin.dishes.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="my_yellow" for="name">Nome*</label>
                <input type="text" minlength="5" maxlength="50" required="required" class="form-control" id="name" name="name" value="{{ old('name') }}" v-model="dish_name" v-on:keyup="countCharDishName" :class="{'input_correct': dish_name_check == 1, 'input_error': dish_name_check == 2}">
                <small id="nameHelper" class="text-white">Inserisci il nome del piatto (massimo 50
                    caratteri)</small>
                @include('partials.single_error',['variable' => 'name'])
            </div>

            <div class="mb-3">
                <label class="my_yellow" for="description">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                @include('partials.single_error',['variable' => 'description'])
            </div>

            <div class="mb-3">
                <label class="my_yellow" for="price">Prezzo*</label>
                <input type="number" step=".01" min="0" required="required" class="form-control" id="price" name="price" value="{{ old('price') }}" v-model="dish_price" v-on:keyup="checkDishPrice" :class="{'input_correct': dish_price_check == 1, 'input_error': dish_price_check == 2}">
                <small id="priceHelper" class="text-white">Inserisci il prezzo</small>
                @include('partials.single_error',['variable' => 'price'])
            </div>

            <div class="mb-3">
                <label class="my_yellow" for="ingredients">Ingredienti</label>
                <textarea class="form-control" id="ingredients" name="ingredients" rows="3">{{ old('ingredients') }}</textarea>
                @include('partials.single_error',['variable' => 'ingredients'])
            </div>

            <div class="mb-3">
                <label class="my_yellow" for="is_available">Disponibilità</label>
                <select class="form-control" id="is_available" name="is_available">
                    <option value="1" {{ old('is_available') == 1 ? 'selected' : '' }}>Available</option>
                    <option value="0" {{ old('is_available') == 0 ? 'selected' : '' }}>Not Available</option>
                </select>
                @include('partials.single_error',['variable' => 'is_availability'])
            </div>

            <div class="mb-3">
                <label class="my_yellow" for="cover_image">Immagine</label>
                <input type="file" class="form-control-file my_yellow" id="cover_image" name="cover_image">
                @include('partials.single_error',['variable' => 'cover_image'])
            </div>

            <label class="d-block mb-3 text-white">I campi contrassegnati con <strong>*</strong> sono obbligatori.</label>

            <button type="submit" class="btn btn-primary text-light">Crea</button>
        </form>
    </div>
</div>

@endsection