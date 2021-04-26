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

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title" style=" width: 100%;
                                        text-align: center;">{{ $data['posts']->title }}</h5>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Start Slider -->
                            
                            <div id="slides-shop" class="cover-slides">
                                <ul class="slides-container">
                                   
                                    <li class="text-center">
                                        <img src="{{ url('/post_thumbnails') }}/{{ $data['posts']->photo_name }}">
                                       
                                    </li>
                                    <li class="text-center">
                                        <img src="{{ asset('images/banner1c.jpg') }}">
                                       
                                    </li>
                                    <li class="text-center">
                                        <img src="{{ asset('images/banner1a.jpg') }}">
                                       
                                    </li>

                                </ul>
                            </div>



                            <!-- End Slider -->

                        </div>



                        <div class="col-md-6">
                            <p class="card-text">{!! $data['posts']->body !!}</p>
                            <p class="card-text"><small
                                    class="text-muted">{{ $data['posts']->created_at->format('M d,Y \a\t h:i a') }} By
                                    <a
                                        href="{{ url('/user/' . $data['posts']->author_id) }}">{{ $data['posts']->author->name }}</a></small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div>

                <div class="coment-bottom bg-white p-2 px-4">
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
        @else
            404 error
    @endif

    
@endsection
