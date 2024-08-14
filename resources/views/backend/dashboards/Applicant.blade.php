@extends('layouts.backend')
@section('title', ' Applicant Dashboard')
@section('content')

<!-- Start:: row-1 -->
<div class="row">
    <div class="col-lg-9 col-md-12">
        @include('layouts.components.banner');
    </div>
    <div class="col-lg-3">
        <div class="card custom-card overflow-hidden">
            <div class="card-header">
                <div class="card-title text-center text-danger">
                    {{ __('Application Status') }}
                </div>
            </div>
            <div class="card-body p-0">
                <div class="text-center my-3 admission-status montserrat text-success-emphasis">
                    {{ $applicant->decision ?? 'Not Registered' }}
                    <br>
                    <p class="mt-3">
                        <button type="button" class="btn btn-primary-gradient btn-sm text-center" data-bs-toggle="modal" data-bs-target="#applyNote">
                            <ion-icon name="eye-outline" class="align-middle fs-6"> </ion-icon>
                            {{ __('View Note') }}
                        </button>
                    </p>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="applyNote" tabindex="-1" aria-labelledby="applyNoteLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="applyNoteLabel">Admissions Progress Note</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="">
                                    {{ $applicant->decision ?? 'You are yet to register for the' . ' ' . get_academic_year() . ' ' . 'academic session' }}
                                    <br>
                                    @empty($applicant->decision)
                                    <small class="">{{ __('To verify your email to begin your application click on the "Apply Now" button') }}</small>
                                    {{-- <a href="{{ route('my.application.edit', Auth::user()->id) }}" class="btn btn-link btn-sm "> {{ __('Apply Now') }}</a> --}}
                                    @else
                                    {{ $applicant->comment ?? 'No comment yet. Nevertheless, Check your portal regularly for updates on your application status' }}
                                    @endempty
                                </p>
                            </div>
                            <div class="modal-footer text-center">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal">
                                    @empty($applicant->decision)
                                    <a href="{{ route('my.application.edit', Auth::user()->id) }}"> {{ __('Apply Now') }}</a>
                                    @endempty
                                </button>
                            </div>
                        </div>
                    </div>
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
