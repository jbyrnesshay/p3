@extends('layouts.master')

@section('head')
@endsection

@section('title', 'Developers Best Friend')

@section('content')
    <h2 class="pageheading">Welcome to Developer's Best Friend!</h2>
    <h3>This app provides two functions</h3>
    <ul class = "about">
    	<li class ="about"><a href="{{ route('lorem.start') }}">Lorem Ipsum Generator</a></li>
    	<li class ="about"><a href="{{ route('usergen.start')}}">a Random User Generator</a></li>
    </ul>
<hr>
<div id="about">
<h4> About the project: </h4>
 <h5>Lorem Ipsum Generator</h5> <p>provides dummy text that can be copied and pasted for testing, filling out a web development project, or for any purpose at all.  It allows the user to request number of paragraphs (1 to 50) as well as to choose either English or Latin text.  
  Text is then provided as output, according to these user requests, in two separate formats:   </p>
  <ul>
  <li>text only</li>
  <li>text with html paragraph tags </li>
  </ul>
  <hr>
<h5>Fake User Generator </h5><p>provides fake user profiles, consisting of name, address, phone, email, password for each fake user.  Additionally, the option is provided to request a very brief profile blurb for each user, as well as a custom avatar image for each user.  This app will output between 1 and 50 fake users per usage, based upon the user's selection choice.  The output is provided in two separate formats: </p>
<ul>
<li> visual-friendly, with label for each value </li>
<li> as a JSON object </li>
</ul>
</div>

@stop
