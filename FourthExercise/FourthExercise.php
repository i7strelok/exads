<?php

namespace FourthExercise;

require __DIR__.'../vendor/autoload.php';
require __DIR__.'../Promotion.php';

use Exads\ABTestData;

/**
 * Receives a promotion ID and returns a Promotion object with all its designs.
 *
 * @author Carlos Fernández Sépich
 * @author Carlos Fernández Sépich <fernandez.carlos@outlook.es>
 * @param int $promoId promotion ID
 * @return Promotion
*/
function getData(int $promoId): Promotion
{
  $abTest = new ABTestData($promoId);
  $promotion = $abTest->getPromotionName();
  $designs = $abTest->getAllDesigns();
  $promotion = new Promotion($promotion, $designs);
  return $promotion;
}

/**
 * Prints the information of a Promotion Design with ID 1.
 * @author Carlos Fernández Sépich
 * @author Carlos Fernández Sépich <fernandez.carlos@outlook.es>
 * @param int $promoId promotion ID
*/
function fourthExercise(int $promoId){
    try{
        $promotion = getData($promoId);
        $selectedDesign = $promotion->getDesign();
        echo 'The chosen design is: '.$selectedDesign->getName();
    }catch (ABTestException $e) {
            echo 'Error: '.$e->getMessage();
    }
}

//Main call. Specify a promotion ID
fourthExercise(1);


?>