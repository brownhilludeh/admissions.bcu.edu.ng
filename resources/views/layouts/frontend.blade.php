<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="keywords" content="cbt, online exams, online test, cbt app, portal, school portal" />
        <meta name="description" content="BrownPortal Appptest is an online examination or computer based test application which make exams and test faster and better." />
        <meta name="author" content="BrownPortal NG">
        <meta name="twitter:description" content="AppTest is a BrownPortal NG software developed to ease paper and school stress" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="mobile-web-app-capable" content="yes" />
        <meta property="og:description" content="AppTest is a BrownPortal NG software developed to ease paper and school stress" />
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="AppTest - BrownPortal NG" />
        <link rel="shortcut icon" href="{{ get_favicon('favicon') }}" type="image/x-icon">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'BrownPortal NG') }}:: @yield('title') </title>

        <!-- Bootstrap core CSS     -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

        <!-- Scripts -->
        @vite([
        'resources/sass/app.scss',
        'resources/sass/frontend.scss',
        'resources/sass/mobile.scss',
        'resources/js/script.js'
        ])

        <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
        <link rel="stylesheet" href="{{ asset('css/mobile.css') }}">
    </head>

    <body>
        <!-- Preloader -->
        @include('layouts.components.preloader')
        <!-- Preloader -->

        <main class="content">
            <div class="frontend-wrapper">
                <div class="frontend-image">
                    <img src="{{ asset('images/backgrounds/background.jpg') }}" alt="background Image" class="bg-image">
                </div>
                <div class="frontend-content">
                    @yield('content')
                </div>
            </div>
        </main>

        <!-- Scroll To Top -->
        <div class="scrollToTop">
            <span class="lh-1">
                <ion-icon name="arrow-up-circle-outline"></ion-icon>
            </span>
        </div>
        <!-- Scroll To Top -->


        <!--   JS Files   -->
        <script type="text/javascript" src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
        <!--   Bootstrap JS   -->
        <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>

        <!--   Core JS Files   -->
        <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

        <!-- Ion Icon -->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

        <!-- JS -->
        @yield('js-script')

    </body>

</html>