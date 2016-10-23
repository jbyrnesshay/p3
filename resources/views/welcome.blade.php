@extends('layouts.master')

@section('title', 'Developers Best Friend')

@section('content')
    <h1>Welcome to Developer's Best Friend!</h1>
    <p>This app provides two functions</p>
    <ul>
    	<li>a Lorem Ipsum Generator </li>
    	<li>a Random User Generator</li>
    </ul>
<hr>
how many paragraphs pf lorem ipsum?
<form method='POST' action='/show'>
    {{ csrf_field() }}
    <input type='text' name='paragraphs'>
    <input type='submit' value='Submit'>
</form>

@endsection
