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
                    <img src="{{ asset('images/banner1b.jpg') }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="m-b-20"><strong>Welcome To Adventure Blog</strong></h1>
                                <p class="m-b-40">My mission in life is not to merely survive but to thrive and to do so
                                    with some passion, some compassion, some humor, and some style ~Maya Angelou
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="text-center">
                    <img src="{{ asset('images/banner1c.jpg') }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="m-b-20"><strong>Welcome To Adventure Blog</strong></h1>
                                <p class="m-b-40">My mission in life is not to merely survive but to thrive and to do so
                                    with some passion, some compassion, some humor, and some style ~Maya Angelou
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="text-center">
                    <img src="{{ asset('images/banner1a.jpg') }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="m-b-20"><strong>Welcome To Adventure Blog</strong></h1>
                                <p class="m-b-40">My mission in life is not to merely survive but to thrive and to do so
                                    with some passion, some compassion, some humor, and some style ~Maya Angelou
                                </p>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </div>

        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="section_title text-center mb-55">
                        <h3><b>About Me</b> </h3>
                    </div>
                    <!-- Gallery -->
<div class="row">
    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
      <img
        src="{{ asset('images/gtz.jpg') }}"
        class="w-100 shadow-1-strong rounded mb-4"
        alt=""
      />
  
      <img
        src="{{ asset('images/gtb.jpg') }}"
        class="w-100 shadow-1-strong rounded mb-4"
        alt=""
      />
    </div>
  
    <div class="col-lg-4 mb-4 mb-lg-0">
        <img
        src="{{ asset('images/gt.jpg') }}"
        class="w-100 shadow-1-strong rounded mb-4"
        alt=""
      />

      <img
        src="{{ asset('images/gty.jpg') }}"
        class="w-100 shadow-1-strong rounded mb-4"
        alt=""
      />
  
      
    </div>
  
    <div class="col-lg-4 mb-4 mb-lg-0">
      <img
        src="{{ asset('images/gta.jpg') }}"
        class="w-100 shadow-1-strong rounded mb-4"
        alt=""
      />
  
      <img
        src="{{ asset('images/gtc.jpg') }}"
        class="w-100 shadow-1-strong rounded mb-4"
        alt=""
      />
    </div>
  </div>
  <!-- Gallery -->
                    {{-- <img src="{{ asset('images/gt.jpg') }}" style="width: 600px"> --}}
                </div>
                <div class="col-md-3">
                    <div class="section_title text-center mb-55">
                        <h3><b>Places to visit in Nairobi</b> </h3>
                    </div>
                        <div class="d-flex flex-row">
                            <div class="p-2"><img src="{{ asset('images/gtd.jpg') }}" style="width: 100px">
                            </div>
                            <div class="p-2">Family friendy adventures</div>
                            
                        </div>
                        {{-- <> --}}
                        <div class="d-flex flex-row">
                            <div class="p-2"><img src="{{ asset('images/gte.jpg') }}" style="width: 100px" height="80px">
                            </div>
                            <div class="p-2">Perfect spots for dates</div>
                            
                        </div>
                        {{-- <> --}}
                        <div class="d-flex flex-row">
                            <div class="p-2"><img src="{{ asset('images/gtf.jpg') }}" style="width: 100px">
                            </div>
                            <div class="p-2">Cycling chronicles</div>
                            
                        </div>
                        {{-- <> --}}
                        <div class="d-flex flex-row">
                            <div class="p-2"><img src="{{ asset('images/karura.jpg') }}" style="width: 100px">
                            </div>
                            <div class="p-2">For Adrenaline junkies</div>
                            
                        </div>
                        {{-- <> --}}
                </div>
            </div>
        </div>

        </div>
        </div>

        <!-- End Slider -->
        <div class="container">
            <br>
            <div class="col-xl-12">
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
                    <div class="">
                        @foreach ($posts->chunk(4) as $chunk)
                            <div class="card-deck">
                                @foreach ($chunk as $data)
                                    <div class="col-md-3">
                                        <div class="card" style="width: 14rem;">
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

                                                </p>
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
