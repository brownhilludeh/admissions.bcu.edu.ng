@extends('layouts.backend')
@section('content')
<!-- Start:: row-1 -->
<div class="row">
    <div class="col-lg-9 col-md-12">
        {{-- <div class="card custom-card profile-card">
            <div class="profile-card-bg ">
                <img src="{{ asset('images/backgrounds/bg1.jpg') }}" class="card-img-top" alt="profile bg">
            </div>
            <div class="card-body p-4 pb-0 position-relative">
                <span class="avatar avatar-xxl avatar-rounded online">
                    <img src="{{ asset('public/uploads/images/profile/'. Auth::user()->image) }}" alt="image">
                </span>
                <div class="mt-4 mb-3 d-flex align-items-start flex-wrap gap-2 justify-content-between">
                    <div>
                        <p class="text-bold mb-1 text-capitalize">
                            {{ Auth::user()->last_name }}, {{ Auth::user()->first_name }} {{ Auth::user()->other_name[0] ?? ' ' }}
                            <span class="btn btn-link" data-title="{{ __('Update Photo') }}">
                                <a href="{{ route('users.edit', Auth::user()->id) }}">
                                    <ion-icon name="create-outline"></ion-icon> {{ __('Photo') }}
                                </a>
                            </span>
                        </p>
                        <p class="lead mb-1 text-muted ">{{ Auth::user()->username }}</p>
                    </div>
                    <div class="d-flex mb-0 flex-wrap gap-2">
                        @if (Auth::user()->user_type == 'Applicant')
                        @empty($apply->id)
                        <a href="{{ route('my.application.edit', Auth::user()->id) }}" class="btn btn-success-gradient btn-sm "> {{ get_academic_year() }} {{ __('Admission Registration') }}</a>
                        @else
                        <a href="{{ route('my.application.show', Auth::user()->id) }}" class="btn btn-success-gradient btn-sm">{{ __('View Application Details') }}</a>
                        @endempty
                        @endif
                        <a href="{{ route('profiles.edit', Auth::user()->profile->id) }}" class="btn btn-warning-gradient btn-sm ajax-modal" data-title="{{ __('Update My Profile') }}">{{ __('Update Profile') }}</a>
                        <a href="{{ route('users.show', Auth::user()->id) }}" class="btn btn-primary btn-sm ajax-modal" data-title="{{ __('View User Profile') }}">
                            <ion-icon name="eye-outline" class="align-middle fs-6"></ion-icon> {{ __('View Profile') }}
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}
        @include('layouts.components.banner')
    </div>
    <div class="col-lg-3">
        <div class="card custom-card overflow-hidden">
            <div class="card-header">
                <div class="card-title text-center text-danger">
                    {{ __('Number of Applicants') }}
                </div>
            </div>
            <div class="card-body p-0">
                <div class="text-center my-3 admission-status montserrat text-success-emphasis">
                    N/A
                    <br>
                    <p class="mt-3">

                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End:: row-1 -->

<!-- row 1 -->
<div class="row">
    <div class="col-xl-9">
        <div class="card custom-card card-bg-primary text-white border-0 shadow-none overflow-hidden courses-banner-card">
            <div class="text-white p-4">
                <div class="row">
                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-8">
                        <h4 class="text-fixed-white text-white mb-3">Master Your Skills With Our Courses! </h4>
                        <p class="mb-4 op-8 text-white">2024/2025 registration portal. Enusre yu ahve complted your registration No comment yet. Nevertheless, Check your portal regularly for updates on your application status. Elevate your skills at your own pace, anywhere, anytime</p>
                        <a href="{{ url('profile.edit', Auth::user()->id) }}" class="btn btn-warning-gradient">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row 1 -->
@endsection
