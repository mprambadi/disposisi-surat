<?php
//Establishing Connection with Server by passing server_name, user_id and password as a parameter 
$host= '';
$username= '';
$database= '';
$password= '';

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_errno) {
  echo  "Failed to connect to MySQL: (" .$mysqli->connect_errno .")" .$mysqli->connect_error;
}

?>