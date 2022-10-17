<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title ?? '' }} | {{ __('Admin Panel') }}</title>
        <meta content="ElementCore Admin Panel Template" name="description" />
        <meta content="Element Media" name="author" />
        <link rel="shortcut icon" href="{{ asset('back/images/favicon.ico') }}">
        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="{{ asset('back/plugins/morris/morris.css') }}">
        <!-- sweet alert -->
        <link href="{{ asset('back/plugins/sweet-alert2/sweetalert2.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('back/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('back/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('back/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('back/css/style.css') }}" rel="stylesheet" type="text/css">
        <!-- DataTables -->
        <link href="{{ asset('back/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('back/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Dropzone css -->
        <link href="{{ asset('back/plugins/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css">
        <style>
            .content {
                max-width: 500px;
                margin: auto;
            }
            .contentRow img {
                border: 0 none;
                display: inline-block;
                height: auto;
                max-width: 100%;
                vertical-align: middle;
            }
        </style>
        <livewire:styles />
        <livewire:scripts />
    </head>
    <body>
        <!-- Begin page -->
        <div id="wrapper">
            <div class="header-bg">
                <header id="topnav">
                    <livewire:partials.topbar />
                    <livewire:partials.menu />
                </header>
            </div>
            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            © {{ date('Y') }} {{ __('messages.general.Framework') }} {{ __(config('app.name')) }} <span
            class="d-none d-sm-inline-block"> {{ __('messages.general.Footer') }}</span>.
        </footer>
        $('.js-example-basic-multiple').select2();

            <!-- jQuery  -->
            <script src=" {{ asset('back/js/jquery.min.js') }}"></script>
            <script src=" {{ asset('back/js/metismenu.min.js') }}"></script>
            <script src=" {{ asset('back/js/bootstrap.bundle.min.js') }}"></script>
            <script src=" {{ asset('back/js/jquery.slimscroll.js') }}"></script>
            <script src=" {{ asset('back/js/waves.min.js') }}"></script>
            <!-- Morris Chart -->
            <script src="{{ asset('back/plugins/morris/morris.min.js') }}"></script>
            <script src="{{ asset('back/plugins/raphael/raphael.min.js') }}"></script>

        {{--        <script src="{{ asset('back/assets/pages/dashboard.init.js') }}"></script> -->--}}

        <!-- Sweet-Alert  -->
            <script src="{{ asset('back/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
            <script src="{{ asset('back/pages/sweet-alert.init.js') }}"></script>
            <script src="{{ asset('back/custom/js/sweetAlert.js') }}"></script>

            <!-- Required datatable js -->
            <script src="{{ asset('back/plugins/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('back/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

            <!-- Buttons examples -->
            <script src="{{ asset('back/plugins/datatables/dataTables.buttons.min.js') }}"></script>
            <script src="{{ asset('back/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('back/plugins/datatables/jszip.min.js') }}"></script>
            <script src="{{ asset('back/plugins/datatables/pdfmake.min.js') }}"></script>
            <script src="{{ asset('back/plugins/datatables/vfs_fonts.js') }}"></script>
            <script src="{{ asset('back/plugins/datatables/buttons.html5.min.js') }}"></script>
            <script src="{{ asset('back/plugins/datatables/buttons.print.min.js') }}"></script>
            <script src="{{ asset('back/plugins/datatables/buttons.colVis.min.js') }}"></script>

            <!-- Responsive examples -->
            <script src="{{ asset('back/plugins/datatables/dataTables.responsive.min.js') }}"></script>
            <script src="{{ asset('back/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

            <!-- Datatable init js -->
            <script src="{{ asset('back/pages/datatables.init.js') }}"></script>
            <!-- App js -->
            <script src="{{ asset('back/js/app.js') }}"></script>
            <script src="{{ asset('back/plugins/parsleyjs/parsley.min.js') }}"></script>
            <!-- Dropzone js -->
            <script src="{{ asset('back/plugins/dropzone/dist/dropzone.js') }}"></script>
            @yield('additional_scripts')
        </div>
    </body>
</html>
