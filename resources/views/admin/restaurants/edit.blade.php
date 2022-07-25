@extends('layouts.admin')

@section('content')

<div class="container pt-4 pb-5 ">
    <h2>Modifica il ristorante</h2>

    @include('partials.errors')

    <form name="formRestaurant" action="{{ route('admin.restaurants.update', $restaurant->slug) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-2">
            <label for="name">Nome *</label>
            <input required="required" type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required maxlength="45" required minlength="5" aria-describedby="nameHelper" value="{{ old('name', $restaurant->name) }}">
            <small id="nameHelper" class="text-muted">Inserisci il nome del ristorante (massimo 50
                caratteri)</small>
        </div>
        @include('partials.single_error', ['variable' => 'name'])

        <div class="mb-2">
            <label for="address">Indirizzo *</label>
            <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" aria-describedby="addressHelper" value="{{ old('address', $restaurant->address) }}" required maxlength="50" required minlength="5">
            <small id="addressHelper" class="text-muted">Inserisci l'indirizzo del ristorante</small>
            @include('partials.single_error', ['variable' => 'address'])
        </div>

        <div class="mb-2">
            <label for="phone_number">Numero di telefono *</label>
            <input type="tel" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" required pattern="[0-9]{10}" aria-describedby="phone_numberHelper" value="{{ old('phone_number', $restaurant->phone_number) }}">
            <small id="phone_numberHelper" class="text-muted">Inserisci il numero di telefono del ristorante es. 3519084543</small>

            @include('partials.single_error', ['variable' => 'phone_number'])
        </div>

        <div class="mb-2">
            <label for="opening_hours">Orario di Apertura</label>
            <input type="time" required min="05:00" max="13:00" name="opening_hours" id="opening_hours" class="form-control" aria-describedby="opening_hoursHelper" value="{{ old('opening_hours', $restaurant->opening_hours) }}">
            <small id="opening_hoursHelper" class="text-muted">Inserisci l'orario di apertura</small>
            @include('partials.single_error', ['variable' => 'opening_hours'])
        </div>

        <div class="mb-2">
            <label for="closing_hours">Orario di Chiusura</label>
            <input type="time" required min="13:00" max="23:59" name="closing_hours" id="closing_hours" class="form-control" aria-describedby="closing_hoursHelper" value="{{ old('closing_hours', $restaurant->closing_hours) }}">
            <small id="closing_hoursHelper" class="text-muted">Inserisci l'orario di chiusura</small>
            @include('partials.single_error', ['variable' => 'closing_hours'])
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Categorie *</label>
            <select multiple class="form-control @error('category_id[]') is-invalid @enderror" name="category_id[]" id="category_id">
                <option disabled value="">Seleziona categoria</option>

                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $restaurant->categories->contains($category->id) ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>




            @include('partials.single_error', ['variable' => 'category_id[]'])
        </div>

        <div class="mb-2">
            <label for="cover_image">Immagine di copertina</label>
            <input type="file" name="cover_image" id="cover_image" class="form-control" aria-describedby="cover_imageHelper">
            <small id="cover_imageHelper" class="text-muted">Carica la tua immagine</small>
        </div>

        <div class="mb-2">
            <label for="delivery_cost">Prezzo consegna *</label>
            <input type="number" step=".01" name="delivery_cost" id="delivery_cost" class="form-control @error('delivery_cost') is-invalid @enderror" required min="1" max='25' required pattern="[^-,]+" aria-describedby="delivery_costHelper" value="{{ old('delivery_cost', $restaurant->delivery_cost) }}">
            <small id="delivery_costHelper" class="text-muted">Inserisci il prezzo della consegna</small>
            @include('partials.single_error', ['variable' => 'delivery_cost'])
        </div>

        <div class="mb-2">
            <label for="PIVA">Partita IVA *</label>
            <input type="text" inputmode="numeric" name="PIVA" id="PIVA" required minleth='11' maxlenght="11" class="form-control @error('PIVA') is-invalid @enderror" pattern="[0-9]{11}" aria-describedby="PIVAHelper" value="{{old('PIVA', $restaurant->PIVA)}}">
            <small id="PIVAHelper" class="text-muted">Inserisci la Partita IVA</small>
            @include('partials.single_error', ['variable' => 'PIVA'])
        </div>


        <label class="d-block mb-2">I campi contrassegnati con <strong>*</strong> sono obbligatori.</label>

        <button type="submit" class="btn btn-primary text-white mt-4">Update Restaurant</button>

    </form>

</div>
@endsection