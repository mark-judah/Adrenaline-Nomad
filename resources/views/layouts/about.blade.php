@extends('layouts.master')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection

@section('content')
        <div class="col-lg-12 col-sm-12 mx-auto">
            <div class="section_title text-center mb-55">
                <br>
                <h3><b>About Me</b> </h3>
            </div>
            <a href="#"><img src="{{ asset('images/coverPhoto.png') }}" style="width: 1200px"  class="img-fluid">
            </a>
        </div>
    <br>
    @stop

    @section('footer')

    @stop
