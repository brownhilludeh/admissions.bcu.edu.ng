<!-- Aside -->
<aside class="app-sidebar sticky" id="sidebar">
    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="{{ url("/") }}" class="header-logo">
            <img src="{{ get_logo() }}" alt="logo" class="desktop-logo">
        </a>
        <div class="header-element header-toggle d-block d-lg-none">
            <div class="header-link-icon  mobile-toggle" id="mobile-toggle">
                <ion-icon name="grid-outline"></ion-icon>
            </div>
        </div>
    </div>



    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <nav class="main-sidebar " id="sidebar-scroll">

        <!-- Start::Sidebar Menu -->
        <ul class="sidebar-menu ">
            <li>
                <a href="{{ route('dashboard') }}" class="active">
                    <ion-icon name="home-outline"></ion-icon>
                    <span>{{ __("Dashboard") }}</span>
                </a>
            </li>
            {{-- <li>
                <a href="{{ route('profiles.index') }}">
                    <ion-icon name="body-outline"></ion-icon>
                    <span>{{ __("Profile") }}</span>
                </a>
            </li> --}}

           

            @include("layouts.sidebars." . Auth::user()->user_type)

            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                    <ion-icon name="log-out-outline"></ion-icon>
                    <span>{{ __("Logout") }}</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
        <!-- End::nav -->
    </nav>
    <!-- End::main-sidebar -->

</aside>
