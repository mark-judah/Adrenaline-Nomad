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

    <head>
        <div id="loadOverlay" style="background-color:rgb(243, 217, 165); position:absolute; top:0px; left:0px; width:100%; height:100%; z-index:2000;"></div>
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
                <div class="collapse navbar-collapse justify-content-center" id="navbar-menu">
                    <ul class="nav navbar-nav" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item"><a class="nav-link" href="/"><img src="{{ asset('images/logo.png') }}" style="width: 40px" height="30px"></a></li>
                        <li class="nav-item active"><a class="nav-link" href="/">The Adrenaline Nomad</a></li>
                        <li class="nav-item"><a class="nav-link" href="blog">Blogs</a></li>
                        <li class="nav-item"><a class="nav-link" href="/about">About</a></li>                       
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
                            <h4>About Me</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                           
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Recent Blogs</h4>
                            <ul>
                                <li>
                                    <p><a href="#">14 Falls</a></p>
                                </li>                            
                                <li>
                                    <p><a href="#">Thiririka</a></p>
                                </li>  
                                <li>
                                    <p><a href="#">Ngong Hills</a></p>
                                </li>  
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Me</h4>
                            <ul>                              
                                <li>
                                    <p><i class="fas fa-instagram"></i>Phone: <a href="tel:+1-888705770">+254722222222</a></p>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
