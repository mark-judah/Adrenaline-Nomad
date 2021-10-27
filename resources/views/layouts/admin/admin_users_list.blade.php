<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

</head>

<body>
@extends('layouts.admin.admin_master')

@section('title', 'Page Title')


@section('navbar')
    @parent
@stop
@section('content')
    <div class="container">

        <section class="container mx-auto p-2 font-mono">
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                        <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">

                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Role</th>
                            <th class="px-4 py-3">Date Created</th>
                            <th class="px-4 py-3">Edit</th>
                            <th class="px-4 py-3">Delete</th>

                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach ($users as $user)
                            <tr>
                                <th class="px-4 py-3 text-ms font-semibold border">{{ $loop->iteration }}</th>
                                <td class="px-4 py-3 text-ms font-semibold border">{{ $user->name }}</td>
                                <td class="px-4 py-3 text-ms font-semibold border">{{ $user->email }}</td>
                                <td class="px-4 py-3 text-ms font-semibold border">{{ $user->role }}</td>
                                <td class="px-4 py-3 text-ms font-semibold border">{{ $user->created_at }}</td>
                                <td class="px-4 py-3 text-ms font-semibold border"><a href="{{ url('edit_user/' . $user->id) }}" class="btn btn-primary"><i
                                            class="bi bi-pencil-square"></i>
                                    </a></td>
                                <td class="px-4 py-3 text-ms font-semibold border"><a href="{{ url('delete_user/' . $user->id) }}" class="btn btn-danger"><i
                                            class="bi bi-trash"></i>
                                    </a></td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('footer')

@stop
</body>

</html>
