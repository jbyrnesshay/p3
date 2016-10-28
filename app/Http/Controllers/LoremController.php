<?php

namespace P3\Http\Controllers;
 
use Illuminate\Http\Request;

use P3\Http\Requests;
 
# use my own class EnglishDict
use P3\Classes\EnglishDict;

class LoremController extends Controller
{
    public function getLoremIpsumText(Request $request)
    {
            # Validate the request, it is required to select language and num paragraphs...
            # num paragraphs must be between 1 and 50.
            $this->validate($request, ['languageselector'=> 'required',
            'paragraphs' => 'required|Integer|between:1,50']);
         
            # prepare by getting input request num of paragraphs and language selection
            $howManyParagraphs = $request->input('paragraphs');
            $dictselector = $request->input('languageselector');

            #use Badcow, a loremipsum generator app found on packagist.org
            $generator = new \Badcow\LoremIpsum\Generator();
            
            #after examining Badcow generator.php in vendors, found various properties and methods i could configure
            #setting mean # of sentences per paragraph to 4
            $generator->setParagraphMean(4.0);

            #if the English dictionary was requested, I need to use my own class EnglishDict to create english dictionary
            if ($dictselector == 'customEng') {
                    $dictate = new \P3\Classes\EnglishDict();
                    $dict = $dictate->dictionary;
                    #use Badcow setWords(), undocumented but found inside generator.php, to asisign the external english dictionary 
                    #as the new Badcow dictionary
                    $setit = $generator->setWords($dict);
            }

            #now get paragraphs from Badcow generator
            $contents = $generator->getParagraphs($howManyParagraphs);
        
            #get ready to use variable
            $splitparagraphs='';
            
            #add paragraph tags + content to new variable
            for ($i=0; $i < count($contents); $i++) {
                    $splitparagraphs .= "<p>$contents[$i]</p><br>";
            }
            #$contentsaddtags lacks paragraph tags, these will be added for display purposes in the view
            $contentsaddtags = $contents;
        
            /*$contents reassigned as 2nd variable that includes the tags for using as functional 
              tags to style the display as html paragraphs without displaying the tags*/
            $contents = $splitparagraphs;
        
            #return both of them to view
            return view('lorem.lorem')->with('contents', $contents)->with('contentsaddtags', $contentsaddtags);
    }
}