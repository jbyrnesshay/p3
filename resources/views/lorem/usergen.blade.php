@extends('layouts.master')

 
@section('head')
    <link href="/css/styles.css" type="text/css" rel='stylesheet'>
@stop

@section('title', 'Developers Best Friend')

@section('content')
<h2 class="pageheading"> Fake User Generator </h2>
     
<h3>how many users to generate?</h3>
<form method='POST' id="keep" action='/usergen'>
    {{ csrf_field() }}
    <input type = "checkbox" name ="icon"> include icon?
    <input type = "checkbox" name ="profile"> include profile?
    <input type='text' name='users'>
    <input type='submit' value='Submit'>n
</form>
 
 	
       
      <div>
       @if(count($errors) > 0)
        <p class = "inform"> error found. see requirements below </p>
        @foreach ($errors->all() as $error)
            <p class="error">{{ $error }}</p>
            
        @endforeach
        
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
                <img src="<?php echo $javatar[$i]?>">
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
        </div>

@stop
