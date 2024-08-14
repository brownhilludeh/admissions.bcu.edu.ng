@extends('layouts.frontend')
@section('title', 'Email Verification')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>

                    <hr class="my-2">
                    <div class="row mb-0">
                        <div class="col-md-6">
                            <a href="{{ route('logout') }}" class="btn btn-primary-light btn-sm col-10" onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                <ion-icon name="log-out-outline" class="align-middle fs-6"></ion-icon>
                                <span>{{ __("Logout") }}</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                    <hr class="my-2">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
