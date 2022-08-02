<?php

/**
* Database Class
* 
* @author Carlos Fernández Sépich
* @author Carlos Fernández Sépich <fernandez.carlos@outlook.es>
*/

class Database{
    private $host;
    private $user;
    private $pass;
    private $db;
    public $mysqli;
  
    public function __construct() {
        
    }
  
    /**
    * Connect function
    */
    public function db_connect(){
        $this->host = 'localhost';
        $this->user = 'user_exads';
        $this->pass = 'khH073&0';
        $this->db = 'db_exads';
        $mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($mysqli->connect_errno) {
          return $mysqli->connect_error;
        }else{
          $this->mysqli = $mysqli;
          return $this->mysqli;
        }
    }
  
    /**
    * Disconnect function
    */
    public function db_disconnect(){
        return $this->mysqli->close();
    }   

    /**
    * Get number of rows
    */
    public function db_num(string $sql): int
    {
        $result = $this->mysqli->query($sql);
        return $result->num_rows;
    }

    /**
    * Get rows
    */
    public function sqlQuery(string $sql)
    {
        $query = $this->mysqli->query($sql);
        $results = mysqli_fetch_all($query, MYSQLI_ASSOC); # all rows to array
        return $results;
    }

    /**
    * Get all Series
    */
    public function getAllSeries()
    {
        $sql = 'SELECT id, title, channel, gender FROM tv_series ORDER BY id ASC;';
        return $this->sqlQuery($sql);
    }

    /**
    * Get all Intervals
    */
    public function getAllIntervals()
    {
        $sql = 'SELECT id_tv_series, week_day, show_time FROM tv_series_intervals  ORDER BY id_tv_series ASC;';
        return $this->sqlQuery($sql);
    }

    /**
    * Get all Series with Intervals
    */
    public function getAllSeriesWithIntervals()
    {
        $series = $this->getAllSeries();
        $intervals = $this->getAllIntervals();
        $seriesWithIntervals = [];
        foreach($series as $aSerie){
            $newSeries = new Series($aSerie['title'], $aSerie['channel'], $aSerie['gender']);
            $seriesWithIntervals[$aSerie['id']] = $newSeries;
        }
        foreach($intervals as $interval){
          $newInterval = new Interval($interval['week_day'], $interval['show_time']);
          $seriesWithIntervals[$interval['id_tv_series']]->AddInterval($newInterval);
        }
        return $seriesWithIntervals;
    }
}
