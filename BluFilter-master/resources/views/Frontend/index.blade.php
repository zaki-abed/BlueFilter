<!doctype html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BlueFilter - بلو فلتر</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .footer_social.mt-4 {
            padding-top: 2%;
        }
    </style>
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <!-- CSS here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css"
        integrity="sha512-usVBAd66/NpVNfBge19gws2j6JZinnca12rAe2l+d+QkLU9fiG02O1X8Q6hepIpr/EYKZvKx/I9WsnujJuOmBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/blog-style.css">
    <link href="{{ asset('vendor/plugins/sweet-alert2/sweetalert2.css') }}" rel="stylesheet" type="text/css">
    @if (app()->getlocale() == 'ar')
        <?php $generallang = 'Ar';
        $dir = 'rtl'; ?>
        <link rel="stylesheet" href="assets/css/style-rtl.css">
    @else
        <?php $generallang = 'En';
        $dir = 'ltr'; ?>
        <link rel="stylesheet" href="assets/css/style-ltr.css">
    @endif
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body id="Home">
    <div class="overlay"></div>
    <header>
        <div class="header_area">
            <div class="container">
                <div class="header_wrapper d-flex justify-content-between align-items-center">
                    <div class="logo_area">
                        <a href="{{ url('/' . app()->getlocale()) }}"><img src="assets/img/header/logo.svg"
                                alt=""></a>
                    </div>
                    <div class="menu_wrapper d-flex align-items-center">
                        <div class="mobile_bar">
                            <span class="bar">
                                <i class="far fa-bars"></i>
                            </span>
                        </div>
                        <div class="menu_area">
                            <ul class="d-flex align-items-center">
                                <li><a href="{{ url('/' . app()->getlocale()) }}">{{ __('frontend.home') }}</a></li>
                                <li><a class="active"
                                        href="{{ url('/' . app()->getlocale() . '#Steps_Section') }}">{{ __('frontend.Steps_Title') }}</a>
                                </li>
                                <li><a
                                        href="{{ url('/' . app()->getlocale() . '#About_Section') }}">{{ __('frontend.About_us') }}</a>
                                </li>
                                <li><a
                                        href="{{ url('/' . app()->getlocale() . '#Vision_Section') }}">{{ __('frontend.Our_Vision') }}</a>
                                </li>
                                <li id="Blog_Item"><a
                                        href="{{ url('/' . app()->getlocale() . '#Blog_Section') }}">{{ __('frontend.Blog') }}</a>
                                </li>
                                <li><a
                                        href="{{ url('/' . app()->getlocale() . '#ads_Section') }}">{{ __('frontend.Ads') }}</a>
                                </li>
                                <li><a
                                        href="{{ url('/' . app()->getlocale() . '#Subscribe_Section') }}">{{ __('frontend.Subscribe') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="country_area dropdown">
                            <button class="country_wrapper dropdown-toggle" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img @if ($generallang == 'En') src="assets/img/header/en.png" @else src="assets/img/header/ps.png" @endif
                                    style="padding-bottom: 2px;" alt="">
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                @if ($generallang == 'En')
                                    <li><a class="dropdown-item" href="{{ url('/en') }}"><img
                                                src="assets/img/header/en.png" alt="">English</a></li>
                                    <li><a class="dropdown-item" href="{{ url('/ar') }}"><img
                                                src="assets/img/header/ps.png" alt="">العربية</a></li>
                                @else
                                    <li><a class="dropdown-item" href="{{ url('/ar') }}"><img
                                                src="assets/img/header/ps.png" alt="">العربية</a></li>
                                    <li><a class="dropdown-item" href="{{ url('/en') }}"><img
                                                src="assets/img/header/en.png" alt="">English</a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="login_area">
                            <a class="sign_up_btn" href="/login"><span><img src="assets/img/header/user.svg"
                                        alt=""></span>{{ __('frontend.cpanel') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <section class="banner_area position-relative" id="download"
            style="background-image: url('assets/img/banner/banner_bg.png');">
            <img class="abs_img sh_1 rellax" src="assets/img/shaps/sh_1.png" alt="">
            <img class="abs_img sh_2 rellax" src="assets/img/shaps/sh_2.png" alt="">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-6">
                        <div class="banner_content">
                            <h2>{{ $settings->value['Home_Page_Title_' . $generallang] }}</h2>
                            <p>{{ $settings->value['Home_Page_Description_' . $generallang] }}</p>
                            <div class="store_btns mt-20 text-center">
                                <a href="https://apps.apple.com/us/app/blue-filter/id1617701866 "><img
                                        src="assets/img/banner/button-app.svg" alt="Apple App Store"></a>
                                <a href="https://play.google.com/store/apps/details?id=com.accessline.blue_filter"><img
                                        src="assets/img/banner/button-play.svg" alt="Google Play Store"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="banner_app_img">
                            <img src="assets/img/banner/mobiles.png" alt="">
                            <img class="image_shadow" src="assets/img/banner/Shadow.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <img class="banner_bottom_shape" src="assets/img/banner/Wave.svg" alt="">
        </section>
        <section id="Steps_Section" class="works_area position-relative">
            <img class="abs_img sh_3 rellax" src="assets/img/shaps/sh_3.png" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="how_works_wrapper">
                            <div class="area_title mb-55">
                                <h2>{{ __('frontend.Steps_Title') }}</h2>
                                <div class="gray_text" style="left:0;">
                                    <span>{{ __('frontend.Steps_Title') }}</span>
                                </div>
                            </div>
                            <div class="works_step_wrapper d-flex justify-content-between flex-wrap">
                                <div class="single_step_item step_1_img">
                                    <div class="step_works_img">
                                        <span><img src="assets/img/works/search.svg" alt=""></span>
                                    </div>
                                    <div class="step_works_content">
                                        <h4>{{ $howtouse->value['howtouse1name_' . $generallang] }}</h4>
                                        <p>{{ $howtouse->value['howtouse1info_' . $generallang] }}</p>
                                    </div>
                                </div>
                                <div class="single_step_item step_2_img">
                                    <div class="step_works_img another_arrow">
                                        <span><img src="assets/img/works/cart.svg" alt=""></span>
                                    </div>
                                    <div class="step_works_content">
                                        <h4>{{ $howtouse->value['howtouse2name_' . $generallang] }}</h4>
                                        <p>{{ $howtouse->value['howtouse2info_' . $generallang] }}</p>

                                    </div>
                                </div>
                                <div class="single_step_item step_3_img">
                                    <div class="step_works_img">
                                        <span><img src="assets/img/works/hand.svg" alt=""></span>
                                    </div>
                                    <div class="step_works_content">
                                        <h4>{{ $howtouse->value['howtouse3name_' . $generallang] }}</h4>
                                        <p>{{ $howtouse->value['howtouse3info_' . $generallang] }}</p>

                                    </div>
                                </div>
                                <div class="single_step_item step_4_img">
                                    <div class="step_works_img no_arrow">
                                        <span><img src="assets/img/works/bag.svg" alt=""></span>
                                    </div>
                                    <div class="step_works_content">
                                        <h4>{{ $howtouse->value['howtouse4name_' . $generallang] }}</h4>
                                        <p>{{ $howtouse->value['howtouse4info_' . $generallang] }}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="About_Section" class="members_area pt-110 position-relative">
            <img class="abs_img sh_4 rellax" src="assets/img/shaps/sh_4.png" alt="">
            <img class="abs_img sh_5 rellax" src="assets/img/shaps/sh_5.svg" alt="">
            <img class="members_wave" src="assets/img/members/Wave.svg" alt="">
            <div class="member_one">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="member_img">
                                <img src="assets/img/members/Phone.png" alt="" style="object-fit: contain;">
                                <img class="phone_shadow" src="assets/img/members/Shadow.svg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="members_content">
                                <div class="area_title">
                                    <h2>{{ __('frontend.About_us') }}</h2>
                                    <div class="gray_text">
                                        <span></span>
                                    </div>
                                </div>
                                <h3>{{ __('frontend.About_us_Subtitle') }}</h3>
                                <p style="margin-top: 23px"> {{ $aboutus->value['about_us_' . $generallang] }}</p>
                                <a href=""
                                    class="d-none btn members_btn">{{ __('frontend.Next_Section') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="Vision_Section" class="member_tow position-relative">
            <img class="abs_img sh_6 rellax" src="assets/img/shaps/sh_6.svg" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-6 order-2 order-md-1">
                        <div class="members_content">
                            <div class="area_title">
                                <h2>{{ __('frontend.Our_Vision') }}</h2>
                                <div class="gray_text">
                                    <span>{{ __('frontend.Our_Vision') }}</span>
                                </div>
                            </div>
                            <h3>{{ $vision->value['Vision_Title_' . $generallang] }}</h3>
                            <p>{{ $vision->value['Vsion_Description_' . $generallang] }}</p>
                            <a href="#download" class="btn members_btn">{{ __('frontend.Download_Now') }}</a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 order-1 order-md-1">
                        <div class="member_img_bottom position-relative">
                            <img class="blue_filter" src="assets/img/members/blufilter.png" alt="">
                            <img class="blue_filter_2" src="assets/img/members/bluefilter_2.png" alt="">
                            <img class="member_shape_2" src="assets/img/members/image_shape_1.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div id="Stats_Section" class="feature_area position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section_title area_title text-center mb-100">
                            <h2>{{ __('frontend.Stats') }}</h2>
                            <div class="gray_text">
                                <span>{{ __('frontend.Stats') }}</span>
                            </div>
                        </div>
                        <div class="counter_wrapper d-flex justify-content-center">
                            <div class="single_counter_item">
                                <div class="counter_icon">
                                    <span><img src="assets/img/counter/counter.svg" alt=""></span>
                                </div>
                                <div class="countent_content">
                                    <h2 class="counter">{{ $settings->value['download_counter'] }}</h2>
                                    <p>{{ __('frontend.Stats_Downloads') }}</p>
                                </div>
                            </div>
                            <div class="single_counter_item">
                                <div class="counter_icon">
                                    <span><img src="assets/img/counter/counter.svg" alt=""></span>
                                </div>
                                <div class="countent_content">
                                    <h2 class="counter">{{ $user }}</h2>
                                    <p>{{ __('frontend.Stats_Users') }}</p>
                                </div>
                            </div>
                            <div class="single_counter_item">
                                <div class="counter_icon">
                                    <span><img src="assets/img/counter/counter.svg" alt=""></span>
                                </div>
                                <div class="countent_content">
                                    <h2 class="counter">{{ $postcount }}</h2>
                                    <p>{{ __('frontend.Stats_Articles') }}</p>
                                </div>
                            </div>
                            <div class="single_counter_item">
                                <div class="counter_icon">
                                    <span><img src="assets/img/counter/counter.svg" alt=""></span>
                                </div>
                                <div class="countent_content">
                                    <h2 class="counter">{{ $ads->count() }}</h2>
                                    <p>{{ __('frontend.Stats_ads') }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <section id="Features_Section" class="video_area pt-30 pb-200 position-relative">
            <img class="abs_img sh_7 rellax" src="assets/img/shaps/sh_7.png" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="video_wrapper d-flex position-relative">
                            <img class="abs_img sh_8" src="assets/img/shaps/sh_8.png" alt="">
                            <div class="video_left_area video_content">
                                <div class="video_title area_title">
                                    <h2>{{ $features->value['Main_Feature_Title1_' . $generallang] }}</h2>
                                    <div class="gray_text">
                                        <span>{{ $features->value['Main_Feature_Title1_' . $generallang] }}</span>
                                    </div>
                                </div>
                                <div class="mobile_area_img">
                                    <img src="assets/img/video_area/video_img.png" alt="">
                                </div>
                            </div>
                            <div class="video_center_area">
                                <div class="video_center_content_single text-center">

                                    <h4>{{ $features->value['Feature_Title1_' . $generallang] }}</h4>
                                    <p>{{ $features->value['Feature_Description1_' . $generallang] }}</p>

                                </div>
                                <div class="video_center_content_single text-center">
                                    <h4>{{ $features->value['Feature_Title2_' . $generallang] }}</h4>
                                    <p>{{ $features->value['Feature_Description2_' . $generallang] }}</p>

                                </div>
                                <div class="video_center_content_single text-center">
                                    <h4>{{ $features->value['Feature_Title3_' . $generallang] }}</h4>
                                    <p>{{ $features->value['Feature_Description3_' . $generallang] }}</p>

                                </div>
                            </div>
                            <div class="video_right_area video_content">
                                <div class="video_title area_title">
                                    <h2>{{ $features->value['Main_Feature_Title2_' . $generallang] }}</h2>
                                    <div class="gray_text">
                                        <span>{{ $features->value['Main_Feature_Title2_' . $generallang] }}</span>
                                    </div>
                                </div>
                                <div class="mobile_area_img">
                                    <img src="assets/img/video_area/video_img_2.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Blog Section --}}
        <section id="Blog_Section" class="blog_area pt-100 pb-80 position-relative">
            <img class="abs_img sh_9 rellax" src="assets/img/shaps/sh_9.png" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section_title area_title text-center mb-40">
                            <h2>{{ __('frontend.Blog') }}</h2>
                            <div class="gray_text">{{ __('frontend.Blog') }}</div>
                        </div>
                    </div>
                </div>
                <div id="owl-carousel1" class="owl-carousel owl-theme">
                    @foreach (\App\Models\Post::where('lang', app()->currentLocale())->where('published', true)->orderBy('Created_At', 'DESC')->get() as $post)
                        <div class="item">
                            <div class="single_blog_area">
                                <div class="blog_thumb">
                                    <img src="{{ asset($post->featured_image) }}"
                                        style="height: 250px;object-fit: cover;width: 100%;" alt="">
                                </div>
                                <div class="blog_content">
                                    <h3 dir="{{ $dir }}"
                                        style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><a
                                            href="{{ url('/post/' . app()->currentLocale() . '/' . $post->id) }}">{{ $post->title }}</a>
                                    </h3>
                                    {{-- href="{{ url('\url\'.$post->id) }}" --}}
                                    <p dir="{{ $dir }}"
                                        style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">
                                        {{ $post->brief }} </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        {{-- Ads Section --}}
        <section id="ads_Section" class="blog_area pt-100 pb-80 position-relative">
            <img class="abs_img sh_9 rellax" src="assets/img/shaps/sh_9.png" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section_title area_title text-center mb-40">
                            <h2>{{ __('frontend.Ads') }}</h2>
                            <div class="gray_text">{{ __('frontend.Ads') }}</div>
                        </div>
                    </div>
                </div>
                <div id="owl-carousel2" class="owl-carousel owl-theme">
                    @foreach (\App\Models\Ads::where('lang', app()->currentLocale())->orderBy('Created_At', 'DESC')->get() as $ad)
                        <div class="item">
                            <div class="single_blog_area">
                                <div class="blog_thumb">
                                    <img src="{{ asset($ad->featured_image) }}"
                                        style="height: 250px;object-fit: cover;width: 100%;" alt="">
                                </div>
                                <div class="blog_content">
                                    <h3 dir="{{ $dir }}"
                                        style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><a
                                            href="{{ url('/ads/' . app()->currentLocale() . '/' . $ad->id) }}">{{ $ad->title }}</a>
                                    </h3>
                                    {{-- href="{{ url('\url\'.$post->id) }}" --}}
                                    <p dir="{{ $dir }}"
                                        style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">
                                        {{ $ad->brief }} </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- blog_area_End -->
        <!-- service_area -->
        <!-- <section class="service_area position-relative" style="background-image: url('assets/img/service/Base.png');">
            <img class="service_shape" src="assets/img/service/Wave.svg" alt="">
            <img class="sh_10 abs_img rellax" src="assets/img/shaps/sh_10.svg" alt="">
            <img class="sh_11 abs_img rellax" src="assets/img/shaps/sh_10.svg" alt="">
            <img class="service_mobo_img d-md-none d-lg-none" src="assets/img/Hero.png" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 order-2 order-md-1">
                        <div class="service_content mt-200">
                            <h2>OneTouch safety service</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Consequat proin dui nulla tellus nibh netus leo eu. Pulvinar pellentesque aliquet vivamus vel. Massa faucibus proin metus, feugiat. Molestie bibendum scelerisque vulputate malesuada ac vulputate lobortis suspendisse duis. Turpis ullamcorper mi augue eget bibendum quis pellentesque integer fermentum.</p>
                            <div class="service_store">
                                <a href=""><img src="assets/img/banner/button-app.svg" alt=""></a>
                                <a href=""><img src="assets/img/banner/button-play.svg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 order-1 order-md-2">
                        <div class="hand_mobile_area">
                            <div class="hand_mobile position-relative">
                                <img class="mobo_none" src="assets/img/service/hand.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- service_area_end -->
        <!-- member_3 -->
        <!-- <section class="members_area members_three pt-110 position-relative">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="member_img">
                                <img src="assets/img/members/member_3.svg" alt="">
                                <img class="phone_shadow" src="assets/img/members/Shadow.svg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="members_content">
                                <div class="area_title">
                                    <h2>Mitglieder erreichen</h2>
                                    <div class="gray_text">
                                        <span>Mitglieder erreichen</span>
                                    </div>
                                </div>
                                <h3>Push-Nachrichten auf das Smartphone</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Consequat proin dui nulla tellus nibh netus leo eu. Pulvinar pellentesque aliquet vivamus vel. Massa faucibus proin metus, feugiat. Molestie bibendum scelerisque vulputate malesuada ac vulputate lobortis suspendisse duis. Turpis ullamcorper mi augue eget bibendum quis pellentesque integer fermentum.</p>

                                <a href="" class="btn members_btn">Go to start</a>
                            </div>
                        </div>
                    </div>
                </div>
        </section> -->
        <!-- member_3 -->



        <!-- footer_content -->
        <section id="Subscribe_Section" class="footer_content position-relative"
            style="background-image: url('assets/img/Wave.png');">
            <img class="abs_img sh_12 rellax" src="assets/img/shaps/sh_2.png" alt="">
            <section class="newsletter_area">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 d-flex justify-content-center">
                            <div class="newsletter_wrap text-center ">
                                <h2>{{ __('frontend.Subscribe_Title') }}</h2>

                                <div class="input_area">
                                    <div class="container">
                                        <form id="sendform" method="POST" action="">
                                            <div class="row">

                                                <div class="col-sm">
                                                    <input type="text" id="name" name="name"
                                                        style="width: 100%"
                                                        placeholder="{{ __('frontend.Subscribe_Name') }}">

                                                </div>
                                                <div class="col-sm">
                                                    <input type="email" id="email" name="email"
                                                        style="width: 100%"
                                                        placeholder="{{ __('frontend.Subscribe_Email') }}">

                                                </div>

                                            </div>
                                            <button type="submit">{{ __('frontend.Subscribe_Submit') }}</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer_cotnent_wrapper text-center">
                            <div class="footer_social mt-4">
                                <a href="{{ $settings->value['facebook'] ?? '' }}" target="_blank"><i
                                        class="fab fa-facebook"></i></a>
                                <a href="{{ $settings->value['youtube'] ?? '' }}" target="_blank"><i
                                        class="fab fa-youtube"></i></a>
                                <a href=""><i
                                        class="fa fa-phone me-2"></i>{{ $settings->value['phone'] ?? '' }}</a>
                                <a href=""><i class="fa fa-envelope me-2"></i>
                                    {{ $settings->value['email'] ?? '' }}</a>
                            </div>
                            <div class="copyright_area">
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
        <a href="{{ url('/' . app()->getlocale() . '#Home') }}" id="GoBackTop" title="Go to top"><i
                class="fas fa-arrow-up"></i></a>
    </main>

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
    <script src="{{ asset('assets/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('vendor/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('vendor/assets/pages/sweet-alert.init.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/sweetAlert.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip({
                animated: 'fade',
                html: true
            })
        })

        var rellax = new Rellax('.rellax', {
            speed: 5,
            center: true
        });

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
        $(document).ready(function() {
            var getUrl = window.location;
            var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0];

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#sendform").validate({
                rules: {
                    "name": {
                        required: true,
                    },
                    "email": {
                        required: true,
                    }

                },
                messages: {
                    "name": {
                        required: "{{ __('validation.required') }}"
                    },
                    "email": {
                        required: "{{ __('validation.required') }}"
                    }
                },
                submitHandler: function(form) {

                    addform();
                    return false;
                }
            });

            //------------add page------------
            function addform() {
                var fd = new FormData();

                fd.append('name', $('#name').val());
                fd.append('email', $('#email').val());
                fd.append("_token", "{{ csrf_token() }}"),


                    $.ajax({
                        url: baseUrl + "form",
                        type: "POST",
                        processData: false,
                        contentType: false,
                        data: fd,
                        success: function(response) {
                            if (response.status) {

                                swal({
                                    title: '{{ __('messages.subscribe.added') }}',
                                    text: response.message,
                                    type: 'success',
                                    confirmButtonClass: 'btn btn-success',
                                    confirmButtonText: '{{ __('messages.ok') }}'
                                }).then(function() {
                                    location.reload();
                                })
                            } else {
                                var errors_msgs = response.message;
                                var error_msg = '{{ __('messages.general.somthingwentwrong') }}';
                                if (errors_msgs.length != 0) {
                                    for (const x in errors_msgs) {
                                        for (var i = 0; i < errors_msgs[x].length; i++) {
                                            error_msg += '<br>' + errors_msgs[x][i];
                                        }
                                    }
                                }
                                errorAlert(error_msg);

                            }
                        },
                        error: function(err) {
                            var errors_msgs = err.responseJSON.errors;
                            var error_msg = '{{ __('messages.general.somthingwentwrong') }}';
                            if (errors_msgs.length != 0) {
                                for (const x in errors_msgs) {
                                    for (var i = 0; i < errors_msgs[x].length; i++) {
                                        error_msg += '<br>' + errors_msgs[x][i];
                                    }
                                }
                            }
                            errorAlert(error_msg);
                            return;
                        }
                    });
            }
        });
    </script>

</body>

</html>
