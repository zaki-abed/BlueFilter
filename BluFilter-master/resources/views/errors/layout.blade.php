<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
        <meta content="Themesdesign" name="author" />
        <link rel="shortcut icon" href="{{ asset('back/images/favicon.ico') }}">

        <title>{{ __('Error') }} @yield('code')</title>

        <link href="{{ asset('back/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('back/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('back/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('back/css/style.css') }}" rel="stylesheet" type="text/css">

    </head>

    <body>

        <!-- Begin page -->
        <div class="error-bg"></div>
        <div class="home-btn d-none d-sm-block">
            <a href="{{ route('home') }}" class="text-white">
                <i class="fas fa-home h2"></i></a>
        </div>

        <div class="account-pages">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8">
                        <div class="card shadow-lg">
                            <div class="card-block">
                                <div class="text-center p-3">
                                    @yield('content')
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- END wrapper -->

        <!-- jQuery  -->
        <script src="{{ asset('back/js/jquery.min.js') }}"></script>
        <script src="{{ asset('back/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('back/js/metismenu.min.js') }}"></script>
        <script src="{{ asset('back/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('back/js/waves.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('back/js/app.js') }}"></script>

    </body>

</html>
