<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Admin Panel</title>
    <link href="https://unpkg.com/tailwindcss@2.2.0/dist/tailwind.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="{{ asset('css/admin.css') }}" defer rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" defer rel="stylesheet" type="text/css">
    <!-- Site CSS -->
    <link href="{{ asset('css/style.css') }}" defer rel="stylesheet" type="text/css">
    <!-- Responsive CSS -->
    <link href="{{ asset('css/responsive.css') }}" defer rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="{{ asset('css/custom.css') }}" defer rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="{{ asset('css/bootstrap.min.css') }}" defer rel="stylesheet" type="text/css">
    <link href="{{ asset('css/loader.css') }}" defer rel="stylesheet" type="text/css">

    <!-- Responsive CSS -->
    <link href="{{ asset('css/responsive.css') }}" defer rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="{{ asset('css/custom.css') }}" defer rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/loader.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

</head>

<body>
    <div id="preloader"></div>

    <div>
        <div class="page-wrapper chiller-theme">

            <!-- Navbar -->
            <!-- Start Navigation -->

            <nav class="navbar navbar-expand-lg navbar-light navbar-default bootsnav">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" onclick="openNav()"
                        aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="bi bi-list"></i>
                    </button>

                </div>

                <!--Side Nav-->
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <ul>
                        <li class="nav-item active"><a class="nav-link" href="/">HOME</a></li>

                        <li class="nav-item"><a class="nav-link" href="/blogs">BLOGS</a></li>


                        <li class="nav-item"><a class="nav-link" href="/about">ABOUT</a></li>


                        <li class="nav-item"><a class="nav-link" href="/contact">TALK TO ME</a></li>


                        @unless(Auth::check())
                            <li class="nav-item"><a class="nav-link" href="/login">LOGIN</a></li>
                        @endunless

                        @auth
                            <li class="dropdown">
                                <a href="" class="nav-link" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                                <ul class="dropdown-menu">
                                    @if ((!Auth::guest() && Auth::user()->is_admin()) || Auth::user()->is_author())
                                        <li><a href="{{ url('admin') }}">Admin Panel</a></li>
                                    @endif


                                    <li><a href="{{ url('logout') }}">Logout</a></li>
                                </ul>
                            </li>
                        @endauth
                    </ul>

                </div>
                <!--Side Nav-->

                <!-- End Header Navigation -->

                <!-- Collect    the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse justify-content-center" id="navbar-menu">
                    <ul class="nav navbar-nav mr-auto">

                        <li class="nav-item">
                            <a class="nav-link" id="show-sidebar" href="#"><i class="bi bi-list"></i>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="https://www.instagram.com/shiri_mark/?hl=en"><i
                                    class="bi bi-instagram"></i>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/"><i class="bi bi-youtube"></i>
                                </i>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">

                        <li class="nav-item active"> <a href="/">
                                <img src="{{ url('/images/logo1.png') }}" style="width:200px;">
                            </a></li>
                        <li class="nav-item"><a class="nav-link" href="/blogs   ">Blogs</a></li>
                        <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="/contact">Talk To Me</a></li>
                        @unless(Auth::check())
                            <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                        @endunless

                        @auth
                            <li class="dropdown">
                                <a href="" class="nav-link" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                                <ul class="dropdown-menu">
                                    @if ((!Auth::guest() && Auth::user()->is_admin()) || Auth::user()->is_author())
                                        <li><a href="{{ url('admin') }}">Admin Panel</a></li>
                                    @endif
                                    <li><a href="{{ url('logout') }}">Logout</a></li>
                                </ul>
                            </li>
                        @endauth




                    </ul>


                </div>


                <br>

            </nav>
            <!-- End Navigation -->

            <!-- Start Sidebar -->

            <nav id="sidebar" class="sidebar-wrapper">
                <div class="sidebar-content">
                    <div class="sidebar-brand">
                        <a href="#">Admin Panel</a>
                        <div id="close-sidebar">
                            <i class="bi bi-x-square"></i>
                        </div>
                    </div>
                    <div class="sidebar-header">
                        <div class="user-pic">
                            <img class="img-responsive img-rounded"
                                src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                                alt="User picture">
                        </div>
                        <div class="user-info">
                            <span class="user-name">
                                <strong>{{ Auth::user()->name }}</strong>
                            </span>
                            @if (!Auth::guest() && Auth::user()->is_admin())
                                <span class="user-role">Administrator</span>
                            @endif

                            @if (!Auth::guest() && Auth::user()->is_author())
                                <span class="user-role">Author</span>
                            @endif
                            <span class="user-status">
                                <i class="bi bi-circle-fill"></i>
                                <span>Online</span>
                            </span>
                        </div>
                    </div>
                    <!-- sidebar-header  -->

                    <div class="sidebar-menu">
                        <ul>
                            <li>
                                <a href="admin">
                                    <i class="bi bi-house-door"></i>
                                    <span>Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="/new-post">
                                    <i class="bi bi-plus"></i>
                                    <span>New Blog</span>
                                </a>
                            </li>
                            @if (!Auth::guest() && Auth::user()->is_admin())
                                <li>
                                    <a href="/users">
                                        <i class="bi bi-people"></i>
                                        <span>Users</span>
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ url('messages') }}">
                                    <i class="bi bi-chat"></i>
                                    <span>Messages</span>
                                </a>
                            </li>

                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="bi bi-bar-chart"></i>
                                    <span>Analytics</span>
                                </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="{{ url('analytics') }}">All Visits
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ url('stats') }}">Stats
                                        </a>
                                    </li>



                                </ul>
                            </div>

                            </li>

                            <li><a href="{{ url('logout') }}"><i class="bi bi-box-arrow-left"></i>
                                    Logout</a>
                            </li>
                        </ul>


                    </div>
                    <!-- sidebar-menu  -->
                </div>
                <!-- sidebar-content  -->

            </nav>

            <!-- End Sidebar -->
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ $error }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endforeach
            @endif

            <div class="container">
                @yield('content')
            </div>
        </div>

        <script src="{{ asset('js/admin.js') }}" defer></script>
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}" defer></script>
        <script src="{{ asset('js/popper.min.js') }}" defer></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script> <!-- ALL PLUGINS -->
        <script src="{{ asset('js/jquery.superslides.min.js') }}" defer></script>
        <script src="{{ asset('js/bootstrap-select.js') }}" defer></script>
        <script src="{{ asset('js/inewsticker.js') }}" defer></script>
        <script src="{{ asset('js/bootsnav.js') }}" defer></script>
        <script src="{{ asset('js/images-loded.min.js') }}" defer></script>
        <script src="{{ asset('js/isotope.min.js') }}" defer></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}" defer></script>
        <script src="{{ asset('js/baguetteBox.min.js') }}" defer></script>
        <script src="{{ asset('js/form-validator.min.js') }}" defer></script>
        <script src="{{ asset('js/contact-form-script.js') }}" defer></script>
        <script src="{{ asset('js/custom.js') }}" defer></script>
        <script src="{{ asset('js/popper.min.js') }}" defer></script>

        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }

        </script>
</body>


</html>
