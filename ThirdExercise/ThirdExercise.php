<?php

/**
 * 
 * 
 * @author Carlos Fernández Sépich
 * @author Carlos Fernández Sépich <fernandez.carlos@outlook.es>
*/

require __DIR__.'..\Database.php';
require __DIR__.'..\Schedule.php';


$database = new Database();
$database->db_connect(); //Establish database connection
$schedule = new Schedule();
$tvSeries = $database->getAllSeriesWithIntervals();
$database->db_disconnect(); //Disconnect from database
$schedule->addAllSeries($tvSeries);
$objDateTime = new DateTime('NOW');
$objDateTime->format(DateTime::ISO8601); //Get an ISO8601 formatted string
$filterByTitle = '';
$search = $schedule->searchSeries($objDateTime, $filterByTitle);

echo 'The next series is '.$search->getTitle().' and it will air on channel '.$search->getChannel().' on '.$search->getNextInterval($objDateTime).PHP_EOL;

