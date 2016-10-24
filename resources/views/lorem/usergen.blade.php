@extends('layouts.master')

@section('head')
@endsection

@section('title', 'Developers Best Friend')

@section('content')
     
how many users to generate?
<form method='POST' id="keep" action='/lorem'>
    {{ csrf_field() }}
    <input type='text' name='paragraphs'>
    <input type='submit' value='Submit'>
</form>
 
 	
       <h1> Fake User Generator </h1>
       @if (isset($contents)) {
        <article id="left">
        <h2> Here are your users: </h2>
        {!! $contents !!}
        </article>

        <article id="right">
        <h2> Here are your users: </h2>
        <textarea>  {!! $contents !!} </textarea>
        </article>
        }
       @endif

@stop
