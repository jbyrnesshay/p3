@extends('layouts.master')

@section('head')
@endsection

@section('title', 'Developers Best Friend')

@section('content')
     
how many paragraphs pf lorem ipsum?
<form method='POST' id="keep" action='/lorem'>
    {{ csrf_field() }}
    <input type='text' name='paragraphs'>
    <input type='submit' value='Submit'>
</form>
 
 	
       <h1> Lorem Ipsum Generator </h1>
       @if (isset($contents)) {
        <article id="left">
        <h2> Here is your Lorem Ipsum text: </h2>
        {!! $contents !!}
        </article>

        <article id="right">
        <h2> Here is your Lorem Ipsul text with Paragraph tags: </h2>
        <textarea>  {!! $contents !!} </textarea>
        </article>
        }
       @endif

@stop
