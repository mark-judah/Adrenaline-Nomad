<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blogs</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

</head>

<body>
    @extends('layouts.master')

    @section('title', 'Page Title')


    @section('navbar')
        @parent
    @stop
    @section('content')
        @isset($about_content)
            @if ($about_content->count())
                @foreach ($about_content as $about)
                    @if (!empty($about->blog_banner))
                        <div id="blog-banner-image"
                            style="background-image: url({{ url('/banners') }}/{{ $about->blog_banner }})">
                            @if (!Auth::guest() && Auth::user()->is_admin())
                                <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary"
                                    style="float:right; margin:10px;"><small>Change Banner Image</small></button>
                            @endif

                            <div class="container" style="padding:150px">
                                <h3 style="text-align: center; color:#ffffff;">Blog Posts</h3>
                                <hr class="divider my-2" />
                            </div>
                        </div>
                    @else
                        <div class="blog-banner-placeholder">
                            @if (!Auth::guest() && Auth::user()->is_admin())
                                <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary"
                                    style="float:right; margin:10px;"><small>Change Banner Image</small></button>
                            @endif
                        </div>
                    @endif
                @endforeach
            @else
                <div class="blog-banner-placeholder">
                    @if (!Auth::guest() && Auth::user()->is_admin())
                        <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary"
                            style="float:right; margin:10px;"><small>Change Banner Image</small></button>
                    @endif
                </div>
            @endif
            {{-- @if (!$about_content->count())
                <div class="blog-banner-placeholder">
                    @if (!Auth::guest() && Auth::user()->is_admin())
                        <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary"
                            style="float:right; margin:10px;"><small>Change Banner Image</small></button>
                    @endif
                </div>
            @else
                @foreach ($about_content as $about)
                    <div id="blog-banner-image"
                        style="background-image: url({{ url('/banners') }}/{{ $about->blog_banner }})">
                        @if (!Auth::guest() && Auth::user()->is_admin())
                            <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary"
                                style="float:right; margin:10px;"><small>Change Banner Image</small></button>
                        @endif
                        <div class="container" style="padding:150px">
                            <h3 style="text-align: center; color:#ffffff;">Blog Posts</h3>
                            <hr class="divider my-2" />

                        </div>
                    </div>

                @endforeach
            @endif --}}
        @endisset
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            <form action="{{ url('update_blog_banner') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group col-md-12 col-md-offset-5 ">
                                    <div class="form-group">
                                        <label for="blog_banner">Choose Banner Image</label>
                                        {{-- <input required type="file" class="form-control" name="images[]" id="gallery-photo-add" multiple> --}}

                                        <input type="file" name="blog_banner" id="blog_banner" onchange="loadPreview(this);"
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

        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                </ol>
            </nav>

            <!--Show List Of posts-->
            @isset($posts)
                @if (!$posts->count())
                    <div class="alert alert-info" role="alert">
                        No Blog Posts are availabe.</div>
                @else
                    <div class="">
                        @foreach ($posts->chunk(3) as $chunk)
                            <div class="card-deck">
                                @foreach ($chunk as $data)
                                    <div class="col-md-4">
                                        <a href="{{ url('/' . $data->slug) }}">
                                            <div class="card">
                                                <img src="{{ url('/post_thumbnails') }}/{{ $data->blog_thumbnail }}"
                                                    class="card-img-top" alt="..." style="height: 180px">
                                                <div class="card-body">
                                                    <h5 class="card-title"><a
                                                            href="{{ url('/' . $data->slug) }}">{{ $data->title }}</a>
                                                        @if (!Auth::guest() && ($data->author_id == Auth::user()->id || Auth::user()->is_admin()))
                                                            @if ($data->active == '1')

                                                            @else
                                                                <button class="btn" style="float: right"><a
                                                                        href="{{ url('edit/' . $data->slug) }}">Edit
                                                                        Draft</a></button>
                                                            @endif
                                                        @endif
                                                    </h5>
                                                    <p class="card-text">{!! Str::words($data->body, $limit = 20, $end = '....... <a href=' . url('/' . $data->slug) . '>Read More</a>') !!}
                                                    </p>
                                                    <p class="card-footer"><small
                                                            class="text-muted">{{ $data->created_at->format('M d,Y \a\t h:i a') }}
                                                            By {{ $data->author->name }}</small>
                                                        <br>
                                                        @if (!Auth::guest() && ($data->author_id == Auth::user()->id || Auth::user()->is_admin()))
                                                            <small><a href="{{ url('edit/' . $data->slug) }}">Edit
                                                                    Post</a></small>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                @endforeach
                            </div>
                            <br>
                        @endforeach
                    </div>
                @endif
            @endisset
        </div>



    @endsection

    @section('footer')

    @stop
</body>

</html>
