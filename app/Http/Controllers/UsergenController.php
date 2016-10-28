<?php



namespace P3\Http\Controllers;
use Illuminate\Http\Request;
use P3\Http\Requests;
 
 
 
#create alias for Faker, to use for project data
use Faker\Factory as Faker;

class UsergenController extends Controller
{
    public function generateUsers (Request $request)
    {
            #validate, the only required in put is number of users which must be between 1 and 50,
            #the other input is optional checkbox input 	  
            $this->validate($request, ['users' => 'required|Integer|between:1,50']);
            #use faker, instructions at https://github.com/fzaninotto/Faker
		    $faker = Faker::create();
            #user input of how many users is assigned to variable
		    $howManyUsers = $request->input('users');
            
            #Rych\Random object will be used to randomize          	 
            $random = new \Rych\Random\Random();
            
            #these are arrays of strings from which one random element each will be selected by Random.
            #they will be strung together to create profile blurb
            $array1 = ["My name is ", "I'm ", "They call me ", "Hi I'm ", "Hello my name's ", "My name's "];
            $array2 = [".  I like  ", '.  My favorite thing is  ', '.  I love ', '.  I really enjoy  ', ".  Some people say i'm boring but i get really excited about  ", ".  All my time is wrapped up in  "];
            $array3 = ["cats!  ", 'dogs.  ', 'cars.  ', 'airplanes.  ', 'music.  ', 'travelling.  ', 'bicycling!  ', 'driving my car!  ', 'combing the hair on animals!  ', 'dining out.  ', 'singing in the shower.  ', 'Achatina fulica, the Giant African land snail!  '];
            $filler = "  Blah blah blah.";
            
            #array of fake email providers, will be chosen at random for each user
            $emailprovider = [ '@example.com', '@reallyfake.net', '@notactual.com', '@wakeup.com', '@falsemail.net', '@pretendmail.com', '@trickmail.com', '@unreal.net'];
            
           
            #assign the value of checkbox input for profile and makeavatar
            $profiler = $request->input('profile');
            $selectavatar = $request->input('makeavatar');

            #create users, start by getting basics from faker, then create email address, then add profile and avatar where requested
            for ($i=0; $i < $howManyUsers; $i++) {
     	            $firstname[$i] = $faker->firstName;
                    $lastname[$i] = $faker->lastName;
                    #even though faker can create full name string, use first and last to simplify creating emailadd and profile text, then concatenate for using with avatar
                    $name[$i] = $firstname[$i]." ".$lastname[$i];
                    $address[$i] = $faker->address;
                    $phone[$i] = $faker->phoneNumber;
                    $password[$i] = $faker->password;
                    #for start email address string
                    $string = $firstname[$i][0];
                    #email address name
                    $string2 = $string.$lastname[$i];
                    #select random index from email providers array
                    $randomnumber= $random->getRandomInteger(0, 7);
                    $email[$i] = strtolower($string2).$emailprovider[$randomnumber];
                    #set avatar vars for use
                    $havatar[$i]='';
                    $javatar[$i]='';
                    if ($selectavatar) {
                            #assign created avatar data to 2 different variables, to pass separately to solve problem of displaying the data as image vs in json object 
                            $havatar[$i] = \Avatar::create($name[$i])->toBase64();
                            $javatar[$i] = $havatar[$i];
                    } 
                    #set profiletext var for use
                    $profileText[$i]='';
                    #if requested profile text, enter this statement
                    if ($profiler) {
                    #use rych random to for accessing random elements of 3 profile text arrays in lines 30-32, then concatenate
                            $random1 = $random->getRandomInteger(0, 5);
                            $random2 = $random->getRandomInteger(0, 5);
                            $random3 = $random->getRandomInteger(0, 11);
                            $profileText[$i] = $array1[$random1].$firstname[$i].$array2[$random2].$array3[$random3].$filler;
                    }
                    #the user data for each user is assigneed to $userArray[$]
                    $userArray[$i] = ['firstname'=>$firstname[$i], 'lastname'=>$lastname[$i], 'password'=>$password[$i], 
                    'address'=>$address[$i], 'phone'=>$phone[$i], 'email'=>$email[$i], 'profiletext' =>$profileText[$i], 'havatar'=>$havatar[$i]  ];
            }
            #json encode, as the developer version of the content will be a json object displayed to screen
            $usergens = json_encode($userArray);
            #send the user array and avatar array (as javatar) to view, had some problems the data without sending avatars as their own array
            return view('devbestfriend.usergen')->with('usergens', $usergens)->with('javatar', $javatar);
    }
}