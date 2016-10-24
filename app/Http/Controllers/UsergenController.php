<?php

 

namespace P3\Http\Controllers;
 
use Illuminate\Http\Request;

use P3\Http\Requests;
 
use YoHang88\LetterAvatar\LetterAvatar;
use P3\Myfiles;
 
#create alias for Faker, to use for project data
use Faker\Factory as Faker;

class UsergenController extends Controller
{
    public function generateUsers (Request $request)
    {
 	#use faker, instructions at https://github.com/fzaninotto/Faker
		$faker = Faker::create();
		$howManyUsers = $request->input('users');
      	/*$name = $faker->name($howManyUsers);
        $address = $faker->address($howManyUsers);
        $phone = $faker->phoneNumber($howManyUsers);
        $password = $faker->password($howManyUsers);*/
     
     for ($i=0; $i < $howManyUsers; $i++) {
     	$name[$i] = $faker->name;
        $address[$i] = $faker->address;
        $phone[$i] = $faker->phoneNumber;
        $password[$i] = $faker->password;
         $userArray[$i] = ['name'=>$name[$i], 'password'=>$password[$i], 
        'address'=>$address[$i], 'phone'=>$phone[$i]];


     }
   
        $usergens = json_encode($userArray);
       
       
       return view('lorem.usergen')->with('usergens', $usergens);
    }
    

        

      public function junk() {
      	['name'=>$name, 'password'=>$password, 
        'address'=>$address, 'phone'=>$phone];
        for ($i=0; $i < $howManyUsers; $i++) {
     	$name[$i] = $faker->name;
        $address[$i] = $faker->address;
        $phone[$i] = $faker->phone;
        $password[$i] = $faker->password;

     }
      }
  }