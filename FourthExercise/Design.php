<?php

namespace FourthExercise;

/**
 * Design Class
 * 
 * @author Carlos Fernández Sépich
 * @author Carlos Fernández Sépich <fernandez.carlos@outlook.es>
*/

class Design {

    private $name;
    private $splitPercent;

    /**
     * Design Promotion
    */
    function __construct(string $name, int $splitPercent) {
        $this->name = $name;
        $this->splitPercent = $splitPercent;
    }

    /**
     * Get Design Name
    */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get Design Split Percent
    */
    public function getSplitPercent(): int
    {
        return $this->splitPercent;
    }
}


?>