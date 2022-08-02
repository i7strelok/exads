<?php

/**
 * Series Class
 * 
 * @author Carlos Fernández Sépich
 * @author Carlos Fernández Sépich <fernandez.carlos@outlook.es>
*/
require __DIR__.'../Interval.php';

class Series {
    private $title;
    private $channel;
    private $gender;
    private $intervals = [];

    /**
    * Instantiate Series
    */
    function __construct(string $title, int $channel, string $gender, array $intervals = []) {
        $this->title = $title;
        $this->channel = $channel;
        $this->gender = $gender;
        $this->intervals = $intervals;
    }

    /**
    * Get Series Title
    */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
    * Get Series Channel
    */
    public function getChannel(): int
    {
        return $this->channel;
    }

    /**
    * Get Gender. It may be "genre"
    */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
    * Get Intervals of Series
    */
    public function getIntervals(): array
    {
        return $this->intervals;
    }

    /**
    * Get Intervals of Series
    */
    public function getNextInterval(Datetime $datetime): string
    {
        $nextIntervals = [];
        foreach($this->getIntervals() as $interval){
            $nextIntervals[] = $interval->getNextShowTime($datetime->format('Y-m-d H:i:s'));
        }
        return min($nextIntervals);
    }

    /**
    * Add new interval to the series
    */
    public function addInterval(Interval $interval): void
    {
        $this->intervals[] = $interval;
    }

}

?>