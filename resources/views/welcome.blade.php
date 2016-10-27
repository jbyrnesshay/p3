@extends('layouts.master')

@section('head')
@endsection

@section('title', 'Developers Best Friend')

@section('content')
    <h2 class="pageheading">Welcome to Developer's Best Friend!</h2>
    <h3>This app provides two functions</h3>
    <ul>
    	<li><a href="{{ route('lorem.start') }}">Lorem Ipsum Generator</a></li>
    	<li ><a href="{{ route('usergen.start')}}">a Random User Generator</a></li>
    </ul>
<hr>
 

@stop
