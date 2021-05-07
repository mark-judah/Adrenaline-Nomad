<!DOCTYPE html>
<head>
    <title>The Adrenaline Nomad</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    <!-- Site CSS -->
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

    <head>
        <div id="loadOverlay" style="background-color:#333; position:absolute; top:0px; left:0px; width:100%; height:100%; z-index:2000;"></div>
    </head>

</head>
<body>
    @section('navbar')
    <!-- Start Main Top -->
    <header class="main-header">
        

  <!-- Navbar -->
        <!-- Start Navigation -->
        
       <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="material-icons">dehaze</i>
                    </button>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse justify-content-end" id="navbar-menu">
                    <ul class="nav navbar-nav" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item"><a class="nav-link" href="blog"><img src="{{ asset('images/logo.png') }}" style="width: 40px" height="30px"></a></li>
                        <li class="nav-item active"><a class="nav-link" href="/">The Adrenaline Nomad</a></li>
                        <li class="nav-item"><a class="nav-link" href="blog">Blogs</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">About</a></li>                       
                        <li class="nav-item"><a class="nav-link" href="/contact">Contact Us</a></li>
                        @unless (Auth::check())
                        <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                        @endunless

                        @auth
                        <li class="dropdown">
                            <a href="" class="nav-link" data-toggle="dropdown">{{Auth::user()->name}}</a>
                            <ul class="dropdown-menu">
                                @if (!Auth::guest() && Auth::user()->is_admin())
                                <li><a href="{{url('admin')}}">Admin Panel</a></li>
                                @endif
                                <li><a href="{{url('logout')}}">Logout</a></li>                               
                            </ul>
                        </li>    
                        @endauth
                        
                        <li class="nav-item ml-auto" style="float: right"><a class="nav-link">Travel | Adventure | Adrenaline | Story Telling</a></li>

                          

                    </ul>


                </div>


            </div>
            <br>

        </nav> 

        <!-- End Navigation -->

        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{$error}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
        @endforeach
    @endif
    </header>
    <!-- End Main Top -->
    @show

    
        @yield('content')
    


    @section('footer')
    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>About ADVENTURE_BLOG</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Customer Service</a></li>
                                <li><a href="#">Our Sitemap</a></li>
                                <li><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Delivery Information</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Us</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Address: Joh Doe 3756 <br>Nairobi,
                                        TODO,<br>Todo </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+1-888705770">+254722222222</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">todo@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}" defer></script>
    <script src="{{ asset('js/popper.min.js') }}" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> <!-- ALL PLUGINS -->
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
   
</body>
</html>
