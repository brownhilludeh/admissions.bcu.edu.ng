@extends('layouts.app')
@section('title', 'Admission Portal')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="alert alert-success text-center">
                <p class="s">
                    Notice!
                    <br>
                    2023/2024 admission process is still on going. Minimum jamb requirement is 150. Admission fee is {{ __('NGN0.00') }}
                    <br>
                    Note that your login details are case-sensitive Hence, you must therefore use capital and lower letters correctly when logging in.
                </p>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10 row">
            @if (Route::has('register'))
            <div class="mb-3 col-md-4 col-sm-6">
                <div class="card rounded-3 h-100 bg__yellow text-center">
                    <div class="card-body">
                        <ion-icon style="font-size: 2em;" name="school-outline"></ion-icon>
                        <h4 class="card-title">Fresh Applicant</h4>
                        <p class="card-text text-wrap">Click to create a fresh applicant account for Screening/Post UTME</p>
                        <a href="{{ route('register') }}" class="btn btn-main">Post UTME Registration</a>
                    </div>
                </div>
            </div>
            @endif
            @if (Route::has('login'))
            <div class="mb-3 col-md-4 col-sm-6">
                <div class="card rounded-3 h-100 bg__mint text-center">
                    <div class="card-body">
                        <ion-icon style="font-size: 2em;" name="school-outline"></ion-icon>
                        <h4 class="card-title">Applicant Login</h4>
                        <p class="card-text text-wrap">For prospective student and already registered applicant.</p>
                        <a href="{{ route('login') }}" class="btn btn-main">Applicant Login</a>
                    </div>
                </div>
            </div>
            @endif
            <div class="mb-3 col-md-4 col-sm-6">
                <div class="card rounded-3 h-100 bg__peach text-center">
                    <div class="card-body">
                        <ion-icon style="font-size: 2em;" name="school-outline"></ion-icon>
                        <h4 class="card-title">Student Login</h4>
                        <p class="card-text">Current student and acitve portal login link. </p>
                        <a href="https://portal.bcu.edu.ng/" target="_blank" class="btn btn-main">Student Login</a>
                    </div>
                </div>
            </div>
            @if (Route::has('Login'))
            <div class="mb-3 col-md-4 col-sm-6">
                <div class="card rounded-3 h-100 bg__mint text-center">
                    <div class="card-body">
                        <ion-icon style="font-size: 2em;" name="school-outline"></ion-icon>
                        <h4 class="card-title">Potal Login</h4>
                        <p class="card-text">Login for current student and acitve. </p>
                        <a href="{{ route('login') }}" class="btn btn-main">Student Login</a>
                    </div>
                </div>
            </div>
            @endif
            @if (Route::has("admissions"))
            <div class="mb-3 col-md-4 col-sm-6">
                <div class="card rounded-3 h-100 bg__peach text-center">
                    <div class="card-body">
                        <ion-icon style="font-size: 2em;" name="person-add-outline"></ion-icon>
                        <h4 class="card-title"> New Applicant </h4>
                        <p class="card-text">Fresh applicants seeking admission.</p>
                        <a href="{{ route('register') }}" class="btn btn-main">Apply Now</a>
                    </div>
                </div>
            </div>
            @endif
            <div class="mb-3 col-md-4 col-sm-6">
                <div class="card rounded-3 h-100 bg__white text-center">
                    <div class="card-body">
                        <ion-icon style="font-size: 2em;" name="card-outline"></ion-icon>
                        <h4 class="card-title">Payment Advice</h4>
                        <p class="card-text">Generate session's payement advice.</p>
                        <a href="{{ route('register') }}" class="btn btn-main">Generate invoice</a>
                    </div>
                </div>
            </div>
            <div class="mb-3 col-md-4 col-sm-6">
                <div class="card rounded-3 bg__gray h-100 text-center">
                    <div class="card-body">
                        <ion-icon style="font-size: 2em;" name="git-network-outline"></ion-icon>
                        <h4 class="card-title">Transcription</h4>
                        <p class="card-text">Click to request for your transcript. </p>
                        <a href="{{ route('register') }}" class="btn btn-main">Request Transcript</a>
                    </div>
                </div>
            </div>
            {{-- @if (Route::has("alumni")) --}}
            <div class="mb-3 col-md-4 col-sm-6 ">
                <div class="card rounded-3 h-100 bg__white text-center">
                    <div class="card-body">
                        <ion-icon style="font-size: 2em;" name="git-network-outline"></ion-icon>
                        <h4 class="card-title">Alumin</h4>
                        <p class="card-text">Alumni Student login & Register form. </p>
                        <a href="{{ route('register') }}" class="btn btn-main">Staff Login</a>
                    </div>
                </div>
            </div>
            {{-- @endif --}}
        </div>
    </div>
</div>
@endsection