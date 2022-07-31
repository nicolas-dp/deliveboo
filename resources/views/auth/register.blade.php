@extends('layouts.app')

@section('content')
<div id="app">
    <div class="check-form">
        <div class="container container-form">
            <div class="d-flex justify-content-center h-100">
                <div class="card card-form-xl">
                    <div class="card-header">
                        <div class="arrow-back">
                            <a href="/"><strong>
                                    <h3>&LeftArrow;</h3>
                                </strong>
                            </a>
                        </div>
                        <h3>{{ __('Register') }}</h3>
                        <div class="d-flex justify-content-end social_icon">
                            <span><i class="fab fa-facebook-square"></i></span>
                            <span><i class="fab fa-google-plus-square"></i></span>
                            <span><i class="fab fa-twitter-square"></i></span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text pb-3"><i class="fas fa-user mt-1"></i></span>
                                </div>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{ __('Name')}}*">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text pb-3"><i class="fas fa-at"></i></span>
                                </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('E-Mail') }}*">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text pb-3"><i class="fas fa-key"></i></span>
                                </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" v-model="password" v-on:keyup="checkPassword" :class="{'input_correct': password_check == 1, 'input_error': password_check == 2}" placeholder="{{__('Password') }}*">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <label for="email" class="ps-1 ms-5 py-0 text-white">Inserire almeno 8 caratteri.</label>

                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text pb-3"><i class="fas fa-key"></i></span>
                                </div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" v-model="password_confirm" v-on:keyup="checkPassword" :class="{'input_correct': password_check == 1, 'input_error': password_check == 2}" placeholder="{{__('ConfirmPassword') }}*">
                            </div>

                            <div class="my-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary float-right login_btn mt-2">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center links">
                            Have an account?<a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection