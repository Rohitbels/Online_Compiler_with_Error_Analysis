 <?php

$ppath = $_POST['p'];//TEXT FROM THE FIELD
$content = $_POST['data'];//TEXT FROM THE FIELD

$username = "root";
$password = "";
$hostname = "localhost"; 
$db="proj";

$dbhandle = mysqli_connect($hostname, $username, $password,$db)
  or die("Unable to connect to MySQL");

if(mysqli_query($dbhandle, "insert into suggestion values('$ppath','$content')")){
    echo 'Suggestion added successfully';
} else {
    echo 'Error saving file';
}
mysqli_close($dbhandle);  
?> 