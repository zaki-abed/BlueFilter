<!doctype html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BluFilter - بلو فلتر</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">
    @if (app()->getlocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('assets/css/style-rtl.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/style-ltr.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>

<body id="Home">
    <div class="overlay"></div>

    <!-- header_area -->
    <header>
        <div class="header_area">
            <div class="container">
                <div class="header_wrapper d-flex justify-content-between align-items-center">
                    <!-- logo -->
                    <div class="logo_area">
                        <a href=""><img src="{{ asset('assets/img/header/logo.svg') }}" alt=""></a>
                    </div>
                    <!-- logo -->


                    <!-- menu_area_wrapper -->
                    <div class="menu_wrapper d-flex align-items-center">

                        <!-- mobaile_bar -->
                        <div class="mobile_bar">
                            <span class="bar">
                                <i class="far fa-bars"></i>
                            </span>
                        </div>
                        <!-- mobaile_bar_end -->

                        <!-- menu -->
                        <div class="menu_area">
                            <ul class="d-flex align-items-center">
                                <li><a href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                                <li><a class="active"
                                        href="{{ url('/#Steps_Section') }}">{{ __('frontend.Steps_Title') }}</a></li>
                                <li><a href="{{ url('/#About_Section') }}">{{ __('frontend.About_us') }}</a></li>
                                <li><a href="{{ url('/#Vision_Section') }}">{{ __('frontend.Our_Vision') }}</a></li>
                                <li><a href="{{ url('/#Blog_Section') }}">{{ __('frontend.Blog') }}</a></li>
                                <li><a href="{{ url('/#Subscribe_Section') }}">{{ __('frontend.Subscribe') }}</a></li>
                            </ul>
                        </div>
                        <!-- menu -->

                        <!-- cuntry_flag -->
                        <div class="country_area dropdown">
                            <button class="country_wrapper dropdown-toggle" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('assets/img/header/en.png') }}" style="padding-bottom: 2px;"
                                    alt="">
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{ url('/en') }}"><img
                                            src="{{ asset('assets/img/header/en.png') }}" alt="">English</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ url('/ar') }}"><img
                                            src="{{ asset('assets/img/header/ps.png') }}" alt="">العربية</a>
                                </li>
                            </ul>
                        </div>
                        <!-- cuntry_flag_end -->

                        <!-- sign_login -->
                        <div class="login_area">
                            <a class="sign_up_btn" href="/login"><span><img
                                        src="{{ asset('assets/img/header/user.svg') }}"
                                        alt=""></span>{{ __('frontend.cpanel') }}</a>
                        </div>
                        <!-- sign_login_end -->

                    </div>
                    <!-- menu_area_wrapper -->


                </div>
            </div>
        </div>
    </header>
    <!-- header_area_End -->

    <!-- main -->
    <main>

        <!-- banner_area -->
        <section class="banner_area position-relative"
            style="height: 400px; background-image: url('{{ asset('assets/img/banner/banner_bg.png') }}');">
            <img class="abs_img sh_1 rellax" src="{{ asset('assets/img/shaps/sh_1.png') }}" alt="">
            <img class="abs_img sh_2 rellax" src="{{ asset('assets/img/shaps/sh_2.png') }}" alt="">
            <img class="banner_bottom_shape" style="bottom: -1px;" src="{{ asset('assets/img/banner/Wave.svg') }}"
                alt="">
        </section>
        <!-- banner_area_End -->

        <!-- begin_ads_area -->
        <section id="Blog_Section" class="blog_area pt-100 pb-80 position-relative">
            <img class="abs_img sh_9 rellax" src="{{ asset('assets/img/shaps/sh_9.png') }}" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section_title area_title text-center mb-40">
                            <h2 dir="{{ $dir }}">{{ $ads->title }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if ($ads->featured_image)
                        <div class="col-12 text-center mb-5">
                            <img style="max-width: 100%;" 
                                src=" {{ $ads->featured_image }} "alt="Ads Image" 
                                allowfullscreen>
                        </div>
                    @endif
                    
                    <div dir="{{ $dir }}" class="col-12" style="text-align: justify;">
                        {!! $ads->body !!}
                    </div>
                </div>
            </div>
        </section>
        <!-- end_ads_area -->


        <!-- footer_content -->
        <section id="Subscribe_Section" class="footer_content position-relative"
            style="height:350px;padding-top:120px;margin-top:100px;background-image: url('{{ asset('assets/img/Wave.png') }}');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer_cotnent_wrapper text-center pt-1">
                            <div class="footer_social">
                                <a href="https://www.facebook.com/salahelsadi" target="_blank"><i
                                        class="fab fa-facebook"></i></a>
                            </div>
                            <div class="copyright_area" style="margin-bottom:0px;">
                                <p class="copyright-text">{{ __('frontend.copyrights') }}</p>
                                <p class="credits-text">{!! __('frontend.credits') !!}</p>
                                <p class="sponsors-text" hidden>Funded by
                                    <a href="https://gerusalemme.aics.gov.it/" target="_blank" data-toggle="tooltip"
                                        data-placement="top"
                                        title="<img src='{{ asset('assets/img/credits/credits-AICS.png') }}' width='150' alt='AICS' />">AICS</a>
                                    &
                                    <a href="https://fondationassistanceinternationale.ch/" target="_blank"
                                        data-toggle="tooltip" data-placement="top"
                                        title="<img src='{{ asset('assets/img/credits/credits-FAI.png') }}' width='150' alt='FAI' />">FAI</a>.
                                    Service Provided by
                                    <a href="https://www.bethlehem.edu/" target="_blank" data-toggle="tooltip"
                                        data-placement="top"
                                        title="<img src='{{ asset('assets/img/credits/credits-BU.png') }}' width='150' alt='BU' />">BU</a>
                                    |
                                    <a href="https://www.facebook.com/SYB.BBI.YSBC" target="_blank"
                                        data-toggle="tooltip" data-placement="top"
                                        title="<img src='{{ asset('assets/img/credits/credits-BBI.png') }}' width='150' alt='BBI' />">BBI</a>
                                    |
                                    <a href="https://www.facebook.com/SYB.BBI.YSBC" target="_blank"
                                        data-toggle="tooltip" data-placement="top"
                                        title="<img src='{{ asset('assets/img/credits/credits-YSBC.png') }}' width='150' alt='YSBC' />">YSBC</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- footer_content_end -->
        <a href="#Home" id="GoBackTop" title="Go to top"><i class="fas fa-arrow-up"></i></a>

    </main>
    <!-- main_end -->




    <!-- JS here -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"
        integrity="sha512-72WD92hLs7T5FAXn3vkNZflWG6pglUDDpm87TeQmfSg8KnrymL2G30R7as4FmTwhgu9H7eSzDCX3mjitSecKnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/js/rellax.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"
        integrity="sha512-CEiA+78TpP9KAIPzqBvxUv8hy41jyI3f2uHi7DGp/Y/Ka973qgSdybNegWFciqh6GrN2UePx2KkflnQUbUhNIA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.scrollUp.min.js') }}"></script>
    <script>
        var rellax = new Rellax('.rellax', {
            speed: 5,
            center: true
        });

        $(function() {
            $('[data-toggle="tooltip"]').tooltip({
                animated: 'fade',
                html: true
            })
        })

        mybutton = document.getElementById("GoBackTop");
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
    </script>
</body>

</html>
