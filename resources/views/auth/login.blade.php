@extends('layouts.frontend')
@section('title', 'Portal Login')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-sm-12">
            <div class="card custom-card py-4">
                <div class="card-body">
                    <div class="row">
                        <div class="d-flex align-items-center justify-content-center ">
                            <img src="{{ get_logo() }}" alt="image" class="img-fluid" style="height: 5em; width: auto;">
                        </div>
                    </div>
                    <form method="POST" action="{{ route('login') }}" class="was-validated bp-submit validate">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <label for="exampleFormControlInput1" class="form-label">{{ __('Email/Username') }}</label>
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Username or Email" required autocomplete="username" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center text-center">
                            <div class="col-md-4 col-9">
                                <div class="form-check">
                                    <label class="form-check-label " for="remember"> {{ __('Remember Me') }} </label>
                                    <input class="form-check-input float-end" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                @if (Route::has('password.request'))
                                <a class="btn  btn-primary-transparent btn-sm  " href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>

                        <div class=" justify-content-center text-center">
                            <button type="submit" class="btn btn-primary btn-sm col-10">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                    <hr class="my-2">
                    <div class="col-12 text-center">
                        <p class="sub">Fresh applicant? <a href="{{ route('register') }}" class="btn btn-sm btn-warning">{{ __('Register Here') }} </a> </p>
                    </div>
                    <hr class="my-2">
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-5 col-10">
            <div class="mb-2 card content">
                <img src="{{ asset('images/help-desk.jpg') }}" alt="help desk" class="rounded-3">
                <div class="row my-4 text-center">
                    <div class="col-12">
                        <strong class="lead bold">Need help?</strong>
                    </div>
                    <div class="col-12">
                        <span class="lead">
                            <a href="tel:{{ get_option('phone') }}">{{ get_option('phone') }}</a>
                        </span>
                    </div>
                    <div class="col-12">
                        <span class="lead">
                            <a href="{{ get_option('whatsapp') }}">{{ __('Whatsapp BK') }}</a>
                        </span>
                    </div>
                    <div class="col-12">
                        <span class="lead">
                            <a href="mailto:admissions@bcu.edu.ng">admissions@bcu.edu.ng</a>
                        </span>
                    </div>
                    <div class="col-12">
                        <span class="lead">
                            <a href="mailto:{{ get_option('mail') }}">{{ get_option('email') }}</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
