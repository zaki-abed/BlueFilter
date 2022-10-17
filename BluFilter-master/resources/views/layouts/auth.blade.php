<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>@yield('title')</title>

        <meta content="ElementCore Admin Panel Template" name="description" />
        <meta content="Element Media" name="author" />
        <link rel="shortcut icon" href="{{ asset('back/images/favicon.ico') }}">

        <link href="{{ asset('back/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('back/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('back/css/icons.css') }}" rel="stylesheet" type="text/css">
        @if(config('site_locale') == 'ar')
            <link href="{{ asset('back/css/style_rtl.css') }}" rel="stylesheet" type="text/css">
        @else
            <link href="{{ asset('back/css/style.css') }}" rel="stylesheet" type="text/css">
        @endif
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
        <script src=" {{ asset('back/js/jquery.min.js') }}"></script>
        <script src=" {{ asset('back/js/metismenu.min.js') }}"></script>
        <script src=" {{ asset('back/js/bootstrap.bundle.min.js') }}"></script>
        <script src=" {{ asset('back/js/jquery.slimscroll.js') }}"></script>
        <script src=" {{ asset('back/js/waves.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('back/js/app.js') }}"></script>
    </body>
</html>
