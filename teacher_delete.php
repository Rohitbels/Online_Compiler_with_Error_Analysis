<?php
header('Content-Type: text/plain; charset=UTF-8');
$name = $_GET['SelTeacher'];
$username = "root";
$password = "";
$hostname = "localhost"; 
$db="proj";

$dbhandle = mysqli_connect($hostname, $username, $password,$db)
  or die("Unable to connect to MySQL");
mysqli_query($dbhandle,"SET NAMES 'utf8'");
mysqli_query($dbhandle, "delete from login_teacher where fullname='$name'");
mysqli_close($dbhandle);  
header('Location: delete_teacher.php');
?>
