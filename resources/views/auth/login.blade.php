@extends('layouts.app')
@section('title', 'Applicant Registration')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 justify-content-center text-center mt-4 mb-0">
                            <img src="{{ asset('images/logo.png') }}" alt="image" class="img-fluid" style="height: 5em; width: auto;">
                        </div>
                    </div>
                    <form method="POST" action="{{ route('login') }}" class="p-2 was-validated">
                        @csrf

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">{{ __('Email/Username') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-main col-12 text-center">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                    <hr>
                    <div class="col-12 text-center">
                        <p class="sub">Fresh applicant? <a href="{{ route('register') }}" class="btn btn-sm btn-warning">{{ __('Register') }} </a> </p>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection