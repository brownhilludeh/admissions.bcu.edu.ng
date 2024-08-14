@extends('layouts.frontend')
@section('title', 'Applicant Registration')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-sm-12">
            <div class="card custom-card py-4">
                <div class="row">
                    <div class="justify-content-center d-flex align-items-center">
                        <img src="{{ get_logo() }}" alt="image" class="img-fluid" style="height: 5em; width: auto;">
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" class="validate" autocomplete="on">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">{{ __('Surname') }}</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="Surname" autofocus>
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">{{ __('First Name') }}</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" placeholder="First Name">
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="other_name" class="form-label">{{ __('Other Name') }}</label>
                                <input id="other_name" type="text" class="form-control @error('other_name') is-invalid @enderror" name="other_name" value="{{ old('other_name') }}" autocomplete="other_name" placeholder="Other Name">
                                @error('other_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Enter valid email address" autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">{{ __('Phone Number') }}</label>
                                <input type="number" minlength="10" maxlength="15" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" @required(true) placeholder="Enter your phone number">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="gender" class="form-label">{{ __('Gender') }}</label>
                                <select class="form-select" name="gender" required>
                                    <option selected>-- Select one --</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Enter password" autocomplete="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="off" placeholder="Confirm password">
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary btn-sm col-12 my-2">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>

                    <hr class="my-2">

                    <div class="col-12 text-center">
                        <p class="sub">Already registered? <a href="{{ route('login') }}" class="btn btn-warning btn-sm ">Login Here </a> </p>
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
