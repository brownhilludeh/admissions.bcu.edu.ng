<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>


        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="description" content="{{ get_option('description') }}">
        <meta name="keywords" content="{{ get_option('school_name') }}, {{ get_option('site_title') }}, brownportal, school portal, {{ get_option('keywords') }}">
        <meta name="title" content="{{ get_option('description') }}" />
        <!-- Application Info     -->
        <meta name="author" content="BrownPortal NG">
        <meta name="application-name" content="brownportalng" />
        <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
        <link rel="canonical" href="https://brownportal.com" />
        <!-- Other METAs  -->
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="website" />
        <!-- SEO -->
        <meta property="og:title" content="{{ get_option('site_title') }} - brownportalng" />
        <meta property="og:description" content="{{ get_option('description') }}" />
        <meta property="og:url" content="{{ get_option('site_url') }}" />
        <meta property="og:site_name" content="{{ get_option('site_title') }}" />
        <meta property="og:image:type" content="image/jpeg" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Title-->
        <title> {{ get_option('site_title') }} :: @yield('title')</title>

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ get_logo() }}" sizes="96x96" />

        <!-- Bootstrap core CSS     -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
        <!-- Datatable core CSS     -->
        <link href="{{ asset('DataTables/datatables.css') }}" rel="stylesheet" />


        <!-- bootstrap-datepicker library -->
        {{--
        <link href="{{ asset('public/backend') }}/css/bootstrap-datepicker.css" rel="stylesheet" /> --}}
        <!-- Select 2 library -->
        <link href="{{ asset('css/select2.css') }}" rel="stylesheet" />
        <!-- Dropify library -->
        <link href="{{ asset('css/dropify.min.css') }}" rel="stylesheet" />
        <!--  Quill editor    -->
        {{--
        <link href="{{ asset('public/backend') }}/css/summernote.css" rel="stylesheet" /> --}}
        <!--  Fonts and icons     -->
        {{--
        <link href="{{ asset('public/backend') }}/css/font-awesome.min.css" rel="stylesheet"> --}}
        {{--
        <link href="{{ asset('public/backend') }}/css/fonts.css" rel="stylesheet"> --}}
        {{--
        <link href="{{ asset('public/backend') }}/css/themify-icons.css" rel="stylesheet"> --}}
        <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
        {{--
        <link href="{{ asset('public/backend') }}/css/nice-select.css" rel="stylesheet"> --}}
        {{--
        <link href="{{ asset('public/backend') }}/css/animate.css" rel="stylesheet"> --}}
        {{--
        <link href="{{ asset('public/backend') }}/css/fullcalendar.min.css" rel="stylesheet"> --}}
        {{--
        <link href="{{ asset('public/backend') }}/css/metisMenu.min.css" rel="stylesheet"> --}}
        {{--
        <link href="{{ asset('public/backend') }}/css/bootstrap-datetimepicker.min.css" rel="stylesheet"> --}}
        <!--  Style CSS -->
        {{--
        <link href="{{ asset('public/backend') }}/css/style.css" rel="stylesheet" /> --}}

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{config('app.name', 'British Canadian University')}} :: @yield('title')</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link href="https://cdn.datatables.net/v/bs5/dt-1.13.10/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/kt-2.11.0/r-2.5.0/sl-1.7.0/datatables.min.css" rel="stylesheet">
        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])


    </head>

    <body>

        <div id="app">
            <!-- Main Modal -->
            <div id="main_modal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"></h5>
                            <button type="reset" class="modal-btn btn btn-danger" data-bs-dismiss="modal">
                                <ion-icon name="close-outline"></ion-icon>
                                {{ __('Exit') }}
                            </button>
                        </div>
                        <div class="alert alert-danger" style="display:none; margin: 1em;"></div>
                        <div class="alert alert-success" style="display:none; margin: 1em;"></div>
                        <div class="modal-body" style="overflow:hidden;"></div>
                    </div>
                </div>
            </div>
            <!-- Preloader -->
            <div id="preloader" class="preloader">
                <div class="triple-spinner"></div>
            </div>
            <!-- Navbar-->
            <nav class="navbar navbar-expand-sm bg-transparent">
                <div class="container-md">

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            @auth
                            @if(Auth::user()->user_type == 'Admin' || Auth::user()->user_type == "Super")
                            <li class="nav-link">
                                <select class="select_class " onchange="changeSession(this);">
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
                            </li>
                            @endif
                            @endauth
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            {{-- <div class="mobile-toggle" id="mobile-toggle">
                                <ion-icon name="grid-outline"></ion-icon>
                            </div> --}}
                            <!-- Authentication Links -->
                            {{-- @guest
                            @if (url::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('login') }}">{{ __('Login') }}</a>
                            </li>
                            @endif

                            @if (url::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('logout') }}" onclick="event.preventDefault();
                                                               document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest --}}
                        </ul>

                    </div>

                    <a class="navbar-brand small " style="font-size: .8em;" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <div class="mobile-toggle" id="mobile-toggle">
                        <ion-icon name="grid-outline"></ion-icon>
                    </div>
                </div>
            </nav>

            <!-- Sidebar -->
            @auth
            <aside class="sidebar">
                <!-- Sidebar Brand -->
                <div class="sidebar-brand">
                    <img src="{{ get_logo() }}" alt="logo">
                    <div class="sidebar-close fx1" id="sidebar-close">
                        <ion-icon name="return-up-back"></ion-icon>
                    </div>
                </div>
                <!-- Sidebar User Profile -->
                <div class="sidebar-user">
                    <div class="sidebar-user-info">
                        <a href="#">
                            <img src="{{ asset('storage/uploads/images/' . Auth::user()->image) }}" class="user-image" alt="user">
                        </a>
                        <div class="sidebar-user-bio">
                            <a href="#">{{ auth()->user()->username }}</a>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu">
                    <li>
                        <a href="{{ url('dashboard') }}" class="active">
                            <ion-icon name="home-outline"></ion-icon>
                            <span>{{ __('Dashboard') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url("myProfile") }}">
                            <ion-icon name="body-outline"></ion-icon>
                            <span>{{ __("Profile") }}</span>
                        </a>
                    </li>

                    @include("layouts.menus." . Auth::user()->user_type)

                </ul>

                <!-- Aside Base -->
                <div class="aside-base text-center">
                    <footer>
                        <!-- Section: Social media -->
                        <section class="text-fade">
                            <!-- Whatsapp -->
                            <a class="text" href="#!" role="button">
                                <ion-icon name="logo-whatsapp"></ion-icon>
                                <i class="fab fa-instagram"></i>
                            </a>
                            <!-- Google -->
                            <a class="text" href="#!" role="button">
                                <i class="fab fa-google"></i>
                                <ion-icon name="logo-google"></ion-icon>
                            </a>
                            <!-- Instagram -->
                            <a class="text" href="#!" role="button">
                                <ion-icon name="logo-instagram"></ion-icon>
                                <i class="fab fa-instagram"></i>
                            </a>
                            <!-- Github -->
                            <a class="text" href="#!" role="button">
                                <ion-icon name="logo-github"></ion-icon>
                                <i class="fab fa-github"></i>
                            </a>
                            <!-- Facebook -->
                            <a class="text" href="#!" role="button">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a>
                            <!-- Linkedin -->
                            <a class="text" href="#!" role="button">
                                <i class="fab fa-linkedin-in"></i>
                                <ion-icon name="logo-linkedin"></ion-icon>
                            </a>

                        </section>
                        <!-- Section: Social media -->
                        <!-- Copyright -->
                        <div class="text-center text">
                            <a class="text-success" href="https://brownportal.com/">
                                {{ get_option('version') }}
                            </a>
                            <p>© {{ get_academic_year() }}</p>
                        </div>
                        <!-- Copyright -->
                    </footer>
                </div>
                <!-- End of Sidebar -->
            </aside>
            @endauth

            <main class="main">
                <div class="container-md">
                    <div class="row">
                        <div class="col-12">
                            <div class="ps-3">
                                <ol class="breadcrumb text-black-50 d-flex align-items-baseline ">
                                    <li><a href="{{ url('dashboard') }}">
                                            <ion-icon name="home"></ion-icon>
                                            {{ __('Dashboard') }}
                                        </a>
                                    </li>
                                    @php $segments = ''; @endphp
                                    @foreach (Request::segments() as $segment)
                                    @if ($segment == 'dashboard')
                                    @php continue; @endphp
                                    @endif
                                    @php $segments .= '/'.$segment; @endphp &nbsp
                                    <li>
                                        / <a href="{{ url($segments) }}">{{ ucwords(str_replace('_', ' ', $segment)) }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="ps-sm-3 ps-md-2">
                                @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                                @endif
                                @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                                @endif
                                @if (session('info'))
                                <div class="alert alert-info" role="alert">
                                    {{ session('info') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </main>
        </div>

        <!-- Overlap -->
        <div class="overlay"></div>

        <!-- JS -->
        @yield('js-script')

        <!--  JQuery    -->
        <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
        <!--  Bootstrap JS    -->
        <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <!--  Charts Plugin -->
        {{-- <script type="text/javascript" src="{{ asset('public/backend') }}/js/echarts.min.js"></script> --}}
        <!--  Notifications Plugin    -->
        {{-- <script type="text/javascript" src="{{ asset('public/backend') }}/js/bootstrap-notify.js"></script> --}}
        <!--  DataTable Plugin    -->
        <script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}"></script>
        <!--  Select 2 Plugin    -->
        <script type="text/javascript" src="{{ asset('js/select2.min.js') }}"></script>
        <!--  jQuery Validation   -->
        <script type="text/javascript" src="{{ asset('/js/jquery.validate.min.js') }}"></script>
        <!--  Bootstrap Datepicker  -->
        <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
        <!--  Mask Plugin   -->
        <script type="text/javascript" src="{{ asset('js/jquery.mask.min.js') }}"></script>
        <!--  Summernote editor    -->
        {{-- <script type="text/javascript" src="{{ asset('public/backend') }}/js/summernote.js"></script> --}}
        <!--  Dropify  -->
        <script type="text/javascript" src="{{ asset('js/dropify.min.js') }}"></script>
        <!--  Toastr Plugin  -->
        <script type="text/javascript" src="{{ asset('js/toastr.min.js') }}"></script>
        <!--  Print Plugin    -->
        <script type="text/javascript" src="{{ asset('js/print.js') }}"></script>


        {{-- <script src="{{ asset('public/backend') }}/js/metisMenu.min.js"></script> --}}
        {{-- <script src="{{ asset('public/backend') }}/js/moment.min.js"></script> --}}
        {{-- <script src="{{ asset('public/backend') }}/js/bootstrap-datetimepicker.min.js"></script> --}}

        {{-- <script type="text/javascript" src="{{ asset('public/backend') }}/js/fullcalendar.min.js"></script> --}}

        <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
        {{-- <script type="text/javascript" src="{{ asset('public/backend') }}/js/script.js"></script> --}}

        <!--  IonIcon -->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

        <!-- JS -->
        @yield('js-script')

        <script type="text/javascript">
            $(function() {
            //Show Success Message
            @if (Session::has('success'))
            Command: toastr["success"]("{{ session('success') }}")
            @endif
            
            //Show Single Error Message
            @if (Session::has('error'))
            Command: toastr["error"]("{{ session('error') }}")
            @endif
            
            //Show Alert Message
            @if (Session::has('info'))
                Command: toastr["info"]("{{ session('info') }}")
            @endif
                
                <?php $i = 0; ?>
            
            @foreach ($errors->all() as $error)
                Command: toastr["error"]("{{ $error }}");
                
                var name = "{{ $errors->keys()[$i] }}";
                
                $("input[name='" + name + "']").addClass('error');
                $("select[name='" + name + "'] + span").addClass('error');
                
                $("input[name='" + name + "'], select[name='" + name + "']").parent().append("<span class='v-error'>{{ $error }}</span>");
                
                <?php $i++; ?>
            @endforeach
    
    
            $(".data-table").DataTable({
                searching: true,
                // select: true,
                responsive: true,
                "bAutoWidth": false,
                "ordering": true,
                "language": {
                    "decimal": "",
                    "emptyTable": "{{ __('No Record Found') }}",
                    "info": "",
                    "infoEmpty": "{{ __('Showing 0 To 0 Of 0 Entries') }}",
                    "infoFiltered": "(filtered from _MAX_ total entries)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "",
                    "loadingRecords": "{{ __('Loading...') }}",
                    "processing": "{{ __('Processing...') }}",
                    "search": "{{ __('') }}",
                    "zeroRecords": "{{ __('No matching records found') }}",
                    "paginate": {
                        "first": "{{ __('1') }}",
                        "last": "{{ __('Last') }}",
                        "next": "{{ '>' }}",
                        "previous": "{{ '<' }}"
                    },
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                },
                // dom: 'lBftirp',
                    dom: 'Bfrtipl',
                // dom: '<"top"i>rt<"bottom"flp><"clear">',
    
                // "dom": '<"top"fBtr><"bottom"lip><"clear">',
                buttons: [
                    'excel', 'pdf', 'print', 'copy', 'csv',
                ],
            });

            
             
            // function changeSession(elem){
            //     if($(elem).val() == ""){
            //         return;
            //     }
            //     window.location = "<?php echo url('change_session') ?>/"+$(elem).val();
            // }
    
            // if ($(".notification-items").has("li").length === 0) {
            // $(".notification-items").append("<li><a href='#'> No Message Found !</a></li>");
            // }
        });
        </script>   

    </body>

</html>