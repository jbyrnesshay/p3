<?php

namespace P3\Http\Controllers;
 
use Illuminate\Http\Request;

use P3\Http\Requests;
 
 

use App;

 
use P3\Myfiles;

#create alias for Faker, to use for project data
use Faker\Factory as Faker;
#use App\classes\EnglishDict;
use P3\Classes\EnglishDict;

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
    
        
         $this->validate($request, ['languageselector'=> 'required',
        'paragraphs' => 'required|Integer|between:1,50', 
    ]);
         
       
        # Generate the lorem ipsum text
      


         $howManyParagraphs = $request->input('paragraphs');
         $dictselector = $request->input('languageselector');
        $generator = new \Badcow\LoremIpsum\Generator();
        #set mean # of sentences per paragraph to 4
        $generator->setParagraphMean(4.0);

        if ($dictselector == 'customEng') {
            $dictate = new \P3\Classes\EnglishDict();
            $dict = $dictate->dictionary;
            $setit = $generator->setWords($dict);
        }

         #use badcow

        $thing = \Session::get('languageselector');
    #getRandomWords($count)
        #toSentence(array($words))
        
        $paragraphsax = $generator->getParagraphs($howManyParagraphs);
        #$sentencesax = $generator->getSentences($howManyParagraphs);
        $sentencesax = $generator->getRandomWords($howManyParagraphs);
        $contents = $paragraphsax;
        #$contents = $sentencesax;
        #use joshtronic
        $testerator = new \joshtronic\LoremIpsum();
        # $contents = $testerator->paragraphs($howManyParagraphs);
         
        $splitparagraphs='';
        for ($i=0; $i < count($contents); $i++) {
            $splitparagraphs .= "<p>$contents[$i]</p>";

        }
        $contentsarray = $contents;
        $contents = $splitparagraphs;
        


       return view('lorem.lorem')->with('contents', $contents)->with('contentsarray', $contentsarray);
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
        $this->validate($request, [
        'paragraphs' => 'required|min:1',
    ]);
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
}