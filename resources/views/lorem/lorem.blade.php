@extends('layouts.master')

@section('head')
@endsection

@section('title', 'Developers Best Friend')

@section('content')
     
how many paragraphs pf lorem ipsum?
<form method='POST' id="keep" action='/lorem'>
    {{ csrf_field()}}
    <input type="radio" name="switch" value="standard" checked>standard
    <input type="radio" name="switch" value="customEng"> english <br>
    <input type='text' name='paragraphs' value='{{old("paragraphs")}}'>
    <input type='submit' value='Submit'>
</form>
 
 		<div>
       <h1> Lorem Ipsum Generator </h1>

       @if(count($errors) > 0)
    	<ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    	</ul>
	@endif
       @if (isset($contents)) 
        <article id="left" class="lorem">
        <h2> Here is your Lorem Ipsum text: </h2>
        {!! $contents !!}
        </article>

        <article id="right" class="lorem">
        <h2> Here is your Lorem Ipsul text with Paragraph tags: </h2>
        {{ $contents }}  
        </article>
        </div>
        
       @endif

@stop
