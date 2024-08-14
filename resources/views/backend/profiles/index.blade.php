@extends('layouts.backend')
@section('title', 'My Profile')
@section('content')
<!-- Start:: row-1 -->
<div class="row">
    <div class="col-lg-4">
        <div class="card custom-card overflow-hidden">
            <div class="card-header">
                <div class="card-title">
                    PERSONAL INFO
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div><span class=" me-2">Name :</span><span class="text-muted">{{ $user->last_name }}, {{ $user->first_name }} {{ $user->other_name }}</span></div>
                    </li>
                    <li class="list-group-item">
                        <div><span class=" me-2">Email :</span><span class="text-muted">{{ $user->email }}</span></div>
                    </li>
                    <li class="list-group-item">
                        <div><span class=" me-2">Phone :</span><span class="text-muted">{{ $user->phone }}</span></div>
                    </li>
                    <li class="list-group-item">
                        <div><span class=" me-2">Designation :</span><span class="text-muted">{{ $user->user_type}}</span></div>
                    </li>
                    <li class="list-group-item">
                        <div><span class=" me-2">Sex : </span><span class="text-muted">{{ $user->gender }}</span></div>
                    </li>
                    <li class="list-group-item">
                        <div><span class=" me-2">Age: </span><span class="text-muted">{{ $user->profile->birthday ?? 'nil' }}</span></div>
                    </li>
                    <li class="list-group-item">
                        <div><span class=" me-2">Education : </span><span class="text-muted">{{ $user->profile->qualification ?? 'nil'}}</span></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-12">
        <div class="card custom-card profile-card">
            <div class="profile-card-bg ">
                <img src="{{ asset('images/backgrounds/banner.jpg') }}" class="card-img-top" alt="profile bg">
            </div>
            <div class="card-body p-4 pb-0 position-relative">
                <span class="avatar avatar-xxl avatar-rounded online">
                    <img src="{{ asset('storage/uploads/images/'. Auth::user()->image) }}" alt="">
                </span>
                <div class="mt-4 mb-3 d-flex align-items-start flex-wrap gap-2 justify-content-between">
                    <div>
                        <p class="text-bold mb-1 text-capitalize">{{ Auth::user()->last_name }}, {{ Auth::user()->first_name }} {{ Auth::user()->other_name[0] ?? ' ' }}
                            <span class="btn btn-link" data-title="{{ __('Update Photo') }}">
                                <a href="{{ route('users.edit', Auth::user()->id) }}">
                                    <ion-icon name="create-outline"></ion-icon> {{ __('Photo') }}
                                </a>
                            </span>
                        </p>
                        <p class="lead mb-1 text-muted ">{{ Auth::user()->username }}</p>
                    </div>
                    <div class="d-flex mb-0 flex-wrap gap-1">
                        <a href="{{ route('users.show', Auth::user()->id) }}" class="btn btn-primary btn-sm ajax-modal inline-flex" data-title="{{ __('View User Profile') }}">
                            <ion-icon name="eye-outline" class="align-middle fs-6"></ion-icon> View Profile
                        </a>
                        <a href="{{ route('profiles.edit', $user->profile->id) }}" class="btn btn-primary btn-sm">
                            <ion-icon name="create-outline" class="align-middle fs-6"></ion-icon> Edit Profile
                        </a>
                        <a href="#" class="btn btn-primary btn-sm">
                            <ion-icon name="cloud-upload-outline" class="align-middle fs-6"></ion-icon> {{ __('Uploads') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End:: row-1 -->

<!-- Start:: row-2 -->
{{-- <div class="row">
    <div class="col-xl-8">
        <div class="tab-content" id="profile-tabs">
            <div class="tab-pane show active p-0 border-0" id="profile-about-tab-pane" role="tabpanel" aria-labelledby="profile-about-tab" tabindex="0">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item p-4">
                                <span class=" fs-15 d-block mb-3">CONTACT INFORMATION :</span>
                                <div class="text-muted">
                                    <p class="mb-2">
                                        <span class="avatar avatar-sm avatar-rounded text-primary">
                                            <ion-icon name="mail-outline"></ion-icon>
                                        </span>
                                        <span class=" text-success">Email : </span> {{ Auth::user()->email }}
                                    </p>
                                    <p class="mb-2">
                                        <span class="avatar avatar-sm avatar-rounded text-primary">
                                            <ion-icon name="call"></ion-icon>
                                        </span>
                                        <span class=" text-success">Phone : </span> 0{{ Auth::user()->phone }}
                                    </p>
                                    <p class="mb-2">
                                        <span class="avatar avatar-sm avatar-rounded text-success">
                                            <ion-icon name="home"></ion-icon>
                                        </span>
                                        <span class=" text-success">Address 1 : </span> {{ Auth::user()->current_address }}
                                    </p>
                                    <p class="mb-0">
                                        <span class="avatar avatar-sm avatar-rounded text-orange">
                                            <i class="ri-building-line align-middle fs-15"></i>
                                        </span>
                                        <span class=" text-success">Address 2 : </span> {{ Auth::user()->permanent_address }}
                                    </p>
                                </div>
                            </li>
                            <li class="list-group-item p-4">
                                <span class=" fs-15 d-block mb-3">Nationality :</span>
                                <div class="text-muted">
                                    <p class="mb-2">
                                        <span class="avatar avatar-sm avatar-rounded text-primary">
                                            <ion-icon name="mail-outline"></ion-icon>
                                        </span>
                                        <span class=" text-success">L.G.A / City : </span> {{ $user->profile->lga ?? ''}}
                                    </p>
                                    <p class="mb-2">
                                        <span class="avatar avatar-sm avatar-rounded text-primary">
                                            <ion-icon name="call"></ion-icon>
                                        </span>
                                        <span class="text-success">State/Province : </span> {{ $user->profile->state ?? ''}}
                                    </p>
                                    <p class="mb-2">
                                        <span class="avatar avatar-sm avatar-rounded text-success">
                                            <ion-icon name="home"></ion-icon>
                                        </span>
                                        <span class=" text-success">Country: </span> {{ $user->profile->country ?? ''}}
                                    </p>
                                    <p class="mb-0">
                                        <span class="avatar avatar-sm avatar-rounded text-orange">
                                            <i class="ri-building-line align-middle fs-15"></i>
                                        </span>
                                        <span class=" text-success">Address 2 : </span> {{ Auth::user()->permanent_address }}
                                    </p>
                                </div>
                            </li>
                            <li class="list-group-item p-4">
                                <span class=" fs-15 d-block mb-3"><span class="me-1">&#10024;</span>ABOUT ME :</span>
                                <p class="text-muted mb-2">
                                    {{ $user->profile->about ?? '' }}
                                </p>
                            </li>
                            <li class="list-group-item p-4">
                                <span class=" fs-15 d-block mb-3">SKILLS :</span>
                                <div class="w-75">
                                    <a href="javascript:void(0);">
                                        <span class="badge bg-light text-muted m-1 border">Project Management</span>
                                    </a>
                                </div>
                            </li>
                            <li class="list-group-item p-4">
                                <span class=" fs-15 d-block mb-3">CONTACT INFORMATION :</span>
                                <div class="text-muted">
                                    <p class="mb-2">
                                        <span class="avatar avatar-sm avatar-rounded text-primary">
                                            <ion-icon name="mail-outline"></ion-icon>
                                        </span>
                                        <span class=" text-success">Email : </span> {{ Auth::user()->email }}
                                    </p>
                                    <p class="mb-2">
                                        <span class="avatar avatar-sm avatar-rounded text-primary">
                                            <ion-icon name="call"></ion-icon>
                                        </span>
                                        <span class=" text-success">Phone : </span> 0{{ Auth::user()->phone }}
                                    </p>
                                    <p class="mb-2">
                                        <span class="avatar avatar-sm avatar-rounded text-success">
                                            <ion-icon name="home"></ion-icon>
                                        </span>
                                        <span class=" text-success">Address 1 : </span> {{ Auth::user()->current_address }}
                                    </p>
                                    <p class="mb-0">
                                        <span class="avatar avatar-sm avatar-rounded text-orange">
                                            <i class="ri-building-line align-middle fs-15"></i>
                                        </span>
                                        <span class=" text-success">Address 2 : </span> {{ Auth::user()->permanent_address }}
                                    </p>
                                </div>
                            </li>
                            <li class="list-group-item p-4">
                                <span class=" fs-15 d-block mb-3">SOCIAL MEDIA :</span>
                                <div class="d-flex align-items-center gap-5 flex-wrap">
                                    <div class="d-flex align-items-center gap-3">
                                        <div>
                                            <span class="avatar avatar-md bg-secondary-transparent">
                                                <ion-icon name="logo-twitter"></ion-icon>
                                            </span>
                                        </div>
                                        <div>
                                            <span class="d-block ">Twitter</span>
                                            <span class="text-muted ">twitter.com/brownhilludeh.me</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-3">
                                        <div>
                                            <span class="avatar avatar-md bg-success-transparent">
                                                <ion-icon name="logo-facebook"></ion-icon>
                                            </span>
                                        </div>
                                        <div>
                                            <span class="d-block ">Facebook</span>
                                            <span class="text-muted ">linkedin.com/in/brownhilludeh</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-3">
                                        <div>
                                            <span class="avatar avatar-md bg-success-transparent">
                                                <ion-icon name="logo-instagram"></ion-icon>
                                            </span>
                                        </div>
                                        <div>
                                            <span class="d-block ">Instagram</span>
                                            <span class="text-muted ">linkedin.com/in/brownhilludeh</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-3">
                                        <div>
                                            <span class="avatar avatar-md bg-orange-transparent">
                                                <ion-icon name="briefcase"></ion-icon>
                                            </span>
                                        </div>
                                        <div>
                                            <span class="d-block ">My Portfolio</span>
                                            <span class="text-muted ">brownhilludeh.com/</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane p-0 border-0" id="edit-profile-tab-pane" role="tabpanel" aria-labelledby="edit-profile-tab" tabindex="0">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item p-4">
                                <span class=" fs-15 d-block mb-3">PERSONAL INFO :</span>
                                <div class="row gy-4 align-items-center">
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="">User Name :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" class="form-control" placeholder="Placeholder" name="last_name" value="{{ Auth::user()->last_name }}" disabled>
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="">First Name :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" class="form-control" placeholder="Placeholder" value="{{ Auth::user()->first_name }}" disabled>
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="">Last Name :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" class="form-control" placeholder="Placeholder" value="{{ Auth::user()->other_name }}" disabled>
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="">Designation : </span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" class="form-control" placeholder="Placeholder" value="Chief Executive Officer (C.E.O)">
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item p-4">
                                <span class=" fs-15 d-block mb-3">CONTACT INFO :</span>
                                <div class="row gy-4 align-items-center">
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="">Email :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="email" class="form-control" placeholder="Placeholder" value="your.email@example.com">
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="">Phone :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" class="form-control" placeholder="Placeholder" value="+1 (555) 123-4567">
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="">Website :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" class="form-control" placeholder="Placeholder" value="www.yourwebsite.com">
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="">Location :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" class="form-control" placeholder="Placeholder" value="City, Country">
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item p-4">
                                <span class=" fs-15 d-block mb-3">SOCIAL INFO :</span>
                                <div class="row gy-4 align-items-center">
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="">Github :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" class="form-control" placeholder="Placeholder" value="github.com/brownhilludeh">
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="">Twitter :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" class="form-control" placeholder="Placeholder" value="twitter.com/brownhilludeh.me">
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="">Linkedin :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" class="form-control" placeholder="Placeholder" value="linkedin.com/in/brownhilludeh">
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="">Portfolio :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" class="form-control" placeholder="Placeholder" value="brownhilludeh.com/">
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item p-4">
                                <span class=" fs-15 d-block mb-3">ABOUT :</span>
                                <div class="row gy-4 align-items-center">
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="">Biographical Info :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <textarea class="form-control" id="text-area" rows="4">Hey there! I'm [Your Name], a passionate [Your Profession/Interest] based in [Your Location]. With a love for [Your Hobbies/Interests], I find joy in exploring the beauty of [Your Industry/Field]. Whether it's [Specific Skills or Expertise], I'm always eager to learn and grow.

                                                        I specialize in [Your Specialization/Area of Expertise], bringing creativity and innovation to every project. From [Key Achievements] to [Notable Experiences], my journey has been a thrilling ride, and I'm excited to share it with you.
                                                        </textarea>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item p-4">
                                <span class=" fs-15 d-block mb-3">SKILLS :</span>
                                <div class="row gy-4 align-items-center">
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="">skills :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input class="form-control" id="choices-text-preset-values" type="text" value="Project Management,Data Analysis,Marketing Strategy,Graphic Design,Content Creation,Market Research,Client Relations,Event Planning,Budgeting and Finance,Negotiation Skills,Team Collaboration,Adaptability" placeholder="This is a placeholder">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="card custom-card overflow-hidden">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Application Status
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="d-flex align-items-center gap-2">
                            <div class="lh-1">
                                <span class="avatar avatar-sm avatar-rounded">
                                    <img src="{{ asset('images/avatar.png') }}" alt="">
                                </span>
                            </div>
                            <div class="flex-fill">
                                <span class="">Screening</span>
                            </div>
                            <div>
                                <button class="btn btn-sm btn-icon btn-primary-light">
                                    <ion-icon name="add-circle-outline" class="lh-1 align-middle"></ion-icon>
                                </button>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div> --}}
<!-- End:: row-2 -->
@endsection
