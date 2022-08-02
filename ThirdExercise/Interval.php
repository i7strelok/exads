<?php

/**
 * Interval Class
 * 
 * @author Carlos Fernández Sépich
 * @author Carlos Fernández Sépich <fernandez.carlos@outlook.es>
*/

class Interval {
    private $day;
    private $hour;

    /**
    * Instantiate Interval
    */
    function __construct(int $day, string $hour) {
        $this->day = $day;
        $this->hour = $hour;
    }

    /**
    * Get Interval Day
    */
    public function getDay(): int
    {
        return $this->day;
    }

    /**
    * Get Interval Hour
    */
    public function getHour(): string
    {
        return $this->$hour;
    }

    /**
    * Get next Show Time
    */
    public function getNextShowTime($datetime = null): string
    {
        if($datetime == null) $datetime = date('Y-m-d H:i:s'); //Gets the current datetime.
        $dayOfWeek = date('w', strtotime($datetime)); //Gets the day of the week. From 0 (Sunday) to 6 (Saturday).
        $nextIntervalDateTime = $datetime;
        if($this->day == $dayOfWeek){
            if($this->hour >= date('H:i:s', strtotime($datetime))){
                $date = date('Y-m-d', strtotime($datetime));
                $nextIntervalDateTime = date('Y-m-d H:i:s', strtotime($date . ' ' . $this->hour));
            }else{
                $date = date('Y-m-d', strtotime($datetime));
                $nextIntervalDateTime = date('Y-m-d H:i:s', strtotime($date . ' ' . $this->hour . ' + 7 days'));               
            }
        }elseif($this->day > $dayOfWeek){
            $diff = $this->day - $dayOfWeek;
            $date = date('Y-m-d', strtotime($datetime));
            $nextIntervalDateTime = date('Y-m-d H:i:s', strtotime($date . ' ' . $this->hour . " + $diff days"));          
        }else{
            $diff = ($this->day - $dayOfWeek) + 7;
            $date = date('Y-m-d', strtotime($datetime));
            $nextIntervalDateTime = date('Y-m-d H:i:s', strtotime($date . ' ' . $this->hour . " + $diff days"));                         
        }
        return $nextIntervalDateTime;  
    }
}

?>