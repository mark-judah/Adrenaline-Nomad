<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $data['posts']->title }}</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

</head>


<body>
    @extends('layouts.master')
    @section('title')
        @if ($data['posts'])
            {{ $data['posts']->title }}
            @if (!Auth::guest() && ($data['posts']->author_id == Auth::user()->id || Auth::user()->is_admin()))
                <button class="btn" style="float: right"><a href="{{ url('edit/' . $data['posts']->slug) }}">Edit
                        Post</a></button>
            @endif
        @else
            Page does not exist
        @endif
    @endsection

    @section('content')
        <br>
        @if ($data['posts'])
            <h5 style=" width: 100%; text-align: center;">
                {{ $data['posts']->title }}</h5>
            <hr class="divider my-2" />

            <div class="container">
                <div class="col-lg-8 col-sm-12 mx-auto">
                    <p style="text-align: center;">{!! $data['posts']->body !!}</p>
                    <p class="card-text"><small
                            class="text-muted">{{ $data['posts']->created_at->format('M d,Y \a\t h:i a') }} By
                            <a
                                href="{{ url('/user/' . $data['posts']->author_id) }}">{{ $data['posts']->author->name }}</a></small>
                    </p>

                    <div class="coment-bottom bg-white">
                        <div>
                            <h2>Leave a comment</h2>
                        </div>
                        @if (Auth::guest())
                            <a class="nav-link" href="/login">Login to Comment</a>
                            <br>
                        @else
                            <div class="panel-body">
                                <form method="post" action="/comment/add">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="on_post" value="{{ $data['posts']->id }}">
                                    <input type="hidden" name="slug" value="{{ $data['posts']->slug }}">
                                    <div class="form-group">
                                        <textarea required="required" placeholder="Enter comment here" name="body"
                                            class="form-control"></textarea>
                                    </div>
                                    <input type="submit" name='post_comment' class="btn btn-success" value="Post" />
                                </form>
                            </div>
                        @endif

                        <br>
                        @if ($data['comments'])
                            <ul style="list-style: none; padding: 0">
                                @foreach ($data['comments'] as $comment)
                                    <div class="list-group">
                                        <a href="#"
                                            class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5>{{ $comment->author->name }}</h5>
                                                <small class="text-muted">
                                                    <p>{{ $comment->created_at->format('M d,Y \a\t h:i a') }}</p>
                                                </small>
                                            </div>
                                            <p>{{ $comment->body }}</p>

                                        </a>
                                    </div>
                                    <br>
                                @endforeach
                            </ul>
                        @endif

                    </div>
                </div>
            </div>

        @else
            404 error
        @endif


    @endsection
</body>

</html>
