@extends('layouts.app')
@section('title', 'Applicant Registration')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 justify-content-center text-center mt-4 mb-0">
                            <img src="{{ asset('images/logo.png') }}" alt="image" class="img-fluid" style="height: 5em; width: auto;">
                        </div>
                    </div>
                    <form method="POST" action="{{ route('register') }}" class="p-2 was-validated">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Surname, Firstname Othername" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Valid email address" autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">{{ __('Phone Number') }}</label>
                            <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" @required(true)>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Enter a strong password" autocomplete="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>

                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="off" placeholder="Confirm password">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-main col-12 text-center">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                    <hr>
                    <div class="col-12 text-center">
                        <p class="sub">Already registered? <a href="{{ route('login') }}" class="btn btn-sm btn-warning">Login </a> </p>
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