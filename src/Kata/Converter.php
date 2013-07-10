<?php

namespace Kata;

class Converter
{
		

    public function convert($romanString)
    {
    	// if string is empty or it is not a string we throw exception
    	if (($romanString === "") || (is_string($romanString)==false)) {
    		throw new \Exception();
    	}


    	// for string with length one we return simple
    	$stringLen =strlen($romanString);
    	$result = 0;
    	if ($stringLen == 1) {
    		$result = $this->convertOneCharacter($romanString[0]);
    	} else if ($stringLen == 2) {
    		$firstChar = $romanString[0];
    		$secondChar = $romanString[1];
    		// same characters case
    		if ($firstChar == $secondChar) {
				if (in_array($firstChar, array("I","X"))) {	
					$result = $this->convertOneCharacter($firstChar) + $this->convertOneCharacter($secondChar);	
				} else {
					throw new \Exception();
				}
    		} else { //different characters case
    			$firstCharNumber = $this->convertOneCharacter($firstChar);
    			$secondCharNumber = $this->convertOneCharacter($secondChar);

    			if ($firstCharNumber < $secondCharNumber) {
    				if ((($firstCharNumber == 1)  && ($secondCharNumber == 5))  || 
    					(($firstCharNumber == 1)  && ($secondCharNumber == 10)) || 
    					(($firstCharNumber == 10) && ($secondCharNumber == 50)) || 
    					(($firstCharNumber == 10) && ($secondCharNumber == 100))) {
    						$result = $secondCharNumber - $firstCharNumber;
    				}
    			} else {
    				$result = $secondCharNumber + $firstCharNumber;
    			}
    		}
    	} else {
    		$previousChar = $romanString[0];
    		$previousNumber = $this->convertOneCharacter($previousChar);
    		$sum = $previousNumber;
    		for($i=1; $i<strlen($romanString); $i++) {
    			$currentChar = $romanString[$i];
				$currentNumber = $this->convertOneCharacter($currentChar);

    			// Logic here
    			if ($currentNumber > $previousNumber) {
    				$sum = $sum + $currentNumber - 2 * $previousNumber;
    			} else {
    				$sum = $sum + $currentNumber;
    			}

    			$previousChar = $currentChar;
    			$previousNumber = $currentNumber;
    		}
    		$result = $sum;
    	}

    	return $result;
    }

    protected function convertOneCharacter($character) {
    	$result = 0;
    	$simpleCharacterArray = array (
    		"I" => 1, 
    		"V" => 5,
    		"X" => 10,
    		"L" => 50,
    		"C" => 100,
    		"D" => 500,
    		"M" => 1000,
    		);
    	;
    	if (in_array($character, array_keys($simpleCharacterArray))) {
    		$result = $simpleCharacterArray[$character];
    	} else {
    		throw new \Exception();
    	}
    	return $result;
    }
}