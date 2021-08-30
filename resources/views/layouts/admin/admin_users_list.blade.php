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
 <div class="col-xl-12">
            <div class="section_title text-center ">
                <br>
                <h3><b>Users</b> </h3>

            </div>
        </div>
        <br>            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td><a href="{{ url('edit_user/'. $user->id) }}" class="btn btn-primary"><i class="material-icons">edit</i></a></td>
                            <td><a href="{{ url('delete_user/'. $user->id) }}" class="btn btn-danger"><i class="material-icons">delete</i></a></td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>



    @endsection

    @section('footer')

    @stop
</body>

</html>
