@extends('layouts.master')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection

@section('content')
    @if (\Session::has('message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <ul>
                <li>{!! \Session::get('message') !!}</li>
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    @endif
    <div class="blog-banner-image">
        <div class="container" style="padding:150px">
            <h3 style="text-align: center; color:#ffffff;">Talk To Me</h3>
            <hr class="divider my-2" />
        </div>
    </div>
    <br>
    <!-- Start Contact Us  -->
    <div class="col-lg-8 col-sm-12 mx-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Talk To Me</li>
            </ol>
        </nav>

        <div class="container">
            <h2>GET IN TOUCH</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed odio justo, ultrices ac nisl sed,
                lobortis porta elit. Fusce in metus ac ex venenatis ultricies at cursus mauris.</p>
            <form method="post" action="{{ url('/new-message') }}">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required
                                data-error="Please enter your name">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" placeholder="Your Email" id="email" class="form-control" name="email"
                                required data-error="Please enter your email">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject"
                                required data-error="Please enter your Subject">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea class="form-control" id="message" name="message" placeholder="Your Message" rows="4"
                                data-error="Write your message" required></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="submit-button text-center">
                            <input type="submit" name='post_message' class="btn hvr-hover" value="Send Message" />
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>



    </div>
    <!-- End Cart -->
@stop

@section('footer')

@stop
