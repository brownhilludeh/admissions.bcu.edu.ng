<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name', 'British Canadian University')}} :: @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ootstrap.min.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/bcuBackend.scss',
    'resources/sass/bcuFrontend.scss',
    'resources/sass/bcuMobile.scss',
    'resources/js/bcuBScript.js',
    'resources/js/bcuFScript.js',])


  </head>

  <body>
    <!-- Preloader -->
    <div class="loader">
      <div class="triple-spinner"></div>
    </div>

    <div id="app" class="app">

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