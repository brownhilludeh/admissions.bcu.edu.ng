@extends('layouts.frontend')
@section('title','Password Reset')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        {{ __('Reset Password') }}
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-row">
                            <label for="email" class="col-form-label">{{ __('Email Address') }}</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-sm col-12">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>

                        <hr class="my-2">
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('login') }}" class="btn btn-primary-light btn-sm col-12">
                                    {{ __('Back to Dashboard') }}
                                </a>
                            </div>
                        </div>
                        <hr class="my-2">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
