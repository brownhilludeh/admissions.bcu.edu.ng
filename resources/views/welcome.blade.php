@extends('layouts.frontend')
@section('title', 'Admission Portal')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="alert alert-success text-center">
                <p class="s">
                    Notice
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
                        <h5 class="card-title">Fresh Applicant</h5>
                        <p class="poppins-light text-wrap">Fresh applicant account for Screening/Post UTME</p>
                        <a href="{{ route('register') }}" class="btn btn__main">Post UTME Registration</a>
                    </div>
                </div>
            </div>
            @endif
            @if (Route::has('login'))
            <div class="mb-3 col-md-4 col-sm-6">
                <div class="card rounded-3 h-100 bg__mint text-center">
                    <div class="card-body">
                        <ion-icon style="font-size: 2em;" name="school-outline"></ion-icon>
                        <h5 class="card-title">Applicant Login</h5>
                        <p class="poppins-light text-wrap">For prospective student and already registered applicant.</p>
                        <a href="{{ route('login') }}" class="btn btn__main">Applicant Login</a>
                    </div>
                </div>
            </div>
            @endif
            <div class="mb-3 col-md-4 col-sm-6">
                <div class="card rounded-3 h-100 bg__peach text-center">
                    <div class="card-body">
                        <ion-icon style="font-size: 2em;" name="school-outline"></ion-icon>
                        <h5 class="card-title">Student Login</h5>
                        <p class="poppins-light">Current student and acitve portal login link. </p>
                        <a href="https://portal.bcu.edu.ng/" target="_blank" class="btn btn__main">Student Login</a>
                    </div>
                </div>
            </div>
            @if (Route::has('Login'))
            <div class="mb-3 col-md-4 col-sm-6">
                <div class="card rounded-3 h-100 bg__mint text-center">
                    <div class="card-body">
                        <ion-icon style="font-size: 2em;" name="school-outline"></ion-icon>
                        <h5 class="card-title">Potal Login</h5>
                        <p class="poppins-light">Login for current student and acitve. </p>
                        <a href="{{ route('login') }}" class="btn btn__main">Student Login</a>
                    </div>
                </div>
            </div>
            @endif
            @if (Route::has("admissions"))
            <div class="mb-3 col-md-4 col-sm-6">
                <div class="card rounded-3 h-100 bg__peach text-center">
                    <div class="card-body">
                        <ion-icon style="font-size: 2em;" name="person-add-outline"></ion-icon>
                        <h5 class="card-title"> New Applicant </h5>
                        <p class="poppins-light">Fresh applicants seeking admission.</p>
                        <a href="{{ route('register') }}" class="btn btn__main">Apply Now</a>
                    </div>
                </div>
            </div>
            @endif
            <div class="mb-3 col-md-4 col-sm-6">
                <div class="card rounded-3 h-100 bg__white text-center">
                    <div class="card-body">
                        <ion-icon style="font-size: 2em;" name="card-outline"></ion-icon>
                        <h5 class="card-title">Payment Advice</h5>
                        <p class="poppins-light">Generate session's payement advice.</p>
                        <a href="{{ route('register') }}" class="btn btn__main">Generate invoice</a>
                    </div>
                </div>
            </div>
            <div class="mb-3 col-md-4 col-sm-6">
                <div class="card rounded-3 bg__gray h-100 text-center">
                    <div class="card-body">
                        <ion-icon style="font-size: 2em;" name="cloud-download-outline"></ion-icon>
                        <h5 class="card-title">Admission Letter</h5>
                        <p class="poppins-light">Click to download admission letter. </p>
                        <a href="{{ route('register') }}" class="btn btn__main">
                            Download Ltter
                        </a>
                    </div>
                </div>
            </div>
            {{-- @if (Route::has("alumni")) --}}
            <div class="mb-3 col-md-4 col-sm-6 ">
                <div class="card rounded-3 h-100 bg__white text-center">
                    <div class="card-body">
                        <ion-icon style="font-size: 2em;" name="git-network-outline"></ion-icon>
                        <h5 class="card-title">Alumin</h5>
                        <p class="poppins-light">Alumni Student login & Register form. </p>
                        <a href="{{ route('register') }}" class="btn btn__main">Staff Login</a>
                    </div>
                </div>
            </div>
            {{-- @endif --}}
        </div>
    </div>
</div>
@endsection