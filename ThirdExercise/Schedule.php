<?php

/**
* Schedule Class
* 
* @author Carlos Fernández Sépich
* @author Carlos Fernández Sépich <fernandez.carlos@outlook.es>
*/

require __DIR__.'../Series.php';

class Schedule {
    private $series = [];


    /**
    * Get Series Title
    */
    public function searchSeries(Datetime $datetime, string $title = ''): Series
    {
        $nextSeries = '';
        $nextInterval = '';
        foreach($this->series as $aSeries){
            if(str_contains($aSeries->getTitle(), $title)){
                if(empty($nextInterval)){
                    $nextSeries = $aSeries;
                    $nextInterval = $aSeries->getNextInterval($datetime);
                }else{
                    if($aSeries->getNextInterval($datetime) < $nextInterval){
                        $nextSeries = $aSeries;
                    }
                }
            }
        }
        return $nextSeries;
    }

    /**
    * Add new Series
    */
    public function addSeries(Series $series): void
    {
        $this->series[] = $series;
    }

    /**
    * Add all Series
    */
    public function addAllSeries(Array $series): void
    {
        $this->series = $series;
    }    
}

?>