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
    
        
        $paragraphsax = $generator->getParagraphs($howManyParagraphs);
        
        $sentencesax = $generator->getRandomWords($howManyParagraphs);
        $contents = $paragraphsax;
         
         
        $splitparagraphs='';
        for ($i=0; $i < count($contents); $i++) {
            $splitparagraphs .= "<p>$contents[$i]</p>";

        }
        $contentsaddtags = $contents;
        $contents = $splitparagraphs;
        


       return view('lorem.lorem')->with('contents', $contents)->with('contentsaddtags', $contentsaddtags);
    }
    #lorem paragraphs correctly goiing to show

    
}