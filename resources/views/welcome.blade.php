@extends('layouts.master')

@section('head')
@endsection

@section('title', 'Developers Best Friend')

@section('content')
    <h1>Welcome to Developer's Best Friend!</h1>
    <p>This app provides two functions</p>
    <ul>
    	<li><a href="{{ route('lorem.start') }}">Lorem Ipsum Generator</a></li>
    	<li>a Random User Generator</li>
    </ul>
<hr>
how many paragraphs pf lorem ipsum?
<form method='POST' action='/lorem'>
    {{ csrf_field() }}
    <input type='text' name='paragraphs'>
    <input type='submit' value='Submit'>
</form>
how many users?
<form method='POST' action='/lorem'>
    {{ csrf_field() }}
    <input type='text' name='paragraphs'>
    <input type='submit' value='Submit'>
</form>

@stop
