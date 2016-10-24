@extends('layouts.master')

@section('head')
@endsection

@section('title', 'Developers Best Friend')

@section('content')
    <h1>Welcome to Developer's Best Friend!</h1>
    <p>This app provides two functions</p>
    <ul>
    	<li><a href="{{ route('lorem.start') }}">Lorem Ipsum Generator</a></li>
    	<li ><a href="{{ route('usergen.start')}}">a Random User Generator</a></li>
    </ul>
<hr>
 

@stop
