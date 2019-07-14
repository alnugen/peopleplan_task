<?php
function getDb(){
  $host="db4free.net";
  $username="alislimbu";
  $password="password123";
  $database="peopleplan_task";

  $conn = new mysqli($host, $username, $password, $database);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  print_r("Successfully connected to ". $database . " database \n");
  return $conn;
}
?>
