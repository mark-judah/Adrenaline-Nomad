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
    @isset($content)
        @if ($content->count())
            @foreach ($content as $about)
                @if (!empty($about->contact_banner))
                    <div id="blog-banner-image"
                        style="background-image: url({{ url('/banners') }}/{{ $about->contact_banner }})">
                        @if (!Auth::guest() && Auth::user()->is_admin())
                            <button data-toggle="modal" data-target="#bannerModal" class="btn btn-primary"
                                style="float:right; margin:10px;"><small>Change Banner Image</small></button>
                        @endif

                        <div class="container" style="padding:225px">
                            <h3 style="text-align: center; color:#ffffff;">Talk To Me</h3>
                            <hr class="divider my-2" />
                        </div>
                    </div>
                @else
                    <div class="blog-banner-placeholder">
                        @if (!Auth::guest() && Auth::user()->is_admin())
                            <button data-toggle="modal" data-target="#bannerModal" class="btn btn-primary"
                                style="float:right; margin:10px;"><small>Change Banner Image</small></button>
                        @endif
                    </div>
                @endif
            @endforeach
        @else
            <div class="blog-banner-placeholder">
                @if (!Auth::guest() && Auth::user()->is_admin())
                    <button data-toggle="modal" data-target="#bannerModal" class="btn btn-primary"
                        style="float:right; margin:10px;"><small>Change Banner Image</small></button>
                @endif
            </div>
        @endif
    @endisset
    <!-- Modal -->
    <div class="modal fade" id="bannerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change banner image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container col-md-12 text-center">
                        <form action="{{ url('update_contact_banner') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group col-md-12 col-md-offset-5 ">
                                <div class="form-group">
                                    <label for="contact_banner">Choose  Banner Image</label>
                                    {{-- <input required type="file" class="form-control" name="images[]" id="gallery-photo-add" multiple> --}}

                                    <input type="file" name="contact_banner" id="contact_banner" onchange="loadPreview(this);"
                                        class="form-control">
                                    <div class="gallery">
                                    </div>
                                </div>

                            </div>


                            <div class="col-md-12 text-center">
                                <input type="submit" name='publish' class="btn btn-success" value="Done" />

                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- Start Contact Us  -->
    <div class="col-lg-8 col-sm-12 mx-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Talk To Me</li>
            </ol>
        </nav>

        <div class="container">
            <h2>GET IN TOUCH</h2>
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
