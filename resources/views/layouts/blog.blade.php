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
    <div class="container">
        <h1 style="text-align: center;">Blog Posts</h1>
        <hr class="divider my-4" />
        <!--Show List Of posts-->
        @isset($posts)
            @if (!$posts->count())
                There is no post till now. Login and write a new post now!!!
            @else
                <div class="">
                    @foreach ($posts->chunk(4) as $chunk)
                    <div class="card-deck">
                            @foreach ($chunk as $data)
                            <div class="col-md-3">
                                <div class="card" style="width: 15rem;">
                                        <img src="{{ url('/post_thumbnails') }}/{{ $data->photo_name }}"
                                            class="card-img-top" alt="..." style="height: 150px">
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
                                                    By <a
                                                        href="{{ url('/user/' . $data->author_id) }}">{{ $data->author->name }}</a></small>
                                                       <br>
                                                        <small><a href="{{ url('edit/'.$data->slug)}}">Edit Post</a></small>                                                    </p>
                                        </div>
                                    </div>
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
