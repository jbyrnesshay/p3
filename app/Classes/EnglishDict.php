<?php	

	namespace P3\Classes;
 	use app\classes;
 	class EnglishDict {
 		public $dictior = "";
 		public $dictionary = '';
		public function englishdict() {
		 $dictio= file_get_contents(require __DIR__ .'\wordsEn.txt');
		 
		 $dictior = explode(" ", $dictio);
		 $dictionary = array_map('trim', $dictior);
		 return $this->dictionary = $value;
}
	#$lines = file(require __DIR__ .'\wordsEn.txt', FILE_IGNORE_NEW_LINES); 

	#wordsEn.txt dictionary courtesy of SIL international, file found at http://www-01.sil.org/linguistics/wordlists/english/
	#$dictionary = array_map('trim', $lines); #use array_map with trim to ensure there is no problematic accidental whitespace in array elements, creates final wordlist
	 


}
