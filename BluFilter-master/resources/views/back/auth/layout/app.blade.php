<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

        @yield('title')

        <meta content="ElementCore Admin Panel Template" name="description" />
        <meta content="Element Media" name="author" />
{{--        <link rel="shortcut icon" href="assets/images/favicon.ico">--}}

        <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet" type="text/css">

    </head>

    <body>
        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="home-btn d-none d-sm-block">
            <a href="/" class="text-white"><i class="fas fa-home h2"></i></a>
        </div>

        @yield('wrapper-page')
        <!-- END wrapper -->

        <!-- jQuery  -->
        <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('admin/js/metismenu.min.js') }}"></script>
        <script src="{{ asset('admin/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('admin/js/waves.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('admin/js/app.js') }}"></script>

    </body>
</html>
