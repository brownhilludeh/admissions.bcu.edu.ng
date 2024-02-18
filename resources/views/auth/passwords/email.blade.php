@extends('layouts.app')
@section('title', 'Portal Password Reset')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 justify-content-center text-center mt-4">
                            <img src="{{ asset('images/logo.png') }}" alt="image" class="img-fluid" style="height: 5em; width: auto;">
                        </div>
                    </div>
                    @if (session('status'))
                    <div class="alert alert-success mt-2" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" class="p-2">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-main col-12 text-center">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </form>
                    <hr>
                    <div class="col-12 text-center">
                        <p class="sub">Are you a fresh applicant? <a href="{{ route('register') }}" class="btn btn-sm btn-warning">{{ __('Register') }} </a> </p>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="help-desk">
                <img src="{{ asset('images/help.jpg') }}" alt="help desk" class="help-desk-img img-fluid rounded-4">
                <div class="lead mt-2">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="bg-transparent">
                                    <h5 class="card-title title">Having troubles applying?</h5>
                                    <p class="small">
                                        <small>Get in touch with an application specialist to get help with the application process.</small>
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="bg-transparent">
                                    <ion-icon name="logo-whatsapp"></ion-icon>
                                </td>
                                <td class="bg-transparent"><a href="https://wa.me/2348060091229">Click to chat help-desk</a></td>
                            </tr>
                            <tr>
                                <td class="bg-transparent">
                                    <ion-icon name="mail-outline"></ion-icon>
                                </td>
                                <td class="bg-transparent">
                                    <a href="mailto:help@bcu.edu.ng">help@bcu.edu.ng</a>
                                    <a href="mailto:admisions@bcu.edu.ng">admisions@bcu.edu.ng</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="bg-transparent">
                                    <ion-icon name="phone-portrait-outline"></ion-icon>
                                </td>
                                <td class="bg-transparent"><a href="mailto:admisions@bcu.edu.ng">admisions@bcu.edu.ng</a></td>
                            </tr>
                            <tr>
                                <td class="bg-transparent">
                                    <ion-icon name="phone-portrait-outline"></ion-icon>
                                </td>
                                <td class="bg-transparent"><a href="tel:+2348060091229">+234 (0) 806 009 1229</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-5">
            <div class="card mb-2">
                @foreach ($faculties as $faculty)
                <div class="card-body">
                    <div class="card-header lead">
                        {{ $faculty->faculty_name }}
                    </div>
                    <ul class="list-group">
                        @foreach ($faculty->departments as $dept)
                        <li class="list-group-item">{{ $dept->department_name }}</li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
        </div> --}}
    </div>
</div>
@endsection