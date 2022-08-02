<?php

/**
 * Returns an array with ASCII values.
 *
 * This method is used to generate an array with ASCII values
 * from comma to pipe, unscramble and remove last item. 
 *
 * @author Carlos Fernández Sépich
 * @author Carlos Fernández Sépich <fernandez.carlos@outlook.es>
 * 
 * @return array
*/

function getAsciiArray(){
    $start = ord(',');
    $end = ord('|');
    $bytes =  range($start, $end); //Gets the range
    $allChars = array_map('chr', $bytes); //Gets all ASCII values.
    shuffle($allChars); //Randomizes the order of the elements in the array.
    array_pop($allChars); //Removes the last item.
    return $allChars;
}

/**
 * Returns a character which was deleted from an array.
 *
 * This method is used to catch the item which was removed.
 *
 * @author Carlos Fernández Sépich
 * @author Carlos Fernández Sépich <fernandez.carlos@outlook.es>
 * 
 * @param array $allChars ASCII character array
 * @return string
*/

function getDeletedChr(array $allChars): string
{
    $start = ord(',');
    $end = ord('|');
    $bytes =  range ($start, $end); //Gets the range
    $totalAll = sum($start, $end); //It could have been used array_sum($bytes); but sum() is less complex.
    $allCodes = array_map('ord', $allChars); //Get all ASCII codes.
    $total = array_sum($allCodes); //Get the sum of all items after removing one.
    $deletedChrCode = $totalAll - $total; //Gets the ASCII code of the item removed
    $deletedChrValue = chr($deletedChrCode); //Gets the character value.
    return $deletedChrValue;
}
/**
 * Returns the sum of all numbers between $start and $end.
 *
 * This method is used to get the sum of all numbers from $start 
 * to $end
 * Complexity 0(1)
 * @author Carlos Fernández Sépich
 * @author Carlos Fernández Sépich <fernandez.carlos@outlook.es>
 * @param int $start start number
 * @param int $end end number
 * @return int
*/
function sum(int $start, int $end): int
{
    return $end * ($end + 1)/2 - $start * ($start - 1)/2;
}
  
/**
 * Prints the Ascii values and shows the items removed.
 *
 * @author Carlos Fernández Sépich
 * @author Carlos Fernández Sépich <fernandez.carlos@outlook.es>
*/
function secondExercise(){
    $asciiArray = getAsciiArray();
    $deletedChr = getDeletedChr($asciiArray);
    print_r($asciiArray);
    echo 'The randomly removed item has been: '.$deletedChr.PHP_EOL;
}

//Main call.
secondExercise();


?>