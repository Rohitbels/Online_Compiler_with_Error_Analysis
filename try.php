<?php
//include_once 'connection.php';
$username = "root";
        $password = "";
        $hostname = "localhost"; 
        $db="proj";
        $dbhandle = mysqli_connect($hostname, $username, $password,$db)
         or die("Unable to connect to MySQL");
        
        session_start();
$studentid = $_SESSION['sid'];
$query='select fname from folder where sid="'.$studentid.'"';
    $count=0;
    
       $result = mysqli_query($dbhandle,"select fname from folder where sid='$studentid'");
        while($row= mysqli_fetch_array($result))
        {
            $tab="#$row[$count]";
            echo $row[$count];
            echo $tab;
            //header('Location: Coding.php');

        }
    
 

 ?> 





 
 
 
 
 
 
 
 
 
 
 
 








