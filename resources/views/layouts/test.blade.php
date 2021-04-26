<!DOCTYPE html>

<head>
    <title>TODO MBTI</title>

    <head>
        <div id="loadOverlay"
            style="background-color:#333; position:absolute; top:0px; left:0px; width:100%; height:100%; z-index:2000;">
        </div>
    </head>

</head>

<body>

    <!-- Start Main Top -->
    <header class="main-header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu"
                        aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="material-icons">dehaze</i>
                    </button>
                    <a class="navbar-brand" href="/"><img src="images/logo.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about">About Us</a></li>
                        <li class="nav-item"><a href="{{ url('livestock-view') }}" class="nav-link"
                                data-toggle="dropdown">Take a Test!</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact-us">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>

                        <li class="dropdown">
                            <a href="" class="nav-link" data-toggle="dropdown"></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('admin') }}">Admin Panel</a></li>

                                <li><a href="{{ url('logout') }}">Logout</a></li>
                            </ul>
                        </li>


                    </ul>



                </div>


            </div>
        </nav>
    </header>
</body>

</html>
