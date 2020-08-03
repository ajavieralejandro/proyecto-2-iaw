<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if($token ?? '' != null)   
    <meta id="api_token" name="api_token" content="{{ $token ?? '' }}">
    @endif


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>




<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">





    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">



</head>
<body class="d-flex flex-column min-vh-100">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                    <i class="fa fa-cubes" aria-hidden="true"></i>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    <!--<a class="nav-link" href="#">Cursos <span class="sr-only">(current)</span></a> -->
                    <a class="nav-link" href="{{ route('getTeamView') }}">Equipo <span class="sr-only">(current)</span></a>
                    <a class="nav-link" href="{{ route('getSPA') }}" >Cursos SPA <span class="sr-only">(current)</span></a>

                    <a class="nav-link" href="/librerias">Librerias <span class="sr-only">(current)</span></a>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    @if(Auth::guard('admin')->check())
                                    <a class="dropdown-item"  href="{{ route('admin') }}">
                                    {{ Auth::user()->name }}                                    </a>
                                    @else

                                    <a class="dropdown-item"  href="{{ route('viewUser') }}">
                                    {{ Auth::user()->name }}                                    </a>
                                    @endif

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

<div class="margin"></div>
<footer class="mt-auto">
    <div class="center"><i class="fa fa-cubes fa-3x" aria-hidden="true"></i></div>
</footer>
</body>





    @yield('scripts')

</html>
