<?php
$username = "root";
$password = "";
$hostname = "localhost"; 
$db="proj";

//connection to the database
$db_con = mysqli_connect($hostname, $username, $password,$db)
  or die("Unable to connect to MySQL");
?>