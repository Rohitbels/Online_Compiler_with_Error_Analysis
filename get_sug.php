<?php

$ppath = $_GET['p'];//TEXT FROM THE FIELD


$username = "root";
$password = "";
$hostname = "localhost"; 
$db="proj";

$dbhandle = mysqli_connect($hostname, $username, $password,$db)
  or die("Unable to connect to MySQL");

$result = mysqli_query($dbhandle, "select sug from suggestion where ppath='$ppath'");
while($row1 = mysqli_fetch_array($result))
{
echo $row1['sug'];    
echo "\n\r";

}


      