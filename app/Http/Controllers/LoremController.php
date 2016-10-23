<?php

namespace P3\Http\Controllers;

use Illuminate\Http\Request;

use P3\Http\Requests;
 
use YoHang88\LetterAvatar\LetterAvatar;

#create alias for Faker, to use for project data
use Faker\Factory as Faker;

class LoremController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      public function getLoremIpsumText(Request $request)
    {
        # Validate the request....
        # Generate the lorem ipsum text
       
        $howManyParagraphs = $request->input('paragraphs');
         #use badcow
        $generator = new \Badcow\LoremIpsum\Generator();
        $paragraphsax = $generator->getParagraphs($howManyParagraphs);
        $contents = $paragraphsax;
        #use joshtronic
        $testerator = new \joshtronic\LoremIpsum();
        # $contents = $testerator->paragraphs($howManyParagraphs);
        #$text = $loremenator->getParagraphs($howManyParagraphs);
        # Display the results...
        #return view('lorem.show')->with('contents', $contents);
        #$contents = serialize($contents);
        #$contents = serialize($contents);
        #print_r($contents);
        #$contents=serialize($contents);
        $splitparagraphs = "";
        for ($i=0; $i < count($contents); $i++) {
            $splitparagraphs .= "<p>$contents[$i]</p>";
        }
        $contents = $splitparagraphs;    
       
       return view('lorem.show')->with('contents', $contents);
    }
    #lorem paragraphs correctly goiing to show

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        #use badcow
        $generator = new \Badcow\LoremIpsum\Generator();
        $paragraphs = $generator->getParagraphs(5);
        #use joshtronic
        $testerator = new \joshtronic\LoremIpsum();
         $fuffn = $testerator->paragraphs(5);
         #use faker, instructions at https://github.com/fzaninotto/Faker

         $faker = Faker::create();
         $haha = $faker->sentence(5);
         $haha = $faker->paragraph(4);
         $haha = $faker->name(3);
         $haha = $faker->safeEmail(5);
         $haha = $faker->email($nb=6);
         $haha = $faker->userName(3);
         $haha = $faker->password(3);
         $haha = $faker->phoneNumber(4);
         $haha = $faker->address(2);
         $haha = $faker->postcode(2);
         $haha = $faker->streetAddress(3);
         $haha = $faker->streetName(3);
         $haha = $faker ->city(2);
         $haha = $faker ->buildingNumber(4);
         $haha = $faker ->cityPrefix(3);
         $haha = $faker ->citySuffix(4);
         $haha = $faker ->secondaryAddress(2);
         $haha =$faker ->state(3);
         $haha = $faker -> stateAbbr(2);
         $haha = $faker ->streetSuffix(4);
         $haha = $faker ->realText($maxNbChars = 25, $indexSize=2);
         $haha = $faker ->words($nb=3, $asText=false);
         $haha = $faker ->sentences($nb=3, $asText=false);
         $haha = $faker -> sentence($nbWords=6, $variableNbWords=true);
         $haha = $faker -> word;
         $haha = $faker -> paragraph($nbSentences = 3, $variableNbSentences=true);
         $haha = $faker -> paragraph($nb = 3, $asText = false);
         $haha = $faker ->title(2);
         $haha = $faker -> lastName(5);
         $haha = $faker -> firstName($gender = null, 5);
         $haha = $faker -> firstNameMale(5);
         $haha = $faker -> firstNameFemale(4);

         #using random-name-generator
         $generato = \Nubs\RandomNameGenerator\All::create();
         $hahat = $generato->getName();
         #$generato2 = \Nubs\RandomNameGenerator\Vgng();
         #$haha = $generator2->getName();
         $generato3 = new \Nubs\RandomNameGenerator\Alliteration();
         $haha = $generato3->getName();
         
         #using yohang88 letteravatar
        $avatar2 = new LetterAvatar('bachim byrnes-shay', 'square', 50);
                
        return $paragraphs;
       
       
       /*this works well
       return view('tests.create')->with('avatar', $avatar2);
            */
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
