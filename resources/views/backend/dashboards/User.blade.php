@extends('layouts.backend')
@section('title', ' Applicant Dashboard')
@section('content')
<!-- row 1 -->
<div class="row">
    <div class="col-xxl-7 col-xl-12">
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card card-bg-primary border-0 shadow-none overflow-hidden courses-banner-card">
                    <div class="card-body  p-4">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-fixed-white mb-3">Welcome to {{ get_option('school_name') }} </h4>
                                <p class="mb-4 op-8"> Fuel your growth with bite-sized lessons on us. Elevate your skills at your own pace, anywhere, anytime</p>
                                <button class="btn btn-secondary btn-wave">Learn More</button>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 d-sm-block d-none">
                                <div>
                                    <img src="../assets/images/media/media-67.png" alt="" class="position-absolute">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row 1 -->
<!--  row 2 -->
<div class="row">
    <div class="col-xxl-5 col-xl-12">
        <div class="row">
            <div class="col-xxl-6 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card custom-card total-students-card overflow-hidden">
                    <div class="card-body p-4">
                        <span class="d-block mb-3">Total Students</span>
                        <h4 class="fw-medium mb-2">23,768</h4>
                        <span class="fs-12">
                            This Month <span class="text-success fs-12 fw-medium ms-2 d-inline-block"><i class="ri-arrow-up-line me-1"></i>2.45%</span>
                        </span>
                        <span class="courses-main-cards-icon svg-white text-fixed-white">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                <rect width="256" height="256" fill="none" />
                                <polygon points="224 64 128 96 32 64 128 32 224 64" opacity="0.2" />
                                <line x1="32" y1="64" x2="32" y2="144" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <path d="M56,216c15.7-24.08,41.11-40,72-40s56.3,15.92,72,40" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <polygon points="224 64 128 96 32 64 128 32 224 64" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <path d="M169.34,82.22a56,56,0,1,1-82.68,0" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card custom-card total-instructors-card overflow-hidden">
                    <div class="card-body p-4">
                        <span class="d-block mb-3">Total Instructors</span>
                        <h4 class="fw-medium mb-2">1,673</h4>
                        <span class="fs-12">
                            This Month <span class="text-danger fs-12 fw-medium ms-2 d-inline-block"><i class="ri-arrow-down-line me-1"></i>0.62%</span>
                        </span>
                        <span class="courses-main-cards-icon svg-white text-fixed-white">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                <rect width="256" height="256" fill="none" />
                                <circle cx="104" cy="144" r="32" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <path d="M72,144a32,32,0,1,1,32,32h88V80H64v64Z" opacity="0.2" />
                                <path d="M53.39,208a56,56,0,0,1,101.22,0H216a8,8,0,0,0,8-8V56a8,8,0,0,0-8-8H40a8,8,0,0,0-8,8V200a8,8,0,0,0,8,8Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <polyline points="176 176 192 176 192 80 64 80 64 96" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card custom-card total-courses-card overflow-hidden">
                    <div class="card-body p-4">
                        <span class="d-block mb-3">Total Courses</span>
                        <h4 class="fw-medium mb-2">526</h4>
                        <span class="fs-12">
                            This Month <span class="text-success fs-12 fw-medium ms-2 d-inline-block"><i class="ri-arrow-up-line me-1"></i>3.75%</span>
                        </span>
                        <span class="courses-main-cards-icon svg-white text-fixed-white">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                <rect width="256" height="256" fill="none" />
                                <path d="M128,232a32,32,0,0,1,32-32h64a8,8,0,0,0,8-8V64a8,8,0,0,0-8-8H160a32,32,0,0,0-32,32Z" opacity="0.2" />
                                <path d="M128,88a32,32,0,0,1,32-32h64a8,8,0,0,1,8,8V192a8,8,0,0,1-8,8H160a32,32,0,0,0-32,32" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <path d="M24,192a8,8,0,0,0,8,8H96a32,32,0,0,1,32,32V88A32,32,0,0,0,96,56H32a8,8,0,0,0-8,8Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <line x1="160" y1="96" x2="200" y2="96" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <line x1="160" y1="128" x2="200" y2="128" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <line x1="160" y1="160" x2="200" y2="160" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card custom-card total-revenue-card overflow-hidden">
                    <div class="card-body p-4">
                        <span class="d-block mb-3">Total Revenue</span>
                        <h4 class="fw-medium mb-2">$1,26,553</h4>
                        <span class="fs-12">
                            This Month <span class="text-success fs-12 fw-medium ms-2 d-inline-block"><i class="ri-arrow-up-line me-1"></i>21.54%</span>
                        </span>
                        <span class="courses-main-cards-icon svg-white text-fixed-white">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                <rect width="256" height="256" fill="none" />
                                <path d="M128,128h24a40,40,0,0,1,0,80H128Z" opacity="0.2" />
                                <path d="M128,48H112a40,40,0,0,0,0,80h16Z" opacity="0.2" />
                                <line x1="128" y1="24" x2="128" y2="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <line x1="128" y1="208" x2="128" y2="232" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <path d="M184,88a40,40,0,0,0-40-40H112a40,40,0,0,0,0,80h40a40,40,0,0,1,0,80H104a40,40,0,0,1-40-40" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            PAYOUTS
                        </div>
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="p-2 fs-12 text-muted" data-bs-toggle="dropdown" aria-expanded="true"> Sort By <i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i> </a>
                            <ul class="dropdown-menu" role="menu" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 28px);" data-popper-placement="bottom-end">
                                <li><a class="dropdown-item" href="javascript:void(0);">This Week</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Last Week</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">This Month</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row g-0">
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 my-auto mx-auto">
                                <div id="payouts"></div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 my-auto">
                                <div class="row gy-4">
                                    <div class="col-xl-12">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3">
                                                <span class="avatar radius-5 bg-success-transparent text-success"><i class="ti ti-cash fs-18"></i></span>
                                            </div>
                                            <div class="flex-1">
                                                <p class="mb-1 fs-12 fw-medium">Total Payouts</p>
                                                <span class="fs-16 fw-medium d-flex align-items-center">$89,700<span class="badge bg-success-transparent fs-10 ms-2">0.54%<i class="ri-arrow-up-s-line ms-1"></i></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3">
                                                <span class="avatar radius-5 bg-primary-transparent text-primary"><i class="ti ti-cash fs-18"></i></span>
                                            </div>
                                            <div class="flex-1">
                                                <p class="mb-1 fs-12 fw-medium">Paid</p>
                                                <span class="fs-16 fw-medium d-flex align-items-center">$68,400<span class="badge bg-danger-transparent fs-10 ms-2">-1.34%<i class="ri-arrow-down-s-line ms-1"></i></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3">
                                                <span class="avatar radius-5 bg-secondary-transparent text-secondary"><i class="ti ti-x fs-18"></i></span>
                                            </div>
                                            <div class="flex-1">
                                                <p class="mb-1 fs-12 fw-medium">Unpaid</p>
                                                <span class="fs-16 fw-medium d-flex align-items-center">$21,300<span class="badge bg-success-transparent fs-10 ms-2">1.89%<i class="ri-arrow-up-s-line ms-1"></i></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  row 2 -->
@endsection
