@extends('layouts.master')

 
@section('head')
    <link href="/css/styles.css" type="text/css" rel='stylesheet'>
@stop

@section('title', 'Developers Best Friend')

@section('content')
<h2 class="pageheading"> Fake User Generator </h2>
     
<h3>how many users to generate?</h3>
<div id="formselect">
<form method='POST' id="data" action='/usergen'>
    {{ csrf_field() }}
    <input type = "checkbox" name ="makeavatar"> include custom avatar?
    <input type = "checkbox" name ="profile"> include profile?
    <input type='text' name='users'>
    <input type='submit' value='Submit'>
</form>
</div>
 
 	
       
      <div id="usergen">
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
                echo 'NAME: '.$user->firstname.' '.$user->lastname.' <br>';
                echo 'ADDR: '.$user->address.' <br>';
                echo 'PHONE: '.$user->phone.'<br>';
                echo 'EMAIL: '.$user->email.'<br>';
                echo 'PWORD: '.htmlentities($user->password).'<br>';
                if ($user->profiletext != '') {
                echo 'PROFILE: '.$user->profiletext.'<br>'; 
                } ?>
                <span id = "image">

                <?php if ($javatar[$i] != '') { echo 'AVATAR: '; ?>
                  </span>  
                <img id="avatar" src="<?php echo $javatar[$i]?>">
                 
        <?php } $i++; echo '</p>'; }?>


        

       
        
        </article>

        <article id="right">
        <h2> Here are your users in JSON format: </h2>
        
        <textarea> {{$usergens}} </textarea>
        </article>
        
       @endif
        </div>

@stop
