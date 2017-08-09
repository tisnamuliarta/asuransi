<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" data-turbolinks-track="reload">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet" data-turbolinks-track="reload">
    <link href="{{ asset('/css/themify-icons.css') }}" rel="stylesheet" data-turbolinks-track="reload">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    @if (Auth::guest())
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    @else
                        <a class="navbar-brand" href="{{ url('/home') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    @endif
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            {{-- <li><a href="{{ route('register') }}">Register</a></li> --}}
                        @else
                            <li>
                                <a href="{{ url(route('datasetoran.index')) }}"><i class="ti-wallet"></i> Setoran</a>
                            </li>
                            <li><a href="{{ url(route('downline.member', Hashids::encode(Auth::user()->id))) }}"><i class="ti-world"></i> Jaringan</a></li>
                            <li><a href="{{ url(route('bonus')) }}"><i class="ti-cup"></i> Bonus & Tabungan</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true" id="dropdownMenu1" >
                                    <img src="{{ asset('imgs/user/'.Auth::user()->avatar) }}" class="img img-small img-round img-responsive">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                    <li>
                                        <a href="{{ url(route('user.show', Hashids::encode(Auth::user()->id))) }}">Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="wrapper">
            <div class="main">
                @yield('content')
            </div>
        </div>
        <footer class="">
            <h5 class="text-center title">&copy; {{ \Carbon\Carbon::now()->year }} All Reserved</h5>
        </footer>
    </div>
    

    <!-- Scripts -->
    <script src="{{ asset('/js/main-function.js') }}" data-turbolinks-eval="false"></script>
    <script src="{{ asset('/js/app.js') }}" data-turbolinks-track="reload"></script>
    <script src="{{ asset('/js/function.js') }}" data-turbolinks-track="reload"></script>
    <script src="{{ asset('js/turbolinks.js') }}" data-turbolinks-track="reload"></script>
    @include('sweet::alert')
   @if (!Auth::guest())
        @include('layouts.script')
   @endif
</body>
</html>
