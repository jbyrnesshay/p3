@extends('layouts.master')


@section('head')
@endsection

@section('title', 'Developers Best Friend')

@section('content')

    <h2 class="pageheading">Welcome to Developer's Best Friend!</h2>
    <h3>This app provides two functions</h3>
    <ul class="about">
      	<li class="about"><a href="{{ route('lorem') }}">a Lorem Ipsum Generator</a></li>
        <li class="about"><a href="{{ route('usergen') }}">a Fake User Generator</a></li>
    </ul>
    <div id="about">
        <h4>About the project:</h4>
        <h5>Lorem Ipsum Generator</h5> 
        <p>provides dummy text that can be copied and pasted for testing, filling out a web development project, or for any purpose at all.  It allows the user to request number of paragraphs (1 to 50) as well as to choose either English or Latin text.  Text is then provided as output, according to these user requests, in two separate formats:</p>
        <ul>
            <li>display version (left column), which is text only</li>
            <li class="develop">developer version (right column), which is text with html paragraph tags</li>
        </ul>
        <hr>
        <h5>Fake User Generator</h5>
        <p>provides fake user profiles, consisting of name, address, phone, email, password for each fake user.  Additionally, the option is provided to request a very brief profile blurb for each user, as well as a custom avatar image for each user.  This app will output between 1 and 50 fake users per usage, based upon the user's selection choice.  The output is provided in two separate formats:</p>
        <ul>
            <li>display version (left column), a visual-friendly usage example, with label for each value</li>
            <li class="develop">developer version (right column), which is output as a JSON object</li>
        </ul>
        <hr>
        <h5>how does it work?</h5>
        <p>Lorem Ipsum app uses the Badcow external application (github.com/Badcow/LoremIpsum) which has a default functionality described on its github page, as well as additional methods, such as setWords(), that can be discovered by examining its generator.php file.  I provide the user the option of either Latin or English output.  The inbuilt vocabulary of Badcow consists of an array of Latin words.   However there is the ability to set one's own word array, using Badcow's setWords() method.  I have added a text file of more than 100,000 English words in storage, added a custom class which is called to create an app dictionary based upon a random selection of 500 words from the English vocabulary text file, using the Rych/random app for randomization.</p>
        <p>Fake User app uses 2 external applications, Rych\random for randomization, and laravolt\avatar (github.com/laravolt/avatar), which allows the creation of base64 png images to use as avatars, customized with the user's initials.  Fake User app also makes liberal use of the fzaninotto\faker app (github.com/fzaninotto/Faker) to generate various pieces of user data, such as first and last name (passed to laravolt\avatar to generate avatar when requested), address, phone number, password.  To generate the email address, I used my own custom array of example email providers, and combined these with the user's first initial and last name, from the data generated by fzaninotto\faker.  The avatar is optional and created by laravolt.  The brief profile blurb is created from a series of my own custom arrays of strings that are mixed and matched with randomization using Rych\random.</p>
    </div>

@endsection
