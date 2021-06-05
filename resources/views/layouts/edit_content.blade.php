<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Blogs</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">


</head>

<body>
    @extends('layouts.admin-master')

    @section('title', 'Page Title')

    @section('navbar')
        @parent
    @endsection

    @section('content')
        <div class="col-xl-12">
            <div class="section_title text-center ">
                <br>
                <h3><b>Edit Content</b> </h3>

            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header">
                Home Page 
            </div>
            <div class="card-body">
                <h5 class="card-title">Quote</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Edit</a>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header">
                About Page
            </div>
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Edit</a>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Edit</a>
            </div>
        </div>
    @stop

    @section('footer')

    @stop
</body>

</html>
