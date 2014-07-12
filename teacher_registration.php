<?php

// change the name below for the folder you want
$dir = filter_input(INPUT_GET, 'txtusername');
//echo $dir;
$name=filter_input(INPUT_GET, 'txtinitials');
//echo $name;
$pass=filter_input(INPUT_GET, 'txtpassword');
$addr=filter_input(INPUT_GET, 'addr');
//echo $pass;
$username = "root";
$password = "";
$hostname = "localhost"; 
$db="proj";

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password,$db)
  or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";
         $result1 = mysqli_query($dbhandle,"SELECT * FROM login_teacher where tname='$name' and fullname='$dir'");
         $row1= mysqli_fetch_array($result1);	
       
if($row1===NULL)
{
      $result = mysqli_query($dbhandle,"SELECT max(tid) as t FROM login_teacher");
         $row= mysqli_fetch_array($result);	
         $t=$row['t']+1;
    mysqli_query($dbhandle, "insert into login_teacher(fullname,tname,pwd,addr,tid) values('$dir','$name','$pass','$addr','$t')");
    mysqli_close($dbhandle);  
    $Message="Registration successful!";
 header("Location: add_teacher.php?Message=" . urlencode($Message));   }
 else {
    $Message="Registration ID already exists!";
 header("Location: add_teacher.php?Message=" . urlencode($Message));   
}
?>