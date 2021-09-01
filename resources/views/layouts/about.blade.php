<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <script>
        $(document).ready(function() {
            $('.mce-notification-inner')
                .hide(); //enter the class or id of the particular html element which you wish to hide. 
        });

    </script>
</head>


<body>
    @extends('layouts.master')

    @section('title', 'Page Title')

    @section('navbar')
        @parent
    @endsection

    @section('content')
        @isset($content)
            @if ($content->count())
                @foreach ($content as $about)
                    @if (!empty($about->about_banner))
                        <div id="blog-banner-image"
                            style="background-image: url({{ asset('/banners') }}/{{ $about->about_banner }})">
                            @if (!Auth::guest() && Auth::user()->is_admin())
                                <button data-toggle="modal" data-target="#bannerModal" class="btn btn-primary"
                                    style="float:right; margin:10px;"><small>Change Banner Image</small></button>
                            @endif

                            <div class="container" style="padding:150px">
                                <h3 style="text-align: center; color:#ffffff;">About Me</h3>
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
                            <form action="{{ url('update_about_banner') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group col-md-12 col-md-offset-5 ">
                                    <div class="form-group">
                                        <label for="about_banner">Choose Banner Image</label>
                                        {{-- <input required type="file" class="form-control" name="images[]" id="gallery-photo-add" multiple> --}}

                                        <input type="file" name="about_banner" id="about_banner"
                                            onchange="loadPreview(this);" class="form-control">
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

        <div class="col-lg-10 col-sm-12 mx-auto">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About Me</li>

                </ol>

            </nav>
            <div class="row">
                <div class="col-md-6">
                    @foreach ($content as $about)
                        <p>{!! $about->about_content !!}</p>
                    @endforeach
                    @if (!Auth::guest() && Auth::user()->is_admin())
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <small>Update About Me</small>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update Content</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container col-md-12 text-center">
                                            <form action="{{ url('/update_about_content') }}" method="post"
                                                enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="form-group col-md-12 col-md-offset-5 ">

                                                    <div class="form-group">
                                                        <textarea class="description" name="body">

                                                                                                                                @foreach ($content as $about)
                                                                                                                                                    {{ $about->about_content }}
                                                                                                                                                @endforeach  
                                                                                                                            </textarea>
                                                        <script src="https://cloud.tinymce.com/stable/tinymce.min.js">
                                                        </script>
                                                        <script>
                                                            tinymce.init({
                                                                selector: 'textarea',
                                                                width: 400,
                                                                height: 300,
                                                                plugins: 'paste',
                                                                paste_data_images: true,

                                                                image_class_list: [{
                                                                    title: 'img-responsive',
                                                                    value: 'img-responsive'
                                                                }, ]


                                                            });

                                                        </script>
                                                    </div>
                                                </div>


                                                <div class="col-md-12 text-center">
                                                    <input type="submit" name='publish' class="btn btn-success"
                                                        value="Done" />

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
                    @endif

                </div>

                <div class="col-md-6">
                    <img src="{{ asset('images/coverPhoto.png') }}" class="img-fluid">
                    <br>
                    <br>
                </div>
            </div>


        </div>

        <br>
    @stop

    @section('footer')

    @stop

</body>

</html>
