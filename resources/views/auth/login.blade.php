<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mes Biens</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('template/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{ asset('template/css/fontastic.css') }}">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('template/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('template/css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('template/img/favicon.ico') }}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<div class="page login-page">
    <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
            <div class="row">
                <!-- Logo & Information Panel-->
                <div class="col-lg-6">
                    <div class="info d-flex align-items-center">
                        <div class="content">
                            <div class="logo">
                                <h1>Mes Biens</h1>
                            </div>
                            <p>Slogan.</p>
                        </div>
                    </div>
                </div>
                <!-- Form Panel    -->
                <div class="col-lg-6 bg-white">
                    <div class="form d-flex align-items-center">
                        <div class="content">
                            <form id="login-form" method="POST" class="form-horizontal" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <div class="col-md-12">
                                        <input id="email" placeholder="E-Mail" type="email" name="email" class="input-material form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">

                                        @if ($errors->has('email'))
                                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <div class="col-md-12">
                                        <input placeholder="Password" id="password" type="password" name="password" class="input-material form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                                        @if ($errors->has('password'))
                                            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <button id="login" type="submit" class="btn btn-primary">Login</button>
                                <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                            </form>

                            {{--<a href="#" class="forgot-pass">Forgot Password?</a><br>--}}
                            <small>
                                Do not have an account?
                            </small>

                            <a href="{{ route('register') }}" class="signup">Signup</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyrights text-center">
        {{--<p>Design by <a href="https://bootstrapious.com/admin-templates" class="external">Bootstrapious</a>
            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </p>--}}
    </div>
</div>
<!-- Javascript files-->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="{{ asset('template/vendor/popper.js/umd/popper.min.js') }}"> </script>
<script src="{{ asset('template/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('template/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
<script src="{{ asset('template/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('template/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
<!-- Main File-->
<script src="{{ asset('template/js/front.js') }}"></script>
</body>
</html>