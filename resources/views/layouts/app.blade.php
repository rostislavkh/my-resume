<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO -->
    <meta name="description" content="Resume by Rostislav Khorolskiy. Резюме Ростислава Хорольського">
    <meta name="keywords" content="Resume, Rostislav, Khorolskiy, Резюме, Ростислав, Хорольський">
    <meta name="author" content="Rostislav Khorolskiy">

    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">

    <!-- Styles -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/all-lib.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/app-layout.css') }}" rel="stylesheet">
    @yield('style')
</head>

<body>
    <header>
        <div class="header" data-aos="fade-down">
            <ul class="desctop-header">
                <li><a href="{{ route('main') }}" class="{{ \Request::route()->getName() == 'main' ? 'active' : '' }}">{{ __('Main') }}</a></li>
                <li><a href="{{ route('projects') }}" class="{{ \Request::route()->getName() == 'projects' ? 'active' : '' }}">{{ __('My projects') }}</a></li>
                <li>
                    <div class="drop -color-lighter drop--down">
                        <div class="curr-lang">{{ \Illuminate\Support\Str::upper(\Illuminate\Support\Facades\App::getLocale()) }}</div>

                        <div class="drop__content -transition-slide-in">
                            <div class="drop-arrow"></div>

                            <div class="drop-list drop-list--lang -size-low -position-center -border-rounded">
                                <a class="link-lang" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">EN</a>
                                <a class="link-lang" href="{{ LaravelLocalization::getLocalizedURL('uk', null, [], true) }}">UK</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="mobile-header">
                <a href="/" class="mobile-header__title">{{ __('Rostislav Khorolskiy') }}</a>
                <div class="mobile-header__right-block">
                    <div class="mobile-header__lang">
                        <div class="drop -color-lighter drop--down">
                            <div class="curr-lang">{{ \Illuminate\Support\Str::upper(\Illuminate\Support\Facades\App::getLocale()) }}</div>

                            <div class="drop__content -transition-slide-in">
                                <div class="drop-arrow"></div>

                                <div class="drop-list drop-list--lang -size-low -position-center -border-rounded">
                                    <a class="link-lang" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">EN</a>
                                    <a class="link-lang" href="{{ LaravelLocalization::getLocalizedURL('uk', null, [], true) }}">UA</a>
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
            <li><a href="{{ route('main') }}" class="{{ \Request::route()->getName() == 'main' ? 'active' : '' }}">{{ __('Main') }}</a></li>
            <li><a href="{{ route('projects') }}" class="{{ \Request::route()->getName() == 'projects' ? 'active' : '' }}">{{ __('My projects') }}</a></li>
        </ul>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <a class="copyright link" href="{{ __('https://t.me/rkhorolskiy') }}">
            {{ __('Copyright © Rostislav Khorolskiy 2022') }}
        </a>
    </footer>

    <!-- Scripts -->
    <script src="{{ mix('/js/jquery.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="{{ mix('/js/animations.js') }}"></script>
    {!! '<script>
        let title = "' . __('Sent') . '";
        let message = "' . __('I will contact you soon!') . '";
        let button_text = "' . __('Ok') . '";
    </script>' !!}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ mix('/js/default.js') }}"></script>
    <script src="{{ mix('/js/ajax-form.js') }}"></script>
    @yield('script')
</body>

</html>
