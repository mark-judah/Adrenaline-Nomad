<!DOCTYPE html>

<head>
    <title>The Adrenaline Nomad</title>
    <!-- Bootstrap CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('css/style.css') }}" defer rel="stylesheet" type="text/css">
    <!-- Responsive CSS -->
    <link href="{{ asset('css/responsive.css') }}" defer rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="{{ asset('css/custom.css') }}" defer rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link href="{{ asset('css/bootstrap.min.css') }}" defer rel="stylesheet" type="text/css">

    <!-- Responsive CSS -->
    <link href="{{ asset('css/responsive.css') }}" defer rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="{{ asset('css/custom.css') }}" defer rel="stylesheet" type="text/css">
    <link href="{{ asset('css/loader.css') }}" defer rel="stylesheet" type="text/css">

    <head>
        <div id="loadOverlay"
            style="background-color:rgb(243, 217, 165); position:absolute; top:0px; left:0px; width:100%; height:100%; z-index:2000;">
        </div>
    </head>

</head>

<body>
    <div id="preloader"></div>

    <div>
        @section('navbar')
            <!-- Start Main Top -->
            <header class="main-header">
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
            </header>
            <!-- End Main Top -->
        @show

        <!-- Navbar -->
        <!-- Start Navigation -->

        <nav class="navbar navbar-expand-lg navbar-light navbar-default bootsnav">
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" onclick="openNav()"
                    aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="material-icons">dehaze</i>
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
                    {{-- <li class="nav-item">
                        <a href="/">
                            <a class="nav-link" href="/">The Adrenaline Nomad</a> </a>
                    </li> --}}

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

        @yield('content')

        @section('footer')
            <!-- Start Footer  -->
            <!-- Footer -->
            <footer class="page-footer font-small cyan darken-3">
                <div class="footer-copyright text-center">
                    <p>© 2021 Copyright:
                        <a href="http://theadrenalinenomad.com/"> theadrenalinenomad.com</a>
                    </p>
                </div>
                <!-- Copyright -->

            </footer>

            <!-- End Footer  -->

            <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            <script src="{{ asset('js/loader.js') }}"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

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
