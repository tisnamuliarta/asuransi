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
    <link href="{{ asset('admin-assets/css/admin.css') }}" rel="stylesheet" data-turbolinks-track="reload">
    <link href="{{ asset('admin-assets/css/themify-icons.css') }}" rel="stylesheet" data-turbolinks-track="reload">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar" data-background-color="white" data-active-color="danger">

            <div class="sidebar-wrapper">
                <div class="logo">
    {{--                 <a href="http://www.creative-tim.com" class="simple-text">
                        Creative Tim
                    </a> --}}
                    <!-- Branding Image -->
                    <a class="simple-text" href="{{ url(route('admin.dashboard')) }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <ul class="nav">
                    <li>
                        <a href="{{ url(route('admin.dashboard')) }}">
                            <i class="ti-panel"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url(route('member.index')) }}">
                            <i class="ti-user"></i>
                            <p>Add Member</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url(route('setoran.index')) }}">
                            <i class="ti-user"></i>
                            <p>Setoran</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url(route('admin.note.index')) }}">
                            <i class="ti-notepad"></i>
                            <p>Note List</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url(route('pin.index')) }}">
                            <i class="ti-pin2"></i>
                            <p>Pin Code</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar bar1"></span>
                            <span class="icon-bar bar2"></span>
                            <span class="icon-bar bar3"></span>
                        </button>
                        <a class="navbar-brand" href="#">Dashboard</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-panel"></i>
                                    <p>Stats</p>
                                </a>
                            </li>

                                <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ route('admin.login') }}">Login</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="/admin">Home</a></li>
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

            <div class="content">
                <div class="container-fluid">
                    <div id="app">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    <!-- Scripts -->
    <script src="{{ asset('/admin-assets/js/admin.js') }}"  data-turbolinks-eval="false"></script>
    <script src="{{ asset('/admin-assets/js/datatable.js') }}" data-turbolinks-eval="false"></script>
    @include('admin.include.script')
    <script src="{{ asset('js/turbolinks.js') }}" data-turbolinks-track="reload"></script>
     @include('sweet::alert')

</body>
</html>
