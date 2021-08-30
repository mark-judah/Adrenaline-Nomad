<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $posts->title }}</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

</head>


<body>
    @extends('layouts.master')
    @section('title')
        @if ($posts)
            {{ $posts->title }}
            @if (!Auth::guest() && ($posts->author_id == Auth::user()->id || Auth::user()->is_admin()))
                <button class="btn" style="float: right"><a href="{{ url('edit/' . $posts->slug) }}">Edit
                        Post</a></button>
            @endif
        @else
            Page does not exist
        @endif
    @endsection

    @section('content')
        <div id="blog-banner-image" style="background-image: url({{ url('/banners') }}/{{ $posts->slug_banner }})">
            @if (!Auth::guest() && Auth::user()->is_admin())
                <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary"
                    style="float:right; margin:10px;"><small>Change Banner Image</small></button>
            @endif
            <div class="container" style="padding:150px">
                <h3 style=" width: 100%; text-align: center; color:#ffffff;">
                    {{ $posts->title }}</h3>
                <hr class="divider my-2" />
            </div>
        </div>

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
                            <form action="{{ url('update_slug_banner') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="post_id" value="{{ $posts->id }}">
                                <input type="hidden" name="slug" value="{{ $posts->slug }}">

                                <div class="form-group col-md-12 col-md-offset-5 ">
                                    <div class="form-group">
                                        <label for="slug_banner">Choose Banner Image</label>
                                        {{-- <input required type="file" class="form-control" name="images[]" id="gallery-photo-add" multiple> --}}

                                        <input type="file" name="slug_banner" id="slug_banner" onchange="loadPreview(this);"
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
        @if ($posts)

            <div class="container">
                <div class="col-lg-10 col-sm-12 mx-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/blogs">Blogs</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="/">{{ $posts->title }}</a></li>
                        </ol>
                    </nav>
                    <p style="text-align: center;">{!! $posts->body !!}</p>
                    @isset($posts->created_at)
                        <p class="card-text"><small class="text-muted">{{ $posts->created_at->format('M d,Y \a\t h:i a') }}
                                By
                                <a href="{{ url('/user/' . $posts->author_id) }}">{{ $posts->author->name }}</a></small>
                        </p>
                    @endisset

                    <div class="coment-bottom bg-white">
                        <div>
                            <h2>Leave a comment</h2>
                        </div>

                        <div class="panel-body">
                            <form method="post" action="/add_comment">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="on_post" value="{{ $posts->id }}">
                                <input type="hidden" name="slug" value="{{ $posts->slug }}">

                                <div class="form-group">
                                    <input required="required" type="text" name="name" placeholder="Enter name here"
                                        class="form-control" />
                                </div>

                                <div class="form-group">
                                    <textarea required="required" placeholder="Enter comment here" name="body"
                                        class="form-control"></textarea>
                                </div>
                                <input type="submit" name='post_comment' class="btn btn-success" value="Post" />
                            </form>
                        </div>


                        <br>
                        <ul style="list-style: none; padding: 0">
                            @if ($comments)

                                @foreach ($comments as $comment)
                                    <div class="list-group">
                                        <a href="#"
                                            class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5>{{ $comment->name }}</h5>
                                                <small class="text-muted">
                                                    <p>{{ $comment->created_at->format('M d,Y \a\t h:i a') }}</p>
                                                </small>
                                            </div>
                                            <p>{{ $comment->body }}</p>

                                        </a>
                                    </div>
                                    <br>
                                @endforeach
                            @endif
                        </ul>


                    </div>
                </div>
            </div>

        @else
            404 error
        @endif


    @endsection

    @section('footer')

    @stop

</body>

</html>
