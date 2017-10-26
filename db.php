<?php
//Establishing Connection with Server by passing server_name, user_id and password as a parameter 
$mysqli = new mysqli("localhost", "root", "cobacoba", "dispose");

if ($mysqli->connect_errno) {
  echo  "Failed to connect to MySQL: (" .$mysqli->connect_errno .")" .$mysqli->connect_error;
}

//Selecting Database
?>