<?php

/**
 * Prints all numbers from 1 to 100 and shows divisors or if it is a prime.
 *
 * This method is used to prints all numbers from 1 to 100 and for each
 * number it shows all of divisors or prints '[PRIME]' if la amount of
 * divisors is 2 (1 and itself). 
 *
 * @author Carlos Fernández Sépich
 * @author Carlos Fernández Sépich <fernandez.carlos@outlook.es>
*/
function firstExercise(){
    $numbers = divisors(100);
    foreach($numbers as $number=>$divisors){
    	if($number > 0){
	        if(count($divisors) === 2){
	        	echo $number. ' [PRIME]'.PHP_EOL;
	        }else{
	        	echo $number. ' [' . implode(',', $divisors).']'.PHP_EOL;
	        }
	    }
    }	
}

/**
 * Return all of divisors for each number from 1 to $number.
 *
 * This method is used to get all of divisors for each number
 * from 1 to $number which is received by param.
 * 
 * @author Carlos Fernández Sépich
 * @author Carlos Fernández Sépich <fernandez.carlos@outlook.es>
 * @param int $number maximum number to get the divisors.
 * @return array
*/
function divisors(int $number): array
{
     $divisors = [[]];
     for ($i = 1; $i < $number + 1; $i++){
         $n = $i;
         while ($n <= $number){
             $divisors[$n][] = $i;
             $n+= $i;
         }
     }
     return $divisors;
 } 

//Main call
firstExercise();

?>