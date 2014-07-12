<?php
header('Content-Type: text/plain; charset=UTF-8');
$err = $_POST['SelError'];
echo $err;
$soln=filter_input(INPUT_POST, 'addsolnhere');
echo $soln;
$ges=filter_input(INPUT_POST, 'gestatement');
echo $ges;

$username = "root";
$password = "";
$hostname = "localhost"; 
$db="proj";

$dbhandle = mysqli_connect($hostname, $username, $password,$db)
  or die("Unable to connect to MySQL");
mysqli_query($dbhandle,"SET NAMES 'utf8'");
mysqli_query($dbhandle, "UPDATE err SET errorname = '$ges' WHERE error = '$err';");


$result1 = mysqli_query($dbhandle,"SELECT ges FROM sol where error='$err'");
while($row1 = mysqli_fetch_array($result1))
{
    $ges1=$row1['ges'];
}
mysqli_query($dbhandle, "delete from sol where error='$err'");
            //echo $ges;
mysqli_query($dbhandle, "delete from errdb where errname='$ges1'");

mysqli_query($dbhandle, "insert into sol (soln,error,ges) values ('$soln','$err','$ges')");
mysqli_query($dbhandle, "insert into errdb values('$ges')");
mysqli_close($dbhandle);  
     header('Location: ModifySoln.php');
?>
