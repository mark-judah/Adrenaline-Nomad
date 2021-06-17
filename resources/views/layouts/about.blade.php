@extends('layouts.master')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection

@section('content')
    <div class="blog-banner-image">
        <div class="container" style="padding:150px">
                <h3 style="text-align: center; color:#ffffff;">About Me</h3>
                <hr class="divider my-2" />
        </div>
    </div>
    <br>

        <div class="col-lg-10 col-sm-12 mx-auto">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About Me</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-6">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean
                        massa.
                        Cum
                        sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                        <br>
                        <br>

                        Donec quam felis,
                        ultricies
                        nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo,
                        fringilla
                        vel,
                        aliquet nec, vulputate eget, arcu.
                        <br>
                        In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.
                        Nullam dictum
                        felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean
                        vulputate
                    </p>
                </div>

                <div class="col-md-6">
                    <a href="#"><img src="{{ asset('images/coverPhoto.png') }}" class="img-fluid">
                    </a>
                    <br>
                    <br>
                </div>
            </div>


    </div>

    <br>
@stop

@section('footer')

@stop
