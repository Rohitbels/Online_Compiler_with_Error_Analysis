<?php
    session_start();
    $sid=$_SESSION['sid'];
    $filename=$_SESSION['filename'];


$file = 'error.txt';
$searchfor = 'error';
$searchfor1 = 'undefined';
$searchfor2 = 'warning';
header('Content-Type: text/plain; charset=UTF-8');
unlink('soln.txt');
$File2 = "soln.txt"; 
    $Handle2 = fopen($File2, 'a');

$username = "root";
$password = "";
$hostname = "localhost"; 
$db="proj";
$dbhandle = mysqli_connect($hostname, $username, $password,$db)
  or die("Unable to connect to MySQL");
mysqli_query($dbhandle,"SET NAMES 'utf8'");

$pattern = preg_quote($searchfor, '/');
$pattern1 = preg_quote($searchfor1, '/');
$pattern2 = preg_quote($searchfor2, '/');

$pattern = "/^.*$pattern.*\$/m";
$pattern1 = "/^.*$pattern1.*\$/m";
$pattern2 = "/^.*$pattern2.*\$/m";
$Handle1 = @fopen($file, 'r');


do
{
$contents = fgets($Handle1);
if(preg_match_all($pattern1, $contents, $matches)){
   echo "\n";
    $File1 = "error_sorted.txt"; 
    $Handle = fopen($File1, 'a');
    $Data =  implode("\n", $matches[0]);
    
    mysqli_query($dbhandle, "insert into err (pname,error,errorname,sid) values('$filename','Undefined Reference to a Function','$searchfor1','$sid')");
    fwrite($Handle, $Data); 
    fwrite($Handle, "\n");
    fclose($Handle); 
    echo $Data;
}


if(preg_match_all($pattern, $contents, $matches)){
   echo "\n";
    $File1 = "error_sorted.txt"; 
    $Handle = fopen($File1, 'a');
    $File2 = "soln.txt"; 
    $Handle2 = fopen($File2, 'a');

    $Data =  implode("\n", $matches[0]); 
    $result = mysqli_query($dbhandle,"SELECT * FROM errdb");
    $count=0;
    while($row = mysqli_fetch_array($result))
    {
        $row1=$row['errname'];
        $pattern4 = preg_quote($row1, '/');
        $pattern4 = "/^.*$pattern4.*\$/m";
        if(preg_match_all($pattern4, $Data, $matches))  
        {
            preg_match('/error:.*/', $contents, $match);
            $err4=$match[0];
            mysqli_query($dbhandle, "insert into err (pname,error,errorname,sid) values('$filename','$err4','$row1','$sid')");
            
            $result1=mysqli_query($dbhandle, "select soln from sol where ges='$row1'");
            $row2= mysqli_fetch_array($result1);	
            $soln=$row2['soln'];
        
            
            fwrite($Handle2, $soln); 
            fwrite($Handle2, "\n");
            
            fwrite($Handle, $Data); 
            fwrite($Handle, "\n");
            echo $Data;
            $count=1;
            break;
        }
    }
    if($count==0)
    {
        //mysqli_query($dbhandle, "insert into errdb (errname) values('$Data')");
        preg_match('/error:.*/', $contents, $match);
        $err4=$match[0];
        mysqli_query($dbhandle, "insert into err (pname,error,errorname,sid) values('$filename','$err4','New Error','$sid')");
        fwrite($Handle, $Data); 
        fwrite($Handle, "\n");
        $soln="Solution not Available";
            fwrite($Handle2, $soln); 
            fwrite($Handle2, "\n");

        echo $Data;
     }
    fclose($Handle); 
}

if(preg_match_all($pattern2, $contents, $matches)){
   echo "\n";
    $File1 = "error_sorted.txt"; 
    $Handle = fopen($File1, 'a');
    $Data =  implode("\n", $matches[0]);   
    mysqli_query($dbhandle, "insert into err (pname,error,errorname,sid) values('$filename','$Data','$searchfor2','$sid')");
    fwrite($Handle, $Data); 
    fwrite($Handle, "\n");
    fclose($Handle); 
    echo $Data;
}


}while(!feof($Handle1));
mysqli_close($dbhandle);  
