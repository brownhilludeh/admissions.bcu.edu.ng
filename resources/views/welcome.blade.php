@extends('layouts.frontend')
@section('title', get_option('school_name') .' ' . 'application portal')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="alert alert-success text-center justify-content-center items-center align-items-center d-flex flex-column">
                <img src="{{ get_favicon() }}" alt="image" class="img-fluid text-center" style="height: 3.5em; width: auto;">
                <p>
                <div class="text-uppercase fw-bold">
                    Notice
                </div>
                2024/2025 admission process is still on going. Minimum JAMB requirement is 140. Admission registration is FREE
                <br>
                Kindly note that your login details are case-sensitive Hence, you must use capital and lower letters correctly when logging in.
                </p>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10 row">
            @if (Route::has('register'))
            <div class="mb-3 col-md-4 col-sm-6">
                <div class="card rounded-3 h-100 bg_yellow text-center">
                    <div class="card-body">
                        <ion-icon style="font-size: 2em;" name="school-outline"></ion-icon>
                        <h5 class="card-title">Fresh Applicant</h5>
                        <p class="poppins-light text-wrap">Fresh applicant account for Screening/Post UTME</p>
                        <a href="{{ route('register') }}" class="btn btn-primary btn-sm mt-3">Admission Registration</a>
                    </div>
                </div>
            </div>
            @endif
            @if (Route::has('login'))
            <div class="mb-3 col-md-4 col-sm-6">
                <div class="card rounded-3 h-100 bg_gray text-center">
                    <div class="card-body">
                        <ion-icon style="font-size: 2em;" name="school-outline"></ion-icon>
                        <h5 class="card-title">Applicant Login</h5>
                        <p class="poppins-light text-wrap">For prospective student and already registered applicant.</p>
                        <a href="{{ route('login') }}" class="btn btn-primary btn-sm mt-3">Applicant Login</a>
                    </div>
                </div>
            </div>
            @endif
            <div class="mb-3 col-md-4 col-sm-6">
                <div class="card rounded-3 h-100 bg_mint text-center">
                    <div class="card-body">
                        <ion-icon style="font-size: 2em;" name="school-outline"></ion-icon>
                        <h5 class="card-title">Student Login</h5>
                        <p class="poppins-light">Current student and acitve portal login link. </p>
                        <a href="https://portal.bcu.edu.ng/" target="_blank" class="btn btn-primary btn-sm mt-3">Student Login</a>
                    </div>
                </div>
            </div>

            {{-- <div class="mb-3 col-md-4 col-sm-6">
                <div class="card rounded-3 h-100 bg_gray text-center">
                    <div class="card-body">
                        <ion-icon style="font-size: 2em;" name="card-outline"></ion-icon>
                        <h5 class="card-title">Payment Advice</h5>
                        <p class="poppins-light">Generate session's payement advice.</p>
                        <a href="{{ route('register') }}" class="btn btn-primary btn-sm mt-3">Generate invoice</a>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="mb-3 col-md-4 col-sm-6">
                <div class="card rounded-3 bg_peach h-100 text-center">
                    <div class="card-body">
                        <ion-icon style="font-size: 2em;" name="cloud-download-outline"></ion-icon>
                        <h5 class="card-title">Admission Letter</h5>
                        <p class="poppins-light">Click to download admission letter. </p>
                        <a href="{{ route('register') }}" class="btn btn-primary btn-sm mt-3">
                            Download Ltter
                        </a>
                    </div>
                </div>
            </div> --}}
            {{-- @if (Route::has("alumni")) --}}
            {{-- <div class="mb-3 col-md-4 col-sm-6 ">
                <div class="card rounded-3 h-100 bg_white text-center">
                    <div class="card-body">
                        <ion-icon style="font-size: 2em;" name="git-network-outline"></ion-icon>
                        <h5 class="card-title">Alumin</h5>
                        <p class="poppins-light">Alumni Student login & Register form. </p>
                        <a href="{{ route('register') }}" class="btn btn-primary btn-sm mt-3">Alumin Login</a>
                    </div>
                </div>
            </div> --}}
            {{-- @endif --}}
        </div>
    </div>
</div>
@endsection
