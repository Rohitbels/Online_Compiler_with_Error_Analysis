<?php
header('Content-Type: text/plain; charset=UTF-8');
$err = $_POST['SelError'];

$username = "root";
$password = "";
$hostname = "localhost"; 
$db="proj";

$dbhandle = mysqli_connect($hostname, $username, $password,$db)
  or die("Unable to connect to MySQL");
mysqli_query($dbhandle,"SET NAMES 'utf8'");

            $result=mysqli_query($dbhandle, "select errname from errdb");        
            while($row= mysqli_fetch_array($result))
            {
                $ges=$row['errname'];
                echo $ges;
            }
mysqli_query($dbhandle, "UPDATE err SET errorname = 'New Error' WHERE error = '$err';");
mysqli_query($dbhandle, "delete from sol where error='$err'");
            //echo $ges;
mysqli_query($dbhandle, "delete from errdb where errname='$ges'");
mysqli_close($dbhandle);  
header('Location: DelSoln.php');
?>
