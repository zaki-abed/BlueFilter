<div class="navbar-custom">
    <div class="container-fluid">
        <div id="navigation">
            <ul class="navigation-menu">
                <li class="">
                    <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i></a>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="icon-paper-sheet" aria-hidden="true"></i> @lang('messages.menu.pages') <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                    <ul class="submenu">
                        <li><a href="{{ route('page.create') }}">@lang('messages.pages.create')</a></li>
                        <li><a href="{{ route('page.index') }}">@lang('messages.pages.index')</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="icon-paper-sheet" aria-hidden="true"></i><i class="mdi mdi-chevron-down mdi-drop">{{ __('frontend.Ads') }}</i></a>
                    <ul class="submenu">
                        <li><a href="{{ route('ads.create') }}">@lang('messages.ads.create')</a></li>
                        <li><a href="{{ route('ads.index') }}">@lang('messages.ads.index')</a></li> 
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="fas fa-newspaper" aria-hidden="true"></i> @lang('messages.menu.posts') <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                    <ul class="submenu">
                        <li><a href="{{ route('post.create') }}">@lang('messages.posts.create')</a></li>
                        <li><a href="{{ route('post.index') }}">@lang('messages.posts.index')</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="fas fa-users" aria-hidden="true"></i> @lang('messages.menu.users') <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                    <ul class="submenu">
                        <li><a href="{{ route('user.create') }}">@lang('messages.users.create')</a></li>
                        <li><a href="{{ route('user.index') }}">@lang('messages.users.index')</a></li>
                        <li><a href="{{ route('subscribe.index') }}">@lang('messages.subscribe.name')</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="fas fa-user-friends" aria-hidden="true"></i> @lang('messages.menu.providers') <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                    <ul class="submenu">
                        {{-- <li><a href="{{ route('user.requests') }}">@lang('messages.users.service_provider_requests')</a></li> --}}
                        <li><a href="{{ route('requests') }}">@lang('messages.menu.providers_requests')</a></li>
                        <li><a href="{{ route('user.views') }}">@lang('messages.users.service_provider_views')</a></li>
                        <li class="has-submenu">
                            <a href="#">@lang('messages.menu.categories')</a>
                            <ul class="submenu">
                                <li><a href="{{ route('category.create') }}">@lang('messages.categories.create')</a></li>
                                <li><a href="{{ route('category.index') }}">@lang('messages.categories.index')</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('contact-queries.index') }}"><i class="fas fa-question-circle" aria-hidden="true"></i> @lang('messages.menu.queries')</a>
                </li>

                <li>
                    <a href="{{ route('homepages') }}"><i class="fas fa-edit" aria-hidden="true"></i> @lang('messages.menu.homepage')</a>
                </li>

                <li class="has-submenu">
                    <a href="#"><i class="fas fa-cogs"></i> @lang('messages.menu.settings') <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                    <ul class="submenu">
                        <li><a href="{{ route('settings') }}"><i class="fas fa-cogs" aria-hidden="true"></i> @lang('messages.menu.settings')</a></li>
                        <li class="d-none"><a href="{{ route('media.index') }}"><i class="far fa-file-image" aria-hidden="true"></i> @lang('messages.menu.media')</a></li>
                        <li class="has-submenu d-none"><a href="#"><i class="fas fa-bell" aria-hidden="true"></i> @lang('messages.menu.notifications')</a></a>
                            <ul class="submenu">
                                <li><a href="{{ route('notifications.create') }}">@lang('messages.notifications.create')</a></li>
                                <li><a href="{{ route('notifications.history') }}">@lang('messages.notifications.index')</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu"><a href="#"><i class="fas fa-globe"></i> @lang('messages.menu.cities')</a>
                            <ul class="submenu">
                                <li><a href="{{ route('city.index') }}">@lang('messages.menu.view_cities')</a></li>
                                <li><a href="{{ route('city.create') }}">@lang('messages.menu.add_city')</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu d-none"><a href="#"><i class="fas fa-flag"></i> @lang('messages.menu.countries')</a>
                            <ul class="submenu">
                                <li><a href="{{ route('country.index') }}">@lang('messages.menu.view_countries')</a></li>
                                <li><a href="{{ route('country.create') }}">@lang('messages.menu.add_country')</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
