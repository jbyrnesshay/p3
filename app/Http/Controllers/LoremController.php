<?php

namespace P3\Http\Controllers;
 
use Illuminate\Http\Request;

use P3\Http\Requests;
 
 

 

use App;
 
use YoHang88\LetterAvatar\LetterAvatar;
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
        
         $this->validate($request, [
        'paragraphs' => 'required|Integer',
    ]);
        # Validate the request....
        # Generate the lorem ipsum text
       /* $switch = 2;
        if ($switch = 2) {
            $array = explode("\n", file_get_contents('data/wordsEn.txt'));#reads contents of file
    #wordsEn.txt dictionary courtesy of SIL international, file found at http://www-01.sil.org/linguistics/wordlists/english/
    $dictionary = array_map('trim', $contents); #use array_map with trim to ensure there is no problematic accidental whitespace in array elements, creates final wordlist
    return $dictionary;
        }*/


        $howManyParagraphs = $request->input('paragraphs');
         #use badcow
        $generator = new \Badcow\LoremIpsum\Generator();
        #set mean # of sentences per paragraph to 4
        $generator->setParagraphMean(4.0);
        #$dictate = new EnglishDict();
      #$dict = $dictate->dictionary;
        #$dict = new \myclasses\englishdict\EnglishDict();
        #$dictionary = $dict->englishdict();
        #$arrayit = ['cat', 'dog', 'fish'];
        #$arrayit= $dict->englishdict();
        #$arrayit = $dict;
        #$doct = explode(" ", $arrayit);

        #$generator->setWords($doct);
        # with? setWords(array($words));
        # with> addWords(array($words));
        #getRandomWords($count)
        #toSentence(array($words))
        #$paragraphsax = $generator->getParagraphs($howManyParagraphs);
        $paragraphsax = $generator->getParagraphs($howManyParagraphs);
        #$sentencesax = $generator->getSentences($howManyParagraphs);
        $sentencesax = $generator->getRandomWords($howManyParagraphs);
        $contents = $paragraphsax;
        #$contents = $sentencesax;
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
       
       return view('lorem.lorem')->with('contents', $contents);
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
