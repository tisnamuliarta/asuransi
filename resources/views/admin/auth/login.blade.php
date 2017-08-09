<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin Login</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/css/now-ui-kit.css') }}" rel="stylesheet" />
</head>

<body class="login-page">
<!-- Navbar -->
<!-- End Navbar -->
<div class="page-header" filter-color="orange">
    <div class="page-header-image" style="background-image:url({{ asset('public/img/login.jpg') }})"></div>
    <div class="container">
        <div class="col-md-4 content-center">
            <div class="card card-login card-plain">
                <form class="form" method="POST" action="{{ url(route('admin.login')) }}">
                    {{ csrf_field() }}
                    <div class="header header-primary text-center">
                        <div class="logo-container">
                            <h3>Login</h3>
                        </div>
                    </div>
                    <div class="content">
                        <div class="input-group form-group-no-border input-lg">
                            <span class="input-group-addon">
                                <i class="now-ui-icons users_circle-08"></i>
                            </span>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email..." autocomplete="off">
                        </div>
                        @if($errors->has('email'))
                            <span class="has-error">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                        @endif
                        <br>
                        <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_lock-circle-open"></i>
                                </span>
                            <input type="password" name="password" placeholder="Password..." class="form-control" />
                        </div>
                        @if($errors->has('password'))
                            <span class="has-error">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                        @endif
                        <br>
                    </div>
                    <div class="footer text-center">
                        <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
</body>
<!--   Core JS Files   -->
<script src="{{ asset('public/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/core/tether.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{ asset('public/js/now-ui-kit.js') }}" type="text/javascript"></script>

</html>