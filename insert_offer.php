<?php
require_once('db_info.php'); /* Get the database information. */
$mysqli = new mysqli(HOST, USER, PASS, DATABASE); /* Connect to the database and store the connection into a variable. */

$mysqli->query("INSERT INTO `Shelter_O`(`Start_Date`, `End_Date`, `Fits`, `Location_URL`, `Location_Text`) VALUES (".$_POST["start_date"].",".$_POST["end_date"].",".$_POST["location_url"].",".$_POST["location_text"].",".$_POST["fits"].")");


?>