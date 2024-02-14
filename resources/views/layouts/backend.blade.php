<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name', 'British Canadian University')}} :: @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


  </head>

  <body>
    <!-- Preloader -->
    <div class="loader">
      <div class="triple-spinner"></div>
    </div>

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

      <!-- Navbar-->
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
          {{-- <img src="{{ get_logo() }}" alt="logo"> --}}
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
          {{-- @include("layouts.sidebars." . Auth::user()->user_type) --}}
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
                {{-- {{ get_option('version') }} --}}
              </a>
              {{-- <p>© {{ get_academic_year() }}</p> --}}
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
  </body>
  <footer class="footer">
    <div class="row ">
      <div class="col-12 text-center">
        &copy;
        <script>
          document.write( new Date().getUTCFullYear() );
        </script>

        | brownportal ng
      </div>
    </div>
  </footer>

  <!--  JQuery    -->
  <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/print.js') }}"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

  <!-- JS -->
  @yield('js-script')


  <script>
    window.addEventListener("load", () => {
            const loader = document.querySelector(".loader");
            
            loader.classList.add("loader-hide");
            });
  </script>
  </body>

</html>