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
    <br>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Blog Title</th>
                <th scope="col">Author</th>
                <th scope="col">Date Posted</th>
                <th scope="col">Last Updated</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->author->name}}</td>
                <td>{{$post->created_at}}</td>
                <td>{{$post->updated_at}}</td>
                
            </tr>
            @endforeach

        </tbody>
    </table>
    @stop

    @section('footer')

    @stop
</body>
</html>
