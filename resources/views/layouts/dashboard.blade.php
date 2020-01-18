<!DOCTYPE html>
<html class="has-navbar-fixed-top has-spinner-active">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <link href="/css/dashboard/admin.css" rel="stylesheet">
        <link href="/css/dashboard/vendor.css" rel="stylesheet">
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    </head>
    <body>
        <div class="pace  pace-inactive">
            <div class="pace-progress" data-progress-text="100%" data-progress="99"
                style="transform: translate3d(100%, 0px, 0px);">
                <div class="pace-progress-inner"></div>
            </div>
            <div class="pace-activity"></div>
        </div>

        <div id="app">
            <nav id="navbar-main" class="navbar is-fixed-top">
                <div class="navbar-brand">
                    <div class="navbar-item navbar-item-menu-toggle is-hidden-touch">
                        <a class="aside-menu-toggle">
                            <i class="fas fa-bars"></i>
                        </a>
                    </div>
                    <div class="navbar-item navbar-item-menu-toggle is-hidden-desktop">
                        <a class="aside-menu-toggle-mobile">
                            <i class="fas fa-bars"></i>
                        </a>
                    </div>
                    {{--                    <div class="navbar-item has-control has-control-without-left-space">--}}
                    {{--                        <div class="control">--}}
                    {{--                            <input class="input" placeholder="Paieška">--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>

                <div class="navbar-brand is-right">
                    <div class="navbar-item navbar-item-menu-toggle is-hidden-desktop">
                        <a class="navbar-menu-toggle">
                            <span class="icon when-inactive">
                                <i class="fas fa-ellipsis-v"></i>
                            </span>
                            <span class="icon when-active">
                                <i class="fas fa-times"></i>
                            </span>
                        </a>
                    </div>
                </div>

                <div id="navbar-menu" class="navbar-menu">
                    <div class="navbar-end">
                        <div
                            class="navbar-item has-dropdown has-dropdown-with-icons has-divider is-hoverable has-user-avatar">
                            <a class="navbar-link is-arrowless">
                                <div class="is-user-avatar">
                                    <img src="/img/avatar.jpeg">
                                </div>
                                <div class="is-user-name">
                                    <span>{{ isset(auth::user()->email) ? auth::user()->email : '' }}</span>
                                    <span class="icon">
                                        <i class="fas fa-caret-down"></i>
                                    </span>
                                </div>
                            </a>

                            <div class="navbar-dropdown">
                                {{--                                <a class="navbar-item">--}}
                                {{--                                    <span class="icon">--}}
                                {{--                                        <i class="fas fa-user"></i>--}}
                                {{--                                    </span>--}}
                                {{--                                    <span>Mano paskyra</span>--}}
                                {{--                                </a>--}}
                                {{--                                <a class="navbar-item">--}}
                                {{--                                    <span class="icon">--}}
                                {{--                                        <i class="fas fa-cog"></i>--}}
                                {{--                                    </span>--}}
                                {{--                                    <span>Nustatymai</span>--}}
                                {{--                                </a>--}}
                                {{--                                <a class="navbar-item">--}}
                                {{--                                    <span class="icon">--}}
                                {{--                                        <i class="fas fa-envelope"></i>--}}
                                {{--                                    </span>--}}
                                {{--                                    <span>Žinutės</span>--}}
                                {{--                                </a>--}}
                                {{--                                <hr class="navbar-divider">--}}
                                <a class="navbar-item" href="/">
                                    <span class="icon">
                                        <i class="fas fa-sign-out-alt"></i>
                                    </span>
                                    <span>@lang('dashboard.link.log.out.title')</span>
                                </a>
                            </div>
                        </div>

                        <div class="navbar-item has-dropdown has-dropdown-with-icons has-divider is-hoverable">
                            <a class="navbar-link is-arrowless">
                                <span class="icon is-left-icon">
                                <i class="fas fa-bars"></i>
                                </span>
                                <span>@lang('dashboard.menu.title')</span>
                                <span class="icon">
                                <i class="fas fa-caret-down"></i>
                                </span>
                            </a>

                            <div class="navbar-dropdown">
                                {{--                                <a class="navbar-item">--}}
                                {{--                                    <span class="icon">--}}
                                {{--                                        <i class="fas fa-book"></i>--}}
                                {{--                                    </span>--}}
                                {{--                                    <span>1</span>--}}
                                {{--                                </a>--}}
                                <a class="navbar-item">
                                    <span class="icon">
                                        <i class="fas fa-cloud"></i>
                                    </span>
                                    <span>2</span>
                                </a>
                                <hr class="navbar-divider">
                                <a class="navbar-item">
                                    <span class="icon">
                                        <i class="fas fa-tasks"></i>
                                    </span>
                                    <span>3</span>
                                </a>
                            </div>
                        </div>

                        <a class="navbar-item has-divider is-just-icon updates-toggle" title="Updates">
                            <span class="icon has-update-mark is-update-state-danger">
                                <i class="fas fa-bell"></i>
                            </span>
                            <span class="is-hidden-label">Pranešimai</span>
                        </a>
                    </div>
                </div>
            </nav>

            <aside class="aside-menu">
                <div class="aside-wrapper">
                    <div class="menu is-menu-main">
                        <div class="aside-tools">
                            <div class="aside-tools-label"><a class="has-text-white"
                                    href="/"><span>{{ config('app.name', 'Laravel') }}</span></a>
                            </div>
                            <a class="aside-close is-hidden-desktop"><span class="icon"><i
                                        class="fas fa-window-close"></i></span></a>
                        </div>

                        <div class="menu-container has-perfect-scrollbar ps ps--active-y">
                            <p class="menu-label">
                                @lang('dashboard.aside.common.title')
                            </p>

                            <ul class="menu-list">
                                <li>
                                    <a href="{{ route('dashboard.home') }}" class="is-active menu-item-is-active">
                                        <span class="icon"><i class="fas fa-desktop"></i></span>
                                        <span class="menu-item-label">@lang('dashboard.home.title')</span>
                                    </a>
                                </li>
                            </ul>

                            <p class="menu-label">
                                @lang('dashboard.aside.data.title')
                            </p>

                            <ul class="menu-list">
                                <li id="dropdown-sample-li" class="">
                                    <a id="dropdown-sample-a" class="has-dropdown-label">
                                        <span class="icon"><i class="fas fa-folder"></i></span>
                                        <span class="menu-item-label">@lang('dashboard.product.title')</span>
                                        <div class="dropdown-label">
                                            <span class="icon"><i class="fas fa-caret-down"></i></span>
                                        </div>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="{{ route('dashboard.product.index') }}">
                                                <span>@lang('dashboard.product.title')</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('dashboard.type.index') }}">
                                                <span>@lang('dashboard.type.title')</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('dashboard.group.index') }}">
                                                <span>@lang('dashboard.group.title')</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li id="dropdown-sample-li" class="">
                                    <a href="{{ route('dashboard.ingredient.index') }}" id="dropdown-sample-a" class="has-dropdown-label">
                                        <span class="icon"><i class="fas fa-file-alt"></i></span>
                                        <span class="menu-item-label">@lang('dashboard.ingredient.title')</span>
                                    </a>
                                </li>

                                {{--                                <li>--}}
                                {{--                                    <a href="{{ route('dashboard.type.index') }}">--}}
                                {{--                                        <span class="icon"><i class="fas fa-users"></i></span>--}}
                                {{--                                        <span class="menu-item-label">Vartotojai</span>--}}
                                {{--                                    </a>--}}
                                {{--                                </li>--}}
                            </ul>
                            <!--                             <p class="menu-label">
                                                            Kita
                                                        </p>
                                                        <ul class="menu-list">
                                                            <li>
                                                            <a href="/" class="">
                                                            <span class="icon"><i class="fas fa-code"></i></span>
                                                            <span class="menu-item-label">HTML</span>
                                                            </a>
                                                            </li>
                                                            <li>
                                                            <a href="/#void" class="has-update-label">
                                                            <span class="icon has-update-mark is-update-state-warning"><i class="fas fa-table"></i></span>
                                                            <span class="menu-item-label">Dėmėsio</span>
                                                            <div class="update-label">
                                                            <span class="tag is-warning"><span class="icon"><i class="fas fa-exclamation-circle"></i></span></span>
                                                            </div>
                                                            </a></li>
                                                            <li>
                                                            <a href="/login/">
                                                            <span class="icon"><i class="fas fa-lock"></i></span>
                                                            <span class="menu-item-label">Prisijungti</span>
                                                            </a>
                                                            </li>
                                                            <li>
                                                            <a href="/error/">
                                                            <span class="icon"><i class="fas fa-bomb"></i></span>
                                                            <span class="menu-item-label">Error v.1</span>
                                                            </a>
                                                            </li>
                                                            <li>
                                                            <a href="/error-card/">
                                                            <span class="icon"><i class="fas fa-bug"></i></span>
                                                            <span class="menu-item-label">Error v.2</span>
                                                            </a>
                                                            </li>
                                                            <li>
                                                            <a class="has-dropdown-label submenu-sample-activate">
                                                            <span class="icon"><i class="fas fa-folder-open"></i></span>
                                                            <span class="menu-item-label">Statistika</span>
                                                            <div class="dropdown-label">
                                                            <span class="icon"><i class="fas fa-chevron-right"></i></span>
                                                            </div>
                                                            </a>
                                                            </li>
                                                        </ul> -->

                            <div class="ps__rail-x" style="left: 0px; top: 0px;">
                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                            </div>
                            <div class="ps__rail-y" style="top: 0px; height: 210px; left: 0px;">
                                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 195px;"></div>
                            </div>
                        </div>
                        <div class="menu-container is-bottom">
                            <!-- <p class="menu-label">
                                Apačia
                            </p> -->
                            <ul class="menu-list">
                                <li>
                                    <a href="/" class="is-state-info is-hoverable">
                                        <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                                        <span class="menu-item-label">Atsijungti</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- This's just a html sample. It is a good idea to build secondary menu dynamically from parent's <ul> tag or js object -->

                    <div id="menu-secondary" class="menu is-menu-secondary is-hidden">
                        <div class="aside-tools">
                            <div class="aside-tools-label">
                                <span class="icon"><i class="fas fa-bars"></i></span>
                                <span>Submenus</span>
                            </div>
                            <a class="aside-close">
                                <span class="icon"><i class="fas fa-window-close"></i></span>
                            </a>
                        </div>
                        <div class="menu-container">
                            <p class="menu-label">
                                Example
                            </p>
                            <ul class="menu-list">
                                <li>
                                    <a href="/#void">
                                        <span class="icon"><i class="fas fa-table"></i></span>
                                        <span class="menu-item-label">With icon</span>
                                    </a>
                                </li>
                            </ul>
                            <p class="menu-label">
                                Submenu
                            </p>
                            <ul class="menu-list">
                                <li id="dropdown-sample-li">
                                    <a id="dropdown-sample-a" class="has-dropdown-label">
                                        <span>Dropdown</span>
                                        <div class="dropdown-label">
                                            <span class="icon"><i class="fas fa-plus"></i></span>
                                        </div>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="/#void">
                                                <span>Sub-item One</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/#void">
                                                <span>Sub-item Two</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="/#void">
                                        <span>Sample item</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>

            <aside id="updates" class="is-right">
                <div class="aside-wrapper is-updates-widget">
                    <div class="menu is-aside-default">
                        <div class="aside-tools">
                            <div class="aside-tools-label">
                                <span class="icon"><i class="fas fa-bell"></i></span>
                                <span>Updates</span>
                            </div>
                            <a class="aside-close">
                                <span class="icon"><i class="fas fa-window-close"></i></span>
                            </a>
                        </div>
                        <div class="menu-container has-perfect-scrollbar ps">
                            <ul class="updates-list">
                                <li>
                                    <div class="update-text">
                                        Varius quam quisque id diam vel. Justo nec ultrices dui sapien eget. Lacus vel facilisis volutpat est velit egestas dui
                                    </div>
                                    <div class="level is-mobile">
                                        <div class="level-left">
                                            <div class="level-item">
                                                <span class="tag is-info has-text-white">
                                                <span class="icon">
                                                <i class="fas fa-info-circle"></i>
                                                </span>
                                                </span>
                                            </div>
                                            <div class="level-item">
                                                <span class="is-size-7 is-time-mark">
                                                <span class="icon"><i class="fas fa-clock"></i></span>
                                                <span>1h</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="level-right">
                                            <div class="level-item">
                                                <button type="button" class="button is-small is-white is-outlined">
                                                    <span class="icon"><i class="fas fa-check-double"></i></span>
                                                    <span>Got it</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="update-text">
                                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat
                                    </div>
                                    <div class="level is-mobile">
                                        <div class="level-left">
                                            <div class="level-item">
                                    <span class="tag is-warning has-text-white">
                                    <span class="icon">
                                    <i class="fas fa-exclamation-circle"></i>
                                    </span>
                                    </span>
                                            </div>
                                            <div class="level-item">
                                    <span class="is-size-7 is-time-mark">
                                    <span class="icon"><i class="fas fa-clock"></i></span>
                                    <span>2h</span>
                                    </span>
                                            </div>
                                        </div>
                                        <div class="level-right">
                                            <div class="level-item">
                                                <button type="button" class="button is-small is-white is-outlined">
                                                    <span class="icon"><i class="fas fa-check-double"></i></span>
                                                    <span>Got it</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="update-text">
                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur
                                    </div>
                                    <div class="level is-mobile">
                                        <div class="level-left">
                                            <div class="level-item">
                                    <span class="tag is-danger has-text-white">
                                    <span class="icon">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                    </span>
                                            </div>
                                            <div class="level-item">
                                    <span class="is-size-7 is-time-mark">
                                    <span class="icon"><i class="fas fa-clock"></i></span>
                                    <span>3h</span>
                                    </span>
                                            </div>
                                        </div>
                                        <div class="level-right">
                                            <div class="level-item">
                                                <button type="button" class="button is-small is-white is-outlined">
                                                    <span class="icon"><i class="fas fa-check-double"></i></span>
                                                    <span>Got it</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="update-text">
                                        Varius quam quisque id diam vel. Justo nec ultrices dui sapien eget. Lacus vel facilisis volutpat est velit egestas dui
                                    </div>
                                    <div class="level is-mobile">
                                        <div class="level-left">
                                            <div class="level-item">
                                    <span class="tag is-success has-text-white">
                                    <span class="icon">
                                    <i class="fas fa-check-circle"></i>
                                    </span>
                                    </span>
                                            </div>
                                            <div class="level-item">
                                    <span class="is-size-7 is-time-mark">
                                    <span class="icon"><i class="fas fa-clock"></i></span>
                                    <span>10h</span>
                                    </span>
                                            </div>
                                        </div>
                                        <div class="level-right">
                                            <div class="level-item">
                                                <button type="button" class="button is-small is-white is-outlined">
                                                    <span class="icon"><i class="fas fa-check-double"></i></span>
                                                    <span>Got it</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="updates-action">
                                <button class="button is-small is-fullwidth is-white is-outlined">Įkelti daugiau
                                </button>
                            </div>
                            <div class="ps__rail-x" style="left: 0px; top: 0px;">
                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                            </div>
                            <div class="ps__rail-y" style="top: 0px; left: 0px;">
                                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            @include('layouts.message')

            @yield('content')

            <footer class="footer">
                <div class="container-fluid">
                    <div class="level">
                        <div class="level-left">
                            <div class="level-item">
                                © 2020 {{ config('app.name', 'Laravel') }}
                            </div>
                        </div>
                        <div class="level-right">
                            <div class="level-item">
                                <div class="logo">
                                    <img src="/img/logo.jpg" alt="Logotype">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>


        <div id="ui-overlay" class="ui-overlay"></div>

        <div id="spinner" class="spinner">
            <div class="spinner-container">
                <div class="sk-double-bounce">
                    <div class="sk-child sk-double-bounce1"></div>
                    <div class="sk-child sk-double-bounce2"></div>
                </div>
            </div>
        </div>
    </body>
    <script src="/js/dashboard/admin.js"></script>
    <script src="/js/dashboard/vendor.js"></script>
</html>
