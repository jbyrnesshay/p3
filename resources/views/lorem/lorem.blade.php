   @extends('layouts.master')

@section('head')
@endsection

@section('title', 'Developers Best Friend')

@section('content')
 
  <h2 class="pageheading"> Lorem Ipsum Generator </h2>
<h3>Language and # of Paragraphs you want outputted?</h3>
<div id="formselect">
<form method='POST' id="keep" action='/lorem'>
    {{ csrf_field()}}
    <input type="radio" name="languageselector" value="standard"> latin

    <input type="radio" name="languageselector" value="customEng"> english  

    <input type='text' name='paragraphs' value='{{old("paragraphs")}}'>
    <input type='submit' value='Submit'>
</form>
</div>
 
                <div id="lorem">
     

       @if(count($errors) > 0)
        <p class = "inform"> error found. see requirements below </p>
        @foreach ($errors->all() as $error)
            <p class="error">{{ $error }}</p>
            
        @endforeach
        
        @endif
       @if (isset($contents))
        <article id="left" class="lorem">
        <h2> Here is your Lorem Ipsum text: </h2>
          {!! $contents !!}


        </article>

        <article id="right" class="lorem">
        <h2> Here is the text with paragraph tags: </h2>
        @foreach($contentsarray as $paragraph)
            {{"<p>"}} {{$paragraph}} {{"</p>"}}<p></p>

        @endforeach



        </article>
        </div>
        <br class="clearfix">

       @endif

@stop