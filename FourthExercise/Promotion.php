<?php

namespace FourthExercise;

require __DIR__.'../Design.php';

/**
 * Promotion Class
 * 
 * @author Carlos Fernández Sépich
 * @author Carlos Fernández Sépich <fernandez.carlos@outlook.es>
*/

class Promotion {
    private $name;
    private $designs = [];

    /**
     * Instantiate Promotion
    */
    function __construct(string $name, array $designs) {

        $this->name = $name;
        $this->designs = array_map(function ($item) {
            $design = new Design($item['designName'], $item['splitPercent']);
            return $design;
        }, $designs);
    }

    /**
     * Get Promotion Name
    */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get all Designs
     * @return array
    */
    public function getDesigns(): array
    {
        return $this->designs;

    }

    /**
     * Get a Design
     * A very basic way to get a Design. 
     * This could be replaced by a more complex method.
     * @return Design
    */
    public function getDesign(): Design
    {
        $number = rand(0, 99);
        $split = 0;
        foreach($this->designs as $design){
            $split += $design->getSplitPercent();
            if($split >= $number){
                return $design;
            }
        }
    }
}

?>