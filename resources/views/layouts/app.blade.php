<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{config('app.name', 'British Canadian University')}} :: @yield('title')</title> --}}
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->

        <!-- CSRF Token -->


        {{--
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> --}}

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>

    <body>
        <!-- Preloader -->
        <div class="preloader" id="preloader">
            <div class="triple-spinner"></div>
        </div>
        <div id="app">
            <main class="py-4">
                <div class="container">
                    <div class="row col-12">
                        <img src="{{ asset('images/logo.png') }}" class="text-center" alt="School Logo" style="height: 80px; width: auto; margin: 1em auto;">
                    </div>
                </div>
                @yield('content')

                <footer class="footer">
                    <div class="row">
                        <div class="col-12 text-center">
                            &copy;
                            <script>
                                document.write( new Date().getUTCFullYear() );
                            </script>
                            | brownportal ng
                        </div>
                    </div>
                </footer>
            </main>
        </div>


        <!--  JQuery    -->
        <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

        <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    </body>

</html>