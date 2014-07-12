<?php

// change the name below for the folder you want
$dir = filter_input(INPUT_GET, 'studentid');
//echo $dir;
$name=filter_input(INPUT_GET, 'txtusername');
//echo $name;
$pass=filter_input(INPUT_GET, 'txtpassword');
//echo $pass;
$username = "root";
$password = "";
$hostname = "localhost"; 
$db="proj";

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password,$db)
  or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

if($dir<=4515)
{
    $bid='A';
}
elseif ($dir<=4530) {
    $bid='B';
}elseif ($dir<=4545) {
    $bid='C';
}elseif ($dir<=4560) {
    $bid='D';
}  else {
$bid='E';    
}
$path='project_folders/'.$dir;

if( is_dir($path) === false )
{
    mkdir($path);
    mysqli_query($dbhandle, "insert into student values('$dir','$name','$pass','$bid')");
    //echo("Here");
    mysqli_close($dbhandle);  

    header('Location:index.php');
}
 else {
     $Message="Registration ID already exists!";
 header("Location: Register.php?Message=" . urlencode($Message));   
}
?>