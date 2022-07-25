@extends('layouts.app')

@section('content')
<div id="app">
    <div class="check-form pt-5">
        <div class="container container-form pt-5">
            <div class="d-flex justify-content-center h-100 pt-5">
                <div class="card card-form-xs">
                    <div class="card-header">
                        <div class="arrow-back">
                            <a href="/"><strong>
                                    <h3 class="pt-2">&LeftArrow;</h3>
                                </strong>
                            </a>
                        </div>
                        <h3>{{ __('Reset Password') }}</h3>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text pb-3"><i class="fas fa-at"></i></span>
                                </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="e-mail">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>


                            <div class="mt-3 mb-2 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary float-right login_btn login_btn_plus">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center links">
                            Back to login<a class="" href="{{ route('login') }}">{{ __('login') }}</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection