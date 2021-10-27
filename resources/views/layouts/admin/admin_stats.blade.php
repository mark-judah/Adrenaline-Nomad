<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics</title>
    <link href="{{asset('/css/component.min.css')}}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{asset('/js/echart.min.js')}}"></script>

</head>

<body>
@extends('layouts.admin.admin_master')

@section('navbar')
    @parent
@endsection

@section('content')
    @livewire('stats')
@stop

@section('footer')

@stop
@livewireScripts


</body>

</html>
