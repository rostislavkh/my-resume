<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->

    <!-- Styles -->
    {{-- <link href="{{ asset('/css/all-lib.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/all-lib.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/app-layout.css') }}" rel="stylesheet">
    @yield('style')
</head>

<body>
    <header>
        <div class="header">
            <ul class="desctop-header">
                <li><a href="{{ route('main') }}" class="{{ \Request::route()->getName() == 'main' ? 'active' : '' }}">Main</a></li>
                <li><a href="{{ route('projects') }}" class="{{ \Request::route()->getName() == 'projects' ? 'active' : '' }}">My projects</a></li>
                <li>
                    <div class="drop -color-lighter drop--down">
                        <div class="curr-lang">EN</div>

                        <div class="drop__content -transition-slide-in">
                            <div class="drop-arrow"></div>

                            <div class="drop-list drop-list--lang -size-low -position-center -border-rounded">
                                <a class="link-lang" href="#">EN</a>
                                <a class="link-lang" href="#">UA</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="mobile-header">
                <span class="mobile-header__title">Rostislav Khorolskiy</span>
                <div class="mobile-header__right-block">
                    <div class="mobile-header__lang">
                        <div class="drop -color-lighter drop--down">
                            <div class="curr-lang">EN</div>

                            <div class="drop__content -transition-slide-in">
                                <div class="drop-arrow"></div>

                                <div class="drop-list drop-list--lang -size-low -position-center -border-rounded">
                                    <a class="link-lang" href="#">EN</a>
                                    <a class="link-lang" href="#">UA</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="mobile-header__burger" type="button">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
        <ul class="mobile-header__list">
            <li><a href="{{ route('main') }}" class="{{ \Request::route()->getName() == 'main' ? 'active' : '' }}">Main</a></li>
            <li><a href="{{ route('projects') }}" class="{{ \Request::route()->getName() == 'projects' ? 'active' : '' }}">My projects</a></li>
        </ul>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="{{ mix('/js/jquery.js') }}"></script>
    <script src="{{ mix('/js/default.js') }}"></script>
    @yield('script')
</body>

</html>
