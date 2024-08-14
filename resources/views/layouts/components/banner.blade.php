<div class="card custom-card profile-card">
    <div class="profile-card-bg ">
        <img src="{{ asset('images/backgrounds/banner.jpg') }}" class="card-img-top" alt="profile bg">
    </div>
    <div class="card-body p-4 pb-0 position-relative">
        <span class="avatar avatar-xxl avatar-rounded online">
            <img src="{{ asset('uploads/images/'. Auth::user()->image) }}" alt="image" class="bg-gradient">
        </span>
        <div class="mt-4 mb-3 d-flex align-items-start flex-wrap gap-2 justify-content-between">
            <div>
                <div class="text-bold mb-0 text-capitalize">
                    {{ Auth::user()->last_name }}, {{ Auth::user()->first_name }} {{ Auth::user()->other_name[0] ?? ' ' }}
                    <span>
                        <a href="{{ route('users.edit', Auth::user()->id) }}" class="btn-outline-dark rounded-1 btn-sm align-middle ajax-modal" data-title="{{ __('Update Profile Photo') }}">
                            <ion-icon name="create-outline" class=""></ion-icon> {{ __('Photo') }}
                        </a>
                    </span>
                </div>
                <div class="lead text-muted ">{{ Auth::user()->username }}</div>
            </div>
            <div class="d-flex mb-0 flex-wrap gap-2">
                @if (Auth::user()->user_type == 'Applicant')
                @empty($apply->id)
                <a href="{{ route('my.application.edit', Auth::user()->id) }}" class="btn btn-success-gradient btn-sm "> {{ get_academic_year() }} {{ __('Admission Registration') }}</a>
                @else
                <a href="{{ route('my.application.show', Auth::user()->id) }}" class="btn btn-success-gradient btn-sm">{{ __('View Application Details') }}</a>
                @endempty
                @endif
                <a href="{{ route('users.edit', Auth::user()->id) }}" class="btn btn-warning-gradient btn-sm ajax-modalf" data-title="{{ __('Update My Profile') }}">{{ __('Update Profile') }}</a>
                <a href="{{ route('users.show', Auth::user()->id) }}" class="btn btn-primary btn-sm ajax-modal" data-title="{{ __('View User Profile') }}">
                    <ion-icon name="eye-outline" class="align-middle fs-6"></ion-icon> {{ __('View Profile') }}
                </a>
            </div>
        </div>
    </div>
</div>
