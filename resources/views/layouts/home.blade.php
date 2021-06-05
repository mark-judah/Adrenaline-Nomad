    @extends('layouts.master')

    @section('title', 'Page Title')


    @section('navbar')
        @parent
    @stop
    @section('content')

        <!-- Start Slider -->
        <div id="slides-shop" class="cover-slides">
            <ul class="slides-container">

                <li class="text-center">
                    <img src="{{ asset('images/banner1b.jpg') }}" class="img-responsive">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="m-b-20"><strong>THE ADRENALINE NOMAD</strong></h1>
                                <h2><span style="color:white"><strong>TRAVEL | ADVENTURE | ADRENALINE | STORY
                                            TELLING</strong></span></h2>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="text-center">
                    <img src="{{ asset('images/banner1c.jpg') }}" class="img-responsive">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="m-b-20"><strong>THE ADRENALINE NOMAD</strong></h1>
                                <h2><span style="color:white"><strong>TRAVEL | ADVENTURE | ADRENALINE | STORY
                                            TELLING</strong></span></h2>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="text-center">
                    <img src="{{ asset('images/banner1a.jpg') }}" class="img-responsive">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="m-b-20"><strong>THE ADRENALINE NOMAD</strong></h1>
                                <h2><span style="color:white"><strong>TRAVEL | ADVENTURE | ADRENALINE | STORY
                                            TELLING</strong></span></h2>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </div>

        <br>
        <p style="text-align: center;">My mission in life is not to merely survive but to thrive and to do so
            with some passion, some compassion, some humor, and some style
        </p>
        <p style="text-align: center;"><strong>~Maya Angelou</strong></p>
        <br>
        <!-- End Slider -->
        <div class="container">
            <div class="col-xl-12 col-xs-12 col-centered">
                <div class="section_title text-center mb-55">
                    <h3><b>Latest Posts</b> </h3>
                </div>
            </div>
            <!--Show List Of posts-->
            @isset($posts)
                @if (!$posts->count())
                    <div class="alert alert-info" role="alert">
                        No Blog Posts are availabe.Login to write a new post </div>
                @else
                    <div class="col-lg-12 col-sm-12 col-centered">
                        @foreach ($posts->chunk(4) as $chunk)
                            <div class="card-deck">
                                @foreach ($chunk as $data)
                                    <div class="col-md-3">
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
                                                {{-- <p class="card-footer"><small
                                                        class="text-muted">{{ $data->created_at->format('M d,Y \a\t h:i a') }}
                                                        By <a
                                                            href="{{ url('/user/' . $data->author_id) }}">{{ $data->author->name }}</a></small>

                                                </p> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <br>
                        @endforeach
                        <br>

                    </div>
                @endif
            @endisset
        </div>

    @endsection

    @section('footer')

    @stop
    </body>

    </html>
