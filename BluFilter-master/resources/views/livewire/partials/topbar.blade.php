<div class="topbar-main">
    <div class="container-fluid">
        <div>
            <a href="{{ url('/') }}" class="logo">
                <span class="logo-light">
                    <i class="mdi mdi-camera-control"></i> {{ __('messages.general.Framework') }}
                </span>
            </a>
        </div>
        <div class="menu-extras topbar-custom navbar p-0">
            <ul class="navbar-right ml-auto list-inline float-right mb-0">
                @if(Auth::user())
                <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                    @if(App::getLocale() == 'ar')
                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('back/images/flags/ps.png') }}" class="mr-2" height="12"
                            alt="" />@lang('messages.lang.ar')<span class="mdi mdi-chevron-down"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated language-switch">
                        <a class="dropdown-item" href="#" wire:click="changeLanguage('en')"><img
                                src="{{ asset('back/images/flags/en.png') }}" alt=""
                                height="16" /><span>@lang('messages.lang.en')</span></a>
                    </div>
                    @else
                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('back/images/flags/en.png') }}" class="mr-2" height="12"
                            alt="" />@lang('messages.lang.en')<span class="mdi mdi-chevron-down"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated language-switch">
                        <a class="dropdown-item" href="#" wire:click="changeLanguage('ar')"><img
                                src="{{ asset('back/images/flags/ps.png') }}" alt=""
                                height="16" /><span>@lang('messages.lang.ar')</span></a>
                    </div>
                    @endif
                </li>
                @endif

                <!-- full screen -->
                <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                    <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                        <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                    </a>
                </li>

                <!-- notification -->
                <li class="dropdown notification-list list-inline-item">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="mdi mdi-bell-outline noti-icon"></i>
                        @if($notification_count > 0)
                        <span class="badge badge-pill badge-danger noti-icon-badge">{{ $notification_count }}</span>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg px-1">
                        <!-- item-->
                        <h6 class="dropdown-item-text">
                            @lang('messages.general.notifications')
                        </h6>
                        <div class="slimscroll notification-item-list">
                            <!-- item-->
                            {{-- @foreach($requests as $request)
                            <a href="{{ route('user.requests') }}" class="dropdown-item notify-item">
                                <div class="notify-icon bg-success"><i class="fas fa-hourglass-start"></i></div>
                                <p class="notify-details">
                                    <b>@lang('messages.general.service_provider_request')</b>
                                    <span class="text-muted">{{ $request->name }}
                                        @lang('messages.users.requested_for')
                                    </span>
                                </p>
                            </a>
                            @endforeach --}}

                            @foreach($queries as $query)
                            <a href="{{ route('contact-queries.index') }}" class="dropdown-item notify-item">
                                <div class="notify-icon bg-success"><i class="fas fa-envelope-open-text"></i>
                                </div>
                                <p class="notify-details">
                                    <b>@lang('messages.general.query_received')</b>
                                    <span class="text-muted">
                                        {{ Str::words($query->subject, 4, '...') }}
                                    </span>
                                </p>
                            </a>
                            @endforeach
                        </div>
                        <!-- All-->
                        <a href="{{ route('contact-queries.index') }}"
                            class="dropdown-item text-center notify-all text-primary">
                            @lang('messages.general.view_all') <i class="fi-arrow-right"></i>
                        </a>
                    </div>
                </li>

                <!-- Profile -->
                <li class="dropdown notification-list list-inline-item">
                    <div class="dropdown notification-list nav-pro-img">
                        <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ Auth::user()->profile_thumbnail ?? asset('back/images/users/user-4.jpg') }}"
                                alt="user" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                <i class="mdi mdi-account-circle"></i>
                                @lang('messages.users.profile')
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}">
                                <i class="mdi mdi-power text-danger"></i>
                                @lang('messages.users.logout')
                            </a>
                        </div>
                    </div>
                </li>
                @if(Auth::user())
                <li class="menu-item dropdown notification-list list-inline-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle nav-link">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>
                @else
                <div>
                    <a href="{{ url('/login') }}" class="logo" target="_blank">
                        <span class="logo-light">
                            Login
                        </span>
                    </a>
                </div>
                @endif

            </ul>

        </div>
        <!-- end menu-extras -->

        <div class="clearfix"></div>

    </div>
    <!-- end container -->
</div>
<!-- end topbar-main -->