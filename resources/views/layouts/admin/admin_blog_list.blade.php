<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blogs</title>

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
@extends('layouts.admin.admin_master')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection

@section('content')

    <br>

    <section class="container mx-auto p-2 font-mono">
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
            <div class="w-full overflow-x-auto">
                <table class="w-full">
                    <thead>
                    <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Blog Title</th>
                        <th class="px-4 py-3">Author</th>
                        <th class="px-4 py-3">Date Posted</th>
                        <th class="px-4 py-3">Last Updated</th>
                        <th class="px-4 py-3">Edit</th>
                        <th class="px-4 py-3">Delete</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">

                    @foreach ($posts as $post)

                        <tr class="text-gray-700">
                            <th class="px-4 py-3 text-ms font-semibold border">{{ $loop->iteration }}</th>
                            <td class="px-4 py-3 text-ms font-semibold border">{{ $post->title }}</td>
                            <td class="px-4 py-3 text-ms font-semibold border">{{ $post->author->name }}</td>
                            <td class="px-4 py-3 text-ms font-semibold border">{{ $post->created_at }}</td>
                            <td class="px-4 py-3 text-ms font-semibold border">{{ $post->updated_at }}</td>
                            <td class="px-4 py-3 text-ms font-semibold border"><a
                                    href="{{ url('edit/' . $post->slug) }}" class="btn btn-primary"><i
                                        class="bi bi-pencil-square"></i>
                                </a></td>
                            <td class="px-4 py-3 text-ms font-semibold border"><a
                                    href="{{ url('delete/' . $post->id) }}" class="btn btn-danger"><i
                                        class="bi bi-trash"></i>
                                </a></td>

                        </tr>

                    </tbody>
                    @endforeach

                </table>
            </div>
        </div>
    </section>
@stop

@section('footer')

@stop
</body>

</html>
