<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="keywords" content="{{ get_option('site_kw') }}" />
        <meta name="description" content="{{ get_option('about') }}" />
        <meta name="about" content="{{ get_option('about') }}" />
        <meta name="author" content="BrownPortal NG">
        <meta name="twitter:description" content="{{ get_option('description') }}" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="mobile-web-app-capable" content="yes" />
        <meta property="og:description" content="{{ get_option('description') }}" />
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="AppTest - BrownPortal NG" />

        <link rel="shortcut icon" href="{{ get_favicon('favicon') }}" type="image/x-icon">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'BrownPortal NG') }}:: @yield('title') </title>

        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


        <link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.8/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/fc-5.0.1/kt-2.12.1/r-3.0.2/sc-2.4.3/sp-2.3.1/datatables.min.css" rel="stylesheet">

        <!-- Bootstrap core CSS     -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">


        {{--
        <link href="{{ asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet"> --}}
        <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
        {{--
        <link href="{{ asset('css/common.css') }}" rel="stylesheet"> --}}
        <!-- Dropify -->
        {{-- <link href="{{ asset('css/dropify.css') }}" rel="stylesheet"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"/>
        <!-- Quill Snow -->

        {{--
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet"> --}}

        <!-- Select2 -->
        {{--
        <link href="{{ asset('css/summernote.css') }}" rel="stylesheet"> --}}
        <link href="{{ asset('css/select2.css') }}" rel="stylesheet">


        <link href="{{ asset('css/nice-select.css') }}" rel="stylesheet">

        <!-- Include stylesheet -->
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />

        <!-- Scripts -->
        @vite([
        'resources/sass/backend.scss',
        'resources/sass/mobile.scss',
        // 'resources/js/app.js',
        ])

        <link rel="stylesheet" href="{{ asset('css/backend.css') }}">


        <!-- Toastr -->
        <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/mobile.css') }}">
    </head>

    <body>

        <!-- Preloader -->
        @include('layouts.components.preloader')
        <!-- Preloader -->

        <!-- Ajax Modal -->
        @include('layouts.components.ajax_modal')
        <!-- Ajax Modal -->
        <div class="app-page">
            <!-- Start::app-header -->
            @include('layouts.components.header')
            <!-- End::app-header -->

            <!-- Start::app-sidebar -->
            @include('layouts.components.aside')
            <!-- End::app-sidebar -->

            <main class="app-content">
                <div class="container px-3">
                    <!-- Start::page-breadcrumb -->
                    @include('layouts.components.breadcrumbs')
                    <!-- End::page-breadcrumb -->
                </div>
                <div class="container">
                    @yield("content")
                </div>
            </main>
        </div>

        <!-- Overlap -->
        <div class="overlay"></div>


        <!-- Scroll To Top -->
        @include('layouts.components.scrollToTop')
        <!-- Scroll To Top -->

        <!--   JS Files   -->
        <script type="text/javascript" src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>

        <!--   Bootstrap JS    -->
        <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.8/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/fc-5.0.1/kt-2.12.1/r-3.0.2/sc-2.4.3/sp-2.3.1/datatables.min.js"></script>



        <!--   JS Toastr   -->
        <script src="{{ asset('js/toastr.min.js') }}"></script>

        <!-- Include the Quill library -->
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

        {{-- <script>
            const quill = new Quill('#editor', {
            theme: 'snow'
          });
        </script> --}}

        <!--   QUILL SNOW JS   -->
        {{-- <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script> --}}

        <script type="text/javascript" src="{{ asset('js/quill-editor.js') }}"></script>

        <!--   JS Select2   -->
        <script src="{{ asset('js/select2.min.js') }}"></script>

        <!--   JS Mask   -->
        <script type="text/javascript" src="{{ asset('js/jquery.mask.min.js') }}"></script>

        <!--   JS Files   -->

        <!--   JS Files   -->
        <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
        {{-- <script type="text/javascript" src="{{ asset('js/summernote.js') }}"></script> --}}
        {{-- <script src="{{ asset('js/dropify.min.js')}}"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" ></script>

        <!--   Core JS Files   -->

        <script src="{{ asset('js/jquery.nice-select.js')}}"></script>

        {{-- <script src="{{ asset('js/dropify.js')}}"></script> --}}

        <script src="{{ asset('js/script.js')}}"></script>

        <!-- Ion Icon -->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

        <!-- JS -->
        @yield('js-script')

        <script type="text/javascript">
            $(function () {
                $(".data-table").DataTable({
                    // searching: true,
                    // paging: true,
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
                    // "first": "{{ __('1') }}",
                    // "last": "{{ __('...') }}",
                    "next": "{{ '>' }}",
                    "previous": "{{ '<' }}" }, "aria" : { "sortAscending" : ": activate to sort column ascending" , "sortDescending" : ": activate to sort column descending" } },
                    dom: 'Bfrtilp' ,
                });
            });
        </script>

        @if (Session::has("success"))
        <script>
            toastr.success("{{ session("success") }}")
        </script>
        @endif
        @if (Session::has("warning"))
        <script>
            toastr.warning("{{ session("warning") }}")
        </script>
        @endif
        @if (Session::has("info"))
        <script>
            toastr.info("{{ session("info") }}")
        </script>
        @endif
        @if (Session::has("error"))
        <script>
            toastr.error("{{ session("error") }}")
        </script>
        @endif

        <script>
            <?php $i = 0; ?>

            @foreach ($errors->all() as $error)
            Command: toastr["error"]("{{ $error }}");

            var name = "{{ $errors->keys()[$i] }}";

            $("input[name='" + name + "']").addClass('error');
            $("select[name='" + name + "'] + span").addClass('error');

            $("input[name='" + name + "'], select[name='" + name + "']").parent().append("<span class='v-error'>{{ $error }}</span>");

            <?php $i++; ?>
            @endforeach

             function newYear(elem) {
                if ($(elem).val() == "") {
                    return;
                }
                window.location = "<?php echo url('administration/change_session'); ?>/" + $(elem).val();
            }
            if ($(".notification-items").has("li").length === 0) {
                $(".notification-items").append("<li><a href='#'>No Message Found !</a></li>");
            }
        </script>



    </body>

</html>
