@extends('layouts.app')

@section('content')
<div id="app">
    <div class="check-form">
        <div class="container container-form">
            <div class="d-flex justify-content-center h-100">
                <div class="card card-form">
                    <div class="card-header">
                        <div class="arrow-back">
                            <a href="/"><strong>
                                    <h3>&LeftArrow;</h3>
                                </strong>
                            </a>
                        </div>
                        <h3>{{ __('Login') }}</h3>
                        <div class="d-flex justify-content-end social_icon">
                            <span><i class="fab fa-facebook-square icon-index"></i></span>
                            <span><i class="fab fa-google-plus-square"></i></span>
                            <span><i class="fab fa-twitter-square"></i></span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text pb-3"><i class="fas fa-user mt-1"></i></span>
                                </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text pb-3"><i class="fas fa-key"></i></span>
                                </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" v-model="password" v-on:keyup="checkLoginPassword" :class="{'input_correct': password_check == 1, 'input_error': password_check == 2}" placeholder="password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="row align-items-center remember">
                                <div class="form-check ">
                                    <input type="checkbox" id="check" name="check" value="" />
                                    <label class="label-check" for="check">
                                        <span>
                                            <!-- This span is needed to create the "checkbox" element -->
                                        </span>{{ __('Remember Me') }}
                                </div>
                            </div>
                            <div class="mb-2 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary float-right login_btn px-md-4 py-md-1  py-1 px-2 ">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center links">
                            Don't have an account?<a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </div>
                        <div class="d-flex justify-content-center">
                            @if (Route::has('password.request'))
                            <a class="btn btn-link d-inline" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection