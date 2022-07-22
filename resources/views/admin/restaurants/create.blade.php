@extends('layouts.admin')

@section('content')

    <div class="container pt-4 pb-5">
        <h2>Crea un nuovo ristorante</h2>

        @include('partials.errors')

        <form name="formRestaurant" action="{{ route('admin.restaurants.store') }}" method="post" enctype="multipart/form-data">

            @csrf

            <div class="mb-2">
                <label for="name">Nome *</label>
                <input required="required" type="text" v-model="rest_name" v-on:keyup="countCharRestName" :class="{'input_correct': rest_name_check == 1, 'input_error': rest_name_check == 2}" minlength="4" maxlength="50" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    aria-describedby="nameHelper" value="{{ old('name') }}">
                <small id="nameHelper" class="text-muted">Inserisci il nome del ristorante (massimo 50
                    caratteri)</small>
                </div>
                @include('partials.single_error', ['variable' => 'name'])

            <div class="mb-2">
                <label for="address">Indirizzo *</label>
                <input type="text" name="address" id="address" minlength="5" maxlength="100" v-model="address" v-on:keyup="countCharAddress" :class="{'input_correct': address_check == 1, 'input_error': address_check == 2}"
                    class="form-control @error('address') is-invalid @enderror" 
                    aria-describedby="addressHelper" value="{{ old('address') }}">
                <small id="addressHelper" class="text-muted">Inserisci l'indirizzo del ristorante</small>
                @include('partials.single_error', ['variable' => 'address'])
            </div>

            <div class="mb-2">
                <label for="phone_number">Numero di telefono *</label>
                <input type="tel" name="phone_number" id="phone_number" v-model="phone" v-on:keyup="countPhone" :class="{'input_correct': phone_check == 1, 'input_error': phone_check == 2}" 
                    class="form-control @error('phone_number') is-invalid @enderror" required pattern="[0-9{10}" 
                    aria-describedby="phone_numberHelper" value="{{ old('phone_number') }}">
                <small id="phone_numberHelper" class="text-muted">Inserisci il numero di telefono del ristorante es. 3519084543</small>

                @include('partials.single_error', ['variable' => 'phone_number'])
            </div>

            <div class="mb-2">
                <label for="opening_hours">Orario di Apertura</label>
                <input type="time" min="05:00" max="13:00" name="opening_hours" id="opening_hours"
                    class="form-control"  aria-describedby="opening_hoursHelper"
                    value="{{ old('opening_hours') }}">
                <small id="opening_hoursHelper" class="text-muted">Inserisci l'orario di apertura</small>
                @include('partials.single_error', ['variable' => 'opening_hours'])
            </div>

            <div class="mb-2">
                <label for="closing_hours">Orario di Chiusura</label>
                <input type="time" min="13:00" max="23:59" name="closing_hours" id="closing_hours"
                    class="form-control"  aria-describedby="closing_hoursHelper"
                    value="{{ old('closing_hours') }}">
                <small id="closing_hoursHelper" class="text-muted">Inserisci l'orario di chiusura</small>
                @include('partials.single_error', ['variable' => 'closing_hours'])
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Categorie *</label>
                <select required="required" multiple class="form-control @error('category_id[]') is-invalid @enderror" name="category_id[]"
                    id="category_id">
                    <option disabled value="">Seleziona categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id[]') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>


                @include('partials.single_error', ['variable' => 'category_id[]'])
            </div>

            <div class="mb-2">
                <label for="cover_image">Immagine di copertina</label>
                <input type="file" name="cover_image" id="cover_image" class="form-control"
                    placeholder="Learn php article" aria-describedby="cover_imageHelper">
                <small id="cover_imageHelper" class="text-muted">Carica la tua immagine</small>
            </div>

            <div class="mb-2">
                <label for="delivery_cost">Prezzo consegna *</label>
                <input type="number" step=".01" min="0" name="delivery_cost" id="delivery_cost"  v-model="delivery_cost" v-on:keyup="checkDeliveryCost" :class="{'input_correct': delivery_cost_check == 1, 'input_error': delivery_cost_check == 2}"
                    class="form-control @error('delivery_cost') is-invalid @enderror" placeholder="0.00"
                    aria-describedby="delivery_costHelper" value="{{ old('delivery_cost') }}">
                <small id="delivery_costHelper" class="text-muted">Inserisci il prezzo della consegna</small>
                @include('partials.single_error', ['variable' => 'delivery_cost'])
            </div>

            <div class="mb-2">
                <label for="PIVA">Partita IVA *</label>
                <input type="tel" name="PIVA" id="PIVA" pattern="[0-9]{11}" maxlength="11" v-model="piva" v-on:keyup="countPIVA" :class="{'input_correct': piva_check == 1, 'input_error': piva_check == 2}"
                    class="form-control @error('PIVA') is-invalid @enderror"  
                    aria-describedby="PIVAHelper" value="{{ old('PIVA') }}">
                <small id="PIVAHelper" class="text-muted">Inserisci la Partita IVA (numero ad 11 cifre)</small>
                @include('partials.single_error', ['variable' => 'PIVA'])
            </div>


            <label class="d-block mb-2">I campi contrassegnati con <strong>*</strong> sono obbligatori.</label>

            <button type="submit" class="btn btn-primary text-white mt-4">Create Restaurant</button>

        </form>

    </div>
@endsection
