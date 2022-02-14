<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<title> config('app.name', 'Laravel') </title> -->

    <title>RRK Network</title>

    <link rel="shortcut icon" href="{{ asset('img/logo-RRK.png') }}" type="image/png" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #eaffef;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo-RRK.png') }}"  alt="" width="25" height="25" class="d-inline-block align-text-top">
                    RRK Network
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="">Dashboard</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('create') }}">Create post</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @auth
                            <li><a class="nav-link" href="profile/{{ Auth::user()->id }}/">Hi, {{ Auth::user()->name }} </a></li>
                            <li><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
                        @endauth
                        @guest
                            <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                            <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

            @yield('content')

    </div>
</body>
</html>
