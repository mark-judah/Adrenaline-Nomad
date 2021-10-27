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
@extends('layouts.admin.admin_master')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection

@section('content')
    <div class="col-xl-12">
        <div class="section_title text-center ">
            <br>
            <h3><b>Messages</b></h3>

        </div>
    </div>
    <br>
    <section class="container mx-auto p-2 font-mono">
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
            <div class="w-full overflow-x-auto">
                <table class="w-full">
                    <thead>
                    <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">

                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Subject</th>
                        <th class="px-4 py-3">Message</th>
                        <th class="px-4 py-3">Time Sent</th>
                        <th class="px-4 py-3">Reply</th>
                        <th class="px-4 py-3">Status</th>

                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    @foreach ($messages as $message)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="px-4 py-3 text-ms font-semibold border">{{ $message->name }}</td>
                            <td class="px-4 py-3 text-ms font-semibold border">{{ $message->email }}</td>
                            <td class="px-4 py-3 text-ms font-semibold border">{{ $message->subject }}</td>
                            <td class="px-4 py-3 text-ms font-semibold border">{{ $message->message }}</td>
                            <td class="px-4 py-3 text-ms font-semibold border">{{ $message->created_at }}</td>
                            <td class="px-4 py-3 text-ms font-semibold border">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal">
                                    <i class="bi bi-reply"></i>
                                </button>
                            </td>
                            <td class="px-4 py-3 text-ms font-semibold border">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal">
                                    <i class="bi bi-check-all"></i>
                                </button>
                            </td>

                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <form action="{{ url('email_response') }}" method="post"
                                                  enctype="multipart/form-data">
                                                {{ csrf_field() }}

                                                <div class="form-group col-md-12 col-md-offset-5 ">
                                                    <input type="hidden" name="sender_name"
                                                           value="{{ $message->name }}"/>
                                                    <input type="hidden" name="sender_email"
                                                           value="{{ $message->email }}"/>

                                                    <input required="required" type="text" name="message"
                                                           placeholder="Enter Response"
                                                           class="form-control"/>
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <input type="submit" name='send' class="btn btn-success"
                                                           value="Send"/>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </div>
                            </div>

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>

@stop

@section('footer')

@stop
</body>

</html>
