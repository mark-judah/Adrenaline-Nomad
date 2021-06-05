<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Users</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

</head>

<body>
    @extends('layouts.master')


    @section('content')
        <div class="col-xl-12">
            <div class="section_title text-center ">
                <br>
                <h3><b>Edit User Details</b> </h3>

            </div>
        </div>

        <br>
        <div class="container col-md-12 text-center">
            <form method="post" action='{{ url('/update_user') }}'>
                {{ csrf_field() }}

                <input type="hidden" name="user_id" value="{{ $user->id }}{{ old('user_id') }}">

                <div class="form-group col-md-12 col-md-offset-5">

                    <!-- Name input -->
                    <div class="form-group">
                        <label class="form-label" for="name">Username</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" />
                    </div>

                    <!-- Email input -->
                    <div class="form-group">
                        <label class="form-label" for="email">Email address</label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}" />
                    </div>

                    <!-- Role input -->
                    <div class="form-group">
                        <label class="form-label" for="role">Role</label>
                        <select class="form-control" name="role">

                            @if ($user->role == 'admin'){
                                <option value="{{ $user->role }}">{{ $user->role }}</option>
                                <option>subscriber</option>
                                <option>author</option>
                                }
                            @endif
                            @if ($user->role == 'subscriber'){
                                <option value="{{ $user->role }}">{{ $user->role }}</option>
                                <option>admin</option>
                                <option>author</option>
                                }
                            @endif

                            @if ($user->role == 'author'){
                                <option value="{{ $user->role }}">{{ $user->role }}</option>
                                <option>admin</option>
                                <option>subscriber</option>
                                }
                            @endif

                        </select>
                    </div>


                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                    <br>
                </div>
            </form>

        </div>
    @endsection
</body>

</html>
