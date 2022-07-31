@extends('layouts.admin')

@section('content')

<div class="container-fluid py-5">
    <img class="img_opacity" src="https://img.freepik.com/premium-vector/food-doodle-set_160308-239.jpg?w=2000" alt="">
    <div class="container rounded my_shadow bg_black_trasparent p-5">
        @include('partials.errors')
        <h1 class="my_yellow ">Modifica Piatto</h1>
        <hr>
        <form action="{{ route('admin.dishes.update', $dish->slug) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class='my_yellow' for="name">Nome *</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $dish->name) }}" required maxlength="45" required minlength="5">

                @include('partials.single_error',['variable' => 'name'])
            </div>

            <div class="mb-3">
                <label class='my_yellow' for="description">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $dish->description) }}</textarea>
                @include('partials.single_error',['variable' => 'description'])
            </div>

            <div class="mb-3">
                <label class='my_yellow' for="price">Prezzo *</label>
                <input type="number" step=".01" class="form-control" id="price" name="price" value="{{ old('price', $dish->price) }}" required min="1" max="100" required pattern="[^-,]+">
                @include('partials.single_error',['variable' => 'price'])
            </div>

            <div class="mb-3">
                <label class='my_yellow' for="ingredients">Ingredienti</label>
                <textarea class="form-control" id="ingredients" name="ingredients" rows="3">{{ old('ingredients', $dish->ingredients) }}</textarea>
                @include('partials.single_error',['variable' => 'ingredients'])
            </div>

            <div class="mb-3">
                <label class='my_yellow' for="is_available">Disponibilità *</label>
                <select class="form-control" id="is_available" name="is_available" required='selected'>
                    <option value="1" {{ old('is_available', $dish->is_available) == 1 ? 'selected' : '' }}>Disponibile</option>
                    <option value="0" {{ old('is_available', $dish->is_available) == 0 ? 'selected' : '' }}>Non disponibile</option>
                </select>
                @include('partials.single_error',['variable' => 'is_available'])
            </div>

            <div class="d-flex mb-3 align-items-center">
                <div class="edit_img me-3">
                    <img width="170" src="{{ substr($dish->cover_image, 0, 4) == 'http' ? $dish->cover_image  :  asset('storage/' . $dish->cover_image)}}" alt="">
                </div>

                <div class="">
                    <label class='my_yellow' for="cover_image">Immagine</label>
                    <input type="file" class="form-control-file my_yellow" id="cover_image" name="cover_image">
                    @include('partials.single_error',['variable' => 'cover_image'])
                </div>
            </div>


            <button type="submit" class="btn btn-primary text-light">Aggiorna</button>
        </form>
    </div>
</div>

@endsection