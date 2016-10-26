<?php

 

namespace P3\Http\Controllers;
 
use Illuminate\Http\Request;

use P3\Http\Requests;
 
use YoHang88\LetterAvatar;
use P3\Myfiles;
 
#create alias for Faker, to use for project data
use Faker\Factory as Faker;

class UsergenController extends Controller
{
    public function generateUsers (Request $request)
    {
    	  
     $this->validate($request, [
        'users' => 'required|Integer',
    ]);

 	#use faker, instructions at https://github.com/fzaninotto/Faker
		$faker = Faker::create();
		$howManyUsers = $request->input('users');
      	/*$name = $faker->name($howManyUsers);
        $address = $faker->address($howManyUsers);
        $phone = $faker->phoneNumber($howManyUsers);
        $password = $faker->password($howManyUsers);*/
     
        $random = new \Rych\Random\Random();
        $array1 = ["My name is ", "I'm ", "They call me ", "Hi I'm ", "Hello my name's ", "My name's "];
        $array2 = [".  I like  ", '.  My favorite thing is  ', '.  I love ', '.  I really enjoy  ', ".  Some people say i'm boring but i get really excited about  ", ".  All my time is wrapped up in  "];
        $array3 = ["cats!  ", 'dogs.  ', 'cars.  ', 'airplanes.  ', 'music.  ', 'travelling.  ', 'bicycling!  ', 'driving my car!  ', 'combing the hair on animals!  ', 'dining out.  ', 'singing in the shower.  ', 'Achatina fulica, the Giant African land snail!  '];
        $filler = "  Blah blah blah blah.";
        $emailprovider = [ '@example.com', '@reallyfake.net', '@notactual.com', '@wakeup.com', '@falsemail.net', '@pretendmail.com', '@trickmail.com', '@unreal.net'];
        $profiler = false;
        $profileText ='';
        $profiler = $request->input('profile');

     for ($i=0; $i < $howManyUsers; $i++) {
     	$firstname[$i] = $faker->firstName;
        $lastname[$i] = $faker->lastName;
        $name[$i] = $firstname[$i]." ".$lastname[$i];
        $address[$i] = $faker->address;
        $phone[$i] = $faker->phoneNumber;

        $password[$i] = $faker->password;
        $string = $firstname[$i][0];
        $string2 = $string.$lastname[$i];
        $randomnumber= $random->getRandomInteger(0, 7);
        $email[$i] = strtolower($string2).$emailprovider[$randomnumber];
        $initials[$i] = $firstname[$i][0].$lastname[$i][0];
        $avatar[$i] = new \YoHang88\LetterAvatar\LetterAvatar($name[$i]);
        $gavatar[$i] = $avatar[$i];
        $havatar[$i] = \Avatar::create($name[$i])->toBase64();
        $javatar[$i] = $havatar[$i];
         
        $profileText[$i]='';
        if ($profiler) {
            
            $random1 = $random->getRandomInteger(0, 5);
            $random2 = $random->getRandomInteger(0, 5);
            $random3 = $random->getRandomInteger(0, 11);
            $profileText[$i] = $array1[$random1].$firstname[$i].$array2[$random2].$array3[$random3].$filler;
        }
        
        $userArray[$i] = ['firstname'=>$firstname[$i], 'lastname'=>$lastname[$i], 'password'=>$password[$i], 
        'address'=>$address[$i], 'phone'=>$phone[$i], 'email'=>$email[$i], 'initials'=>$initials[$i], 'profiletext' =>$profileText[$i], 'havatar'=>$havatar[$i]  ];
     }
   

        $usergens = json_encode($userArray);
         
       //$avatar = new \YoHang88\LetterAvatar\LetterAvatar('Steven Spielberg');
        
       return view('lorem.usergen')->with('usergens', $usergens)->with('javatar', $javatar);
    }
    
     
    
 
  }