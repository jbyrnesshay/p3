@extends('layouts.master')

@section('head')
@endsection

@section('title', 'Developers Best Friend')

@section('content')
     
how many users to generate?
<form method='POST' id="keep" action='/usergen'>
    {{ csrf_field() }}
    <input type = "checkbox" name ="icon"> include icon?
    <input type = "checkbox" name ="profile"> include profile?
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
       <!-- <img src="<?php// echo $avatar ?>" />-->
        

        <?php $userstring = json_decode($usergens); ?>
        <h2> Here are your users: </h2>
        <?php $i=0; ?>
        <?php foreach ($userstring as $user) {
                echo '<p>';
                echo 'name: '.$user->firstname.' '.$user->lastname.' <br>';
                echo 'address: '.$user->address.' <br>';
                echo 'phone: '.$user->phone.'<br>';
                echo 'email: '.$user->email.'<br>';
                echo 'passsord: '.htmlentities($user->password).'<br>';
                echo 'initials: '.$user->initials.'<br>';
                echo 'profile: '.$user->profiletext; 
                
               
        ?>
                <img src="<?php echo $gavatar[$i]?>">
                </p>
        <?php  $i++;}
        ?>
        

       
        
        </article>

        <article id="right">
        <h2> Here are your users in JSON format: </h2>
        <!--<textarea> {!! $usergens!!} </textarea>-->
        <textarea> {{$usergens}} </textarea>
        </article>
        
       @endif

@stop
