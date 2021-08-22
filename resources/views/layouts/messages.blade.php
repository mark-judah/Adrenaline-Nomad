<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Messages</title>
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
                <h3><b>Messages</b> </h3>

            </div>
        </div>
        <br>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Message</th>
                    <th scope="col">Time Sent</th>
                    <th scope="col">Reply</th>
                    <th scope="col">Status</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->subject }}</td>
                        <td>{{ $message->message }}</td>
                        <td>{{ $message->created_at }}</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <i class="material-icons">reply</i>
                            </button>
                        </td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <i class="material-icons">done</i>
                            </button>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reply</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container col-md-12 text-center">
                            <form action="{{ url('/update_about_content') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group col-md-12 col-md-offset-5 ">
                                    <div class="form-group">
                                        <label for="subject">Subject</label>

                                        <input required="required" type="text" name="subject" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label for="message">Message</label>

                                        <input required="required" type="text" name="reply" class="form-control" />
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <input type="submit" name='send' class="btn btn-success" value="Send" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @stop

    @section('footer')

    @stop
</body>

</html>