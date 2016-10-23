<?php	
	 
	class EnglishDict {
		public functenglishdict() {
	$contents = explode("\n", file_get_contents('data/wordsEn.txt'));#reads contents of file
	#wordsEn.txt dictionary courtesy of SIL international, file found at http://www-01.sil.org/linguistics/wordlists/english/
	$dictionary = array_map('trim', $contents); #use array_map with trim to ensure there is no problematic accidental whitespace in array elements, creates final wordlist
	return $dictionary;

}
}