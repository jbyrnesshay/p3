<?php	

	namespace P3\classes;
	use App;
	use P3;
	use Illuminate\Http\Request;
	use Rych\Random\Random;

use P3\Http\Requests;


 	class EnglishDict {
 		# public $random = new Rych\Random\Random();
 		public $dictionary;
 		public $dictato;
		//public function englishdict() {
 		public function __construct() {
 			$random = new \Rych\Random\Random();
		 
		  $dicto = \File::get(storage_path('wordsEn.txt'));
		 
		$dictior = explode("\r\n", $dicto);
		$dictiot = array_map('trim', $dictior);
		 $size = count($dictiot);
		 
		for ($i=0; $i < 500; $i++) {
		 $randomnumber= $random->getRandomInteger(1, $size);
		#$dictioz[$i] = $randomnumber;
		#$dictiot[$random->getRandomInteger(1, $size)];
		$dictato[$i] = $dictiot[$randomnumber];
		}
		 
		$this->dictionary = $dictato;
		 
		  
		  
}
	 
	 

}      
