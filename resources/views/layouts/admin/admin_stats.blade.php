<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics</title>

</head>

<body>
@extends('layouts.admin.admin_master')

@section('navbar')
    @parent
@endsection

@section('content')
    <div class="col-xl-12">
        <div class="section_title text-center ">
            <br>
            <h3><b>Statistics</b> </h3>

        </div>
    </div>
    @livewire('stats')
@stop

@section('footer')

@stop
@livewireScripts

</body>

</html>
