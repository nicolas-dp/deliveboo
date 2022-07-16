@extends('layouts.admin')

@section('content')

@include('partials.errors')

<div class="container">
    <h2>Crea un nuovo ristorante</h2>

    <form action="{{route('admin.restaurants.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="pippo" aria-describedby="nameHelper" value="{{old('name')}}">
            <small id="nameHelper" class="text-muted">Inserisci il nome del ristorante (massimo 50 caratteri)</small>
            @include('partials.single_error',['variable' => 'name'])
        </div>

        <div class="form-group">
            <label for="address">Indirizzo</label>
            <input type="text" name="address" id="address" class="form-control" placeholder="pippo" aria-describedby="addressHelper" value="{{old('address')}}">
            <small id="addressHelper" class="text-muted">Inserisci l'indirizzo del ristorante</small>
            @include('partials.single_error',['variable' => 'address'])
        </div>

        <div class="form-group">
            <label for="phone_number">Numero di telefono</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="0000000000" aria-describedby="phone_numberHelper" value="{{old('phone_number')}}">
            <small id="phone_numberHelper" class="text-muted">Inserisci il numero di telefono del ristorante</small>
            @include('partials.single_error',['variable' => 'phone_number'])
        </div>
    
        <div class="form-group">
            <label for="opening_hours">Orario di Apertura</label>
            <input type="time" min="08:00" max="23:00" name="opening_hours" id="opening_hours" class="form-control" placeholder="pippo" aria-describedby="opening_hoursHelper" value="{{old('opening_hours')}}">
            <small id="opening_hoursHelper" class="text-muted">Inserisci l'orario di apertura</small>
            @include('partials.single_error',['variable' => 'opening_hours'])
        </div>

        <div class="form-group">
            <label for="closing_hours">Orario di Chiusura</label>
            <input type="time" min="08:00" max="23:00" name="closing_hours" id="closing_hours" class="form-control" placeholder="pippo" aria-describedby="closing_hoursHelper" value="{{old('closing_hours')}}">
            <small id="closing_hoursHelper" class="text-muted">Inserisci l'orario di chiusura</small>
            @include('partials.single_error',['variable' => 'closing_hours'])
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Categorie</label>
            <select multiple class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                <option value="">Seleziona categoria</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label for="cover_image">Immagine di copertina</label>
            <input type="file" name="cover_image" id="cover_image" class="form-control" placeholder="Learn php article" aria-describedby="cover_imageHelper">
            <small id="cover_imageHelper" class="text-muted">Carica la tua immagine</small>
        </div>

        <div class="form-group">
            <label for="delivery_cost">Prezzo consegna</label>
            <input type="number" step=".01" name="delivery_cost" id="delivery_cost" class="form-control" placeholder="pippo" aria-describedby="delivery_costHelper" value="{{old('delivery_cost')}}">
            <small id="delivery_costHelper" class="text-muted">Inserisci il prezzo della consegna</small>
            @include('partials.single_error',['variable' => 'delivery_cost'])
        </div>

        <div class="form-group">
            <label for="PIVA">Partita IVA</label>
            <input type="text" name="PIVA" id="PIVA" maxlenght="11" class="form-control" placeholder="pippo" aria-describedby="PIVAHelper" value="{{old('PIVA')}}">
            <small id="PIVAHelper" class="text-muted">Inserisci la Partita IVA</small>
            @include('partials.single_error',['variable' => 'PIVA'])
        </div>
    
        <button type="submit" class="btn btn-primary text-white mt-4">Create Restaurant</button>
    
    </form>

</div>

@endsection