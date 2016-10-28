<?php	
 

        namespace P3\classes;
        
        use Illuminate\Http\Request;
        use Rych\Random\Random;
        use P3\Http\Requests;
        use App;
        use P3;

        /*a class for obtaining 500 random words from external wordlist file (wordsEn.txt) of more than 100,000 words
         for usage as custom dictionary with Badcow */

        class EnglishDict {

                public function __construct() {
                        #new Rynch\random object instance
                        $random = new \Rych\Random\Random();

                        #load custom dictionary file from storage
                        $loadedfile = \File::get(storage_path('dictionary\wordsEn.txt'));

                        #make a clean array of the contents, file consists of one word per line
                        $filearray = explode("\r\n", $loadedfile);
                        #just making sure
                        $cleanarray = array_map('trim', $filearray);
                    
                        $size = count($cleanarray) - 1;

                        #get 500 random words by index from wordsEn.txt using Rynch random
                        for ($i=0; $i < 500; $i++) {
                                $randomnumber= $random->getRandomInteger(1, $size);
                                $dictionaryEng[$i] = $cleanarray[$randomnumber];
                        }
                        $this->dictionary = $dictionaryEng;
                }
        }