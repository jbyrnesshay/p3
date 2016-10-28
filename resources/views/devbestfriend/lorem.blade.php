@extends('layouts.master')

@section('head')
@endsection

@section('title', 'Developers Best Friend')

@section('content')
 
<h2 class="pageheading"> Lorem Ipsum Generator </h2>
<h3>Language and how many paragraphs you want outputted?</h3>
<div id="formselect">
    <form method='POST' id="keep" action='/lorem'>
        {{ csrf_field()}}
        <input type="radio" name="languageselector" id="latin" value="standard"> 
        <label for="latin">latin</label>
        <input type="radio" name="languageselector" id="english" value="customEng"> 
        <label for="english">english</label>  
        <!-- keep old text input (numeric) value if does not pass server side validation -->
        <input type='text' name='paragraphs' value='{{old("paragraphs")}}'>
        <input type='submit' value='Submit'>
    </form>
</div>
<div id="lorem">
    <!-- if there are errors in server side validation, process this block which displays errors to the page-->
    @if(count($errors) > 0)
        <p class = "inform"> error found. see requirements below </p>
        @foreach ($errors->all() as $error)
            <p class="error">{{ $error }}</p>
        @endforeach
    @endif
    <!-- if we get to this block, display lorem text to screen -->
    <!-- isset to ensure block is not entered until the data exists from controller -->
    @if (isset($contents) && isset($contentsaddtags))
        <article id="left" class="lorem">
            <h2> Here is your Lorem Ipsum text: </h2>
            <!-- display text only, no paragraph tags -->
            {!! $contents !!}
        </article>
        <article id="right" class="lorem">
            <h2> Here is the text with paragraph tags: </h2>
            <!-- get array of paragraphs and display each one surrounded by paragraph tags -->
            @foreach($contentsaddtags as $paragraph)
                {{"<p>"}} {{$paragraph}} {{"</p>"}}
                <br><br>
            @endforeach
        </article>
    @endif
</div>
<br class="clearfix">

@endsection