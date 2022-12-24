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
        <ul class="desctop-header">
            <li><a href="#">Main</a></li>
            <li><a href="#">My info</a></li>
            <li><a href="#">My projects</a></li>
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
    </header> 

    <main class="bg-site">
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="{{ mix('/js/jquery.js') }}"></script>
    @yield('script')
</body>

</html>
