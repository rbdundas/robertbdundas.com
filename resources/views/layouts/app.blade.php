<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-125862732-6"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-125862732-6');
    </script>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RobertBDundas.com') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>


</head>
<body>
    <div id="app">
        <div class="container pt-2">
            <header-navbar brand="{{ asset('img/boxers.png') }}"
                           home_route="{{ route('home') }}"
                           index_route="{{ route('index') }}"
                           login_route="{{ route('login') }}"
                           articles_route="{{ route('articles') }}"
                           projects_route="{{ route('projects') }}"
                           logged_in="{{ Auth::check() }}"
                           logout_route="{{ route('logout') }}"
                           csrf="{{ csrf_token() }}">
            </header-navbar>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
        <site-footer></site-footer>
    </div>
</body>
</html>
