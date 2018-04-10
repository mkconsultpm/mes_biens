<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('template/img/favicon.ico') }}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<div class="page">
    <!-- Main Navbar-->
    <header class="header">
        <nav class="navbar">
            <!-- Search Box-->
            <div class="search-box">
                <button class="dismiss"><i class="icon-close"></i></button>
                <form id="searchForm" action="#" role="search">
                    <input type="search" placeholder="What are you looking for..." class="form-control">
                </form>
            </div>
            <div class="container-fluid">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                    <!-- Navbar Header-->
                    <div class="navbar-header">
                        <!-- Navbar Brand --><a href="index.html" class="navbar-brand">
                            <div class="brand-text brand-big"><span>Mes </span><strong>Biens</strong></div>
                            <div class="brand-text brand-small"><strong>MB</strong></div></a>
                        <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
                    </div>
                    <!-- Navbar Menu -->
                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                        <!-- Search-->
                        {{--<li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>--}}
                        {{--<!-- Notifications-->
                        <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i><span class="badge bg-red">12</span></a>
                            <ul aria-labelledby="notifications" class="dropdown-menu">
                                <li><a rel="nofollow" href="#" class="dropdown-item">
                                        <div class="notification">
                                            <div class="notification-content"><i class="fa fa-envelope bg-green"></i>You have 6 new messages </div>
                                            <div class="notification-time"><small>4 minutes ago</small></div>
                                        </div></a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item">
                                        <div class="notification">
                                            <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                                            <div class="notification-time"><small>4 minutes ago</small></div>
                                        </div></a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item">
                                        <div class="notification">
                                            <div class="notification-content"><i class="fa fa-upload bg-orange"></i>Server Rebooted</div>
                                            <div class="notification-time"><small>4 minutes ago</small></div>
                                        </div></a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item">
                                        <div class="notification">
                                            <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                                            <div class="notification-time"><small>10 minutes ago</small></div>
                                        </div></a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>view all notifications                                            </strong></a></li>
                            </ul>
                        </li>
                        <!-- Messages                        -->
                        <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope-o"></i><span class="badge bg-orange">10</span></a>
                            <ul aria-labelledby="notifications" class="dropdown-menu">
                                <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                        <div class="msg-profile"> <img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                        <div class="msg-body">
                                            <h3 class="h5">Jason Doe</h3><span>Sent You Message</span>
                                        </div></a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                        <div class="msg-profile"> <img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                        <div class="msg-body">
                                            <h3 class="h5">Frank Williams</h3><span>Sent You Message</span>
                                        </div></a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                        <div class="msg-profile"> <img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                        <div class="msg-body">
                                            <h3 class="h5">Ashley Wood</h3><span>Sent You Message</span>
                                        </div></a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>Read all messages    </strong></a></li>
                            </ul>
                        </li>--}}
                        <!-- Logout    -->
                        <li class="nav-item">
                            @if (Auth::check())

                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();"
                                   class="nav-link logout">
                                    Logout
                                    <i class="fa fa-sign-out"></i>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                            @endif


                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        <nav class="side-navbar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center">
                <div class="avatar"><img src="{{ asset('template/img/avatar-1.jpg') }}" alt="user-avatar" class="img-fluid rounded-circle"></div>
                <div class="title">
                    <h1 class="h4">User name</h1>
                    <p>User email</p>
                </div>
            </div>
            <!-- Sidebar Navidation Menus--><span class="heading">Menu</span>
            {{--<ul class="list-unstyled">
                <li class="active"><a href="{{ url('/') }}"> <i class="icon-home"></i>Home </a></li>
            </ul>--}}

            @if(Auth::user()->is_admin)
                <ul class="list-unstyled">
                    <li class="active"><a href="{{ route('excel_files.index') }}"> <i class="icon-home"></i>Fichiers Excel </a></li>
                </ul>
            @else
                {{--<ul class="list-unstyled">
                    <li class="active"><a href="{{ route('prospects.theNext') }}"> <i class="icon-home"></i>Prospets </a></li>
                </ul>--}}
            @endif

            {{--<span class="heading">Extras</span>--}}

            {{--<ul class="list-unstyled">
                <li> <a href="#"> <i class="icon-flask"></i>Demo </a></li>
                <li> <a href="#"> <i class="icon-screen"></i>Demo </a></li>
                <li> <a href="#"> <i class="icon-mail"></i>Demo </a></li>
                <li> <a href="#"> <i class="icon-picture"></i>Demo </a></li>
            </ul>--}}

        </nav>
        <div class="content-inner">
            <!-- Page Header-->
            <header class="page-header">
                <div class="container-fluid">
                    <h2 class="no-margin-bottom">Dashboard</h2>
                </div>
            </header>

            @if(Session::has('errors'))
                @foreach ($errors->all() as $error)
                    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ $error }}</p>
                @endforeach
            @endif

            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif

            @yield('content')
            {{--@include('layouts.test')--}}

            <!-- Page Footer-->
            <footer class="main-footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <p>Mes biens &copy; 2018{{ date('Y') == '2018' ? '' : '-'.date('Y') }}</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>

<!-- Javascript files-->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="{{ asset('template/vendor/popper.js/umd/popper.min.js') }}"> </script>
<script src="{{ asset('template/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Main File-->
<script src="{{ asset('template/js/front.js') }}"></script>

@yield('thisjs')

</body>
</html>