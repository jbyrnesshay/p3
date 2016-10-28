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
                <input type = "checkbox" id="avat" name ="makeavatar">  
                <label for="avat">include custom avatar?</label>  
                <input type = "checkbox" id="prof" name ="profile">  
                 <label for="prof">include profile?</label>  
                <input type='text' name='users'>
                <input type='submit' value='Submit'>
        </form>
</div>      
<div id="usergen">
        <!-- if server side validation errors, enter this block to display errors -->
        @if(count($errors) > 0)
                <p class = "inform"> error found. see requirements below </p>
                @foreach ($errors->all() as $error)
                        <p class="error">{{ $error }}</p>
                @endforeach
        @endif
        <!-- ensure this block is not entered unless $usergens isset -->
        @if (isset($usergens)) 
                <article id="left">
                <!-- decode the $usergens array to make it easy to make a nice display -->
                <?php $userstring = json_decode($usergens); ?>
                <h2> Here are your users: </h2>
                
                <!-- prepare php counter for looping through avatars if needed -->
                <?php $i=0; ?>  
                <!-- the display user process was tripping me up in its complexity, so i switched to standard php syntax here -->
                <?php foreach ($userstring as $user) {
                        echo '<p>';
                        echo 'NAME: '.$user->firstname.' '.$user->lastname.' <br>';
                        echo 'ADDR: '.$user->address.' <br>';
                        echo 'PHONE: '.$user->phone.'<br>';
                        echo 'EMAIL: '.$user->email.'<br>';
                        // html trips up on some symbols in the generated passwords, use htmlentities //
                        echo 'PWORD: '.htmlentities($user->password).'<br>';
                        // if profiletext exists in the users array of data, display it //
                        if ($user->profiletext != '') {
                            echo 'PROFILE: '.$user->profiletext.'<br>'; 
                        } ?>
                        <!-- if avatar exists in the users array of data, display it -->
                        <!-- span for styling of the AVATAR label to position pleasingly opposed to the avatar image-->
                        <?php if ($javatar[$i] != '') { echo '<span id="image">'.'AVATAR: '.'</span>'; ?>
                            <!--$javatar was passed in addition to the $usergens array -->
                            <img id="avatar" src="<?php echo $javatar[$i]?>">
                            <?php } $i++; echo '</p>'; 
                        }?>
                </article>
                <article id="right">
                        <h2> Here are your users in JSON format: </h2>
                        <!-- $usergens was json encoded in the controller, so just display it -->
                        <textarea> {{$usergens}} </textarea>
                </article>
        @endif
</div>

@endsection
