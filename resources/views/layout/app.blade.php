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
    @yield('style')
</head>

<body>
    <header>
    
    </header> 

    <main class="bg-site">
        @yield('content')
    </main>

    <!-- Scripts -->
    @yield('script')
</body>

</html>
