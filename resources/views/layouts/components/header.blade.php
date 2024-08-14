<header class="app-header sticky-top">
    <div class="main-header-container container-fluid">
        <div class="header-content-left">
            @auth
            @if(Auth::user()->user_type == 'Admin' || Auth::user()->user_type == "SuperAdmin")
            <div class="header-element header-select mt-1 mx-2">
                <select class="custom nice-select" onchange="changeSession(this);">
                    @foreach (get_table("academic_years") as $session)
                    <option value="{{ $session->id }}" {{ $session->id == get_option('academic_year') ? 'selected' : '' }}>
                        {{ $session->year }} {{ __('Session') }}</option>
                    @endforeach
                </select>
                <script>
                    function changeSession(elem){
                        if($(elem).val() == ""){
                            return;
                        }
                        window.location = "<?php echo url('change_session') ?>/"+$(elem).val();
                    }
                </script>
            </div>
            @endif
            @endauth
        </div>
        <div class="header-content-right">
            <div class="header-element dropdown d-md-block d-none">
                <a class="header-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="header-link-icon">
                        <ion-icon name="notifications-outline"></ion-icon>
                        <span class="position-absolute top-0 start-100 text-xsmall translate-middle-x badge rounded-pill bg-danger">
                            {{ count_inbox() }}
                        </span>
                    </div>
                </a>
                <ul class="dropdown-menu main-header-dropdown p-2">
                    @foreach(inbox_items() as $message)
                    <li class="py-1 m-1 my-2">
                        <a class="ajax-modal dropdown-item " href="{{ route('show_inbox', $message->id) }}">
                            <div class="align-items-center justify-content-between">
                                <div class="text-truncate" style="max-width: 15rem;">{{ $message->subject }}</div>
                                <div class="small text-gray-400">
                                    <b>{{ $message->sender }}</b>
                                </div>
                                <div class="col">
                                    <span class="float-end small col-12">{{ date("M d @ H:m", strtotime( $message->created_at))}}</span>
                                </div>
                            </div>
                        </a>
                    </li>

                    @endforeach
                    <a class="dropdown-item text-center small text-gray-600" href="{{route('msg_inbox')}}">View all </a>
                </ul>
            </div>
            <div class="header-element header-fullscreen d-md-block d-none">
                <a class="header-link" onclick="openFullscreen();" href="javascript:void(0);">
                    <div class="header-link-icon full-screen-open d-flex justify-content-center align-items-center">
                        <ion-icon name="expand"></ion-icon>
                    </div>
                    <div class="header-link-icon full-screen-close d-none d-flex justify-content-center align-items-center">
                        <ion-icon name="contract"></ion-icon>
                    </div>
                </a>
            </div>
            <div class="header-element dropdown">
                <a class="header-link" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <span class="fw-medium lh-1">{{ Auth::user()->last_name }}</span>
                    <div class="header-link-icon avatar avatar-rounded online">
                        <img src="{{ asset('uploads/images/'. Auth::user()->image) }}" alt="Image" class="header-link-profile">
                    </div>
                </a>
                <ul class="dropdown-menu main-header-dropdown">
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('profiles.index') }}">
                            <ion-icon name="finger-print"></ion-icon>Profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <ion-icon name="mail-unread"></ion-icon>Inbox
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="to-do-#">
                            <ion-icon name="podium"></ion-icon>Task Manager
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <ion-icon name="settings"></ion-icon>Settings
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="dropdown-item d-flex align-items-center" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                            <ion-icon name="log-out-outline"></ion-icon>{{ __("Logout") }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
