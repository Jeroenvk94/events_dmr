<?php

$con = mysqli_connect("localhost","jeroen","Jeroen2018!","events");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>