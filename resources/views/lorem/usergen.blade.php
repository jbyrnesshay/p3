@extends('layouts.master')

@section('head')
@endsection

@section('title', 'Developers Best Friend')

@section('content')
     
how many users to generate?
<form method='POST' id="keep" action='/usergen'>
    {{ csrf_field() }}
    <input type='text' name='users'>
    <input type='submit' value='Submit'>
</form>
 
 	
       <h1> Fake User Generator </h1>
      
       @if(count($errors) > 0)
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
       @endif
             
       

       @if (isset($usergens)) 
        <article id="left">

        <?php $userstring = json_decode($usergens); ?>
        <h2> Here are your users: </h2>
        <?php foreach ($userstring as $user) {
                echo '<p>';
                echo 'name: '.$user->name.' <br>';
                echo 'address: '.$user->address.' <br>';
                echo 'phone: '.$user->phone.'<br>';
                echo 'passsord: '.$user->password;
                echo '</p>';
            }
        ?>
        </article>

        <article id="right">
        <h2> Here are your users in JSON format: </h2>
        <!--<textarea> {!! $usergens!!} </textarea>-->
        <textarea> {{$usergens}} </textarea>
        </article>
        
       @endif

@stop
