  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>The Adrenaline Nomad</title>


  </head>

  <body>

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
                      <img class="img-responsive" src="{{ asset('images/banner1b.jpg') }}">
                      <div class="container">
                          <div class="row">
                              <div class="col-md-12">
                                  <h1 class="m-b-20"><strong>THE ADRENALINE NOMAD</strong></h1>
                                  <h2><span style="color:white">TRAVEL | ADVENTURE | ADRENALINE | STORY
                                          TELLING</span></h2>
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
                                  <h2><span style="color:white">TRAVEL | ADVENTURE | ADRENALINE | STORY
                                          TELLING</span></h2>
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
                                  <h2><span style="color:white">TRAVEL | ADVENTURE | ADRENALINE | STORY
                                          TELLING</span></h2>
                              </div>
                          </div>
                      </div>
                  </li>

              </ul>
          </div>
          <br>
          <br>
          <div class="col-xl-12 col-xs-12 col-centered">
              <div class="section_title text-center mb-55">
                  <h3><b>About Me</b> </h3>
              </div>
          </div>

          <div class="how-section1">
              <div class="row">
                  <div class="col-md-4 how-img">
                      <img src="{{ asset('images/dp.png') }}" class="rounded-circle img-fluid" alt="" />
                  </div>
                  <div class="col-md-8">
                      @foreach ($content as $about)
                          <p class="text-muted">{!! Str::words($about->about_content, $limit = 30, $end = '....... <a href=' . url('/about') . '>Read More</a>') !!}</p>

                      @endforeach

                      <p class="text-muted">My mission in life is not to merely survive but to thrive and to do so
                          with some passion, some compassion, some humor, and some style.
                          <br>
                          <strong>~Maya Angelou</strong>
                      </p>


                  </div>
              </div>


          </div>

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
                          No Blog Posts are availabe.</div>
                  @else
                      <div class="col-lg-12 col-sm-12 col-centered">
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

                                                      </p>
                                                  </div>
                                              </div>
                                          </a>
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
