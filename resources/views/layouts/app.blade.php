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

        <div id="app" class="app">

            {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="school logo" height="32px;" width="auto;">
                        {{ config('app.name', 'bcu.edu.ng') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <ion-icon name="homte-outline"></ion-icon>
                                <a class="nav-link" href="https://bcu.edu.ng" target="_blank">{{ __('Back to website') }}</a>
                            </li>
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav> --}}
            {{-- <iframe width="560" height="315" src="https://www.youtube.com/embed/EVdNpo8Aneo?si=RxSfljJnzc_ZuP2F" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            --}}

            {{-- <iframe width="560" height="315" src="https://www.youtube.com/embed/EVdNpo8Aneo?si=RxSfljJnzc_ZuP2F" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            --}}

            {{-- <iframe width="560" height="315" src="https://www.youtube.com/embed/EVdNpo8Aneo?si=RxSfljJnzc_ZuP2F" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            --}}
            <main class="py-4">
                @yield('content')
            </main>

        </div>

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