<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title-->
    <title> {{ get_option('site_title') }} :: @yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ get_logo() }}" sizes="96x96" />

    <!-- Fonts -->
    <!-- Bootstrap core CSS     -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Datatable core CSS     -->
    <link href="{{ asset('public/DataTables/datatables.css') }}" rel="stylesheet" />
    <!-- bootstrap-datepicker library -->
    {{--
    <link href="{{ asset('public/backend') }}/css/bootstrap-datepicker.css" rel="stylesheet" /> --}}
    <!-- Select 2 library -->
    <link href="{{ asset('public/css/select2.css') }}" rel="stylesheet" />
    <!-- Dropify library -->
    <link href="{{ asset('public/css/dropify.min.css') }}" rel="stylesheet" />
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
    <link href="{{ asset('public/css/toastr.min.css') }}" rel="stylesheet">
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
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <link rel="stylesheet" href="{{ asset('public/css/main.css') }}">
  </head>

  <body>
    <!-- Preloader -->
    {{-- <div id="preloader">
      <div class="triple-spinner"></div>
    </div> --}}
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
    <div id="app">
      <!-- Navbar-->
      <nav class="navbar navbar-expand-sm bg-transparent">
        <div class="container-md">

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
              @auth
              @if(Auth::user()->user_type == 'Admin' || Auth::user()->user_type == "SuperAdmin")
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

          <a class="navbar-brand" href="{{ url('/') }}">
            {{ get_option('site_name' ) | 'brownportal' }}
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
            <a href="{{ route('profile') }}">
              <ion-icon name="body-outline"></ion-icon>
              <span>{{ __("Profile") }}</span>
            </a>
          </li>
          @include("layouts.sidebars." . Auth::user()->user_type)
        </ul>

        <!-- Aside Base -->
        <div class="aside-base text-center">
          {{-- <footer> --}}
            <!-- Section: Social media -->
            <section class="text-fade">
              <!-- Whatsapp -->
              <a class="text" href="#!" role="button">
                <ion-icon name="logo-whatsapp"></ion-icon>
              </a>
              <!-- Google -->
              <a class="text" href="#!" role="button">
                <ion-icon name="logo-google"></ion-icon>
              </a>
              <!-- Instagram -->
              <a class="text" href="#!" role="button">
                <ion-icon name="logo-instagram"></ion-icon>
              </a>
              <!-- Github -->
              <a class="text" href="#!" role="button">
                <ion-icon name="logo-github"></ion-icon>
              </a>
              <!-- Facebook -->
              <a class="text" href="#!" role="button">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
              <!-- Linkedin -->
              <a class="text" href="#!" role="button">
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
            {{--
          </footer> --}}
        </div>
        <!-- End of Sidebar -->
      </aside>
      @endauth

      <main class="py-3 main">
        @yield('content')
      </main>

      <footer class="footer mt-4 main">
        <div class="row">
          <div class="col-12 text-center">
            &copy;
            <script>
              document.write( new Date().getUTCFullYear() );
            </script>
            | brownportal ng

            <!-- Section: Social media -->
            <section class="text-fade">
              <!-- Whatsapp -->
              <a class="text" href="#!" role="button">
                <ion-icon name="logo-whatsapp"></ion-icon>
              </a>
              <!-- Google -->
              <a class="text" href="#!" role="button">
                <ion-icon name="logo-google"></ion-icon>
              </a>
              <!-- Instagram -->
              <a class="text" href="#!" role="button">
                <ion-icon name="logo-instagram"></ion-icon>
              </a>
              <!-- Github -->
              <a class="text" href="#!" role="button">
                <ion-icon name="logo-github"></ion-icon>
              </a>
              <!-- Facebook -->
              <a class="text" href="#!" role="button">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
              <!-- Linkedin -->
              <a class="text" href="#!" role="button">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </section>
            <!-- Section: Social media -->
          </div>
        </div>
      </footer>
    </div>

    <!--  JQuery    -->
    <script type="text/javascript" src="{{ asset('public/js/jquery.min.js') }}"></script>
    <!--  Bootstrap JS    -->
    <script type="text/javascript" src="{{ asset('public/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> --}}
    <!--  DataTable Plugin    -->
    <script type="text/javascript" src="{{ asset('public/DataTables/datatables.min.js') }}"></script>
    <!--  Select 2 Plugin    -->
    <script type="text/javascript" src="{{ asset('public/js/select2.min.js') }}"></script>
    <!--  jQuery Validation   -->
    <script type="text/javascript" src="{{ asset('public/js/jquery.validate.min.js') }}"></script>
    <!--  Bootstrap Datepicker  -->
    <script type="text/javascript" src="{{ asset('public/js/bootstrap-datepicker.js') }}"></script>
    <!--  Mask Plugin   -->
    <script type="text/javascript" src="{{ asset('public/js/jquery.mask.min.js') }}"></script>
    <!--  Dropify  -->
    <script type="text/javascript" src="{{ asset('public/js/dropify.min.js') }}"></script>
    <!--  Toastr Plugin  -->
    <script type="text/javascript" src="{{ asset('public/js/toastr.min.js') }}"></script>
    <!--  Print Plugin    -->
    <script type="text/javascript" src="{{ asset('public/js/print.js') }}"></script>
    {{--
    <link rel="stylesheet" href="{{ asset('css/main.css') }}"> --}}

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>

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
    
            function changeSession(elem){
                if($(elem).val() == ""){
                    return;
                }
                window.location = "<?php echo url('change_session') ?>/"+$(elem).val();
            }
    
            if ($(".notification-items").has("li").length === 0) {
            $(".notification-items").append("<li><a href='#'> No Message Found !</a></li>");
            }
        });
    </script>
  </body>

</html>