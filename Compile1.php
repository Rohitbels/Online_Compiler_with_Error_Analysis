<?php
error_reporting(E_ERROR);
session_start();
$filename=$_SESSION['filename'];

  $username = "root";
        $password = "";
        $hostname = "localhost"; 
        $db="proj";
        $dbhandle = mysqli_connect($hostname, $username, $password,$db)
         or die("Unable to connect to MySQL");
        mysqli_query($dbhandle,"SET NAMES 'utf8'");

mysqli_query($dbhandle, "update program set compilation=compilation+1 where ppath='$filename'");
unlink('error_sorted.txt');
unlink('abc');
shell_exec('gcc flush_c.c');
shell_exec('gcc -o abc abc.c 2> error.txt');

$output=  passthru('timeout .1 ./abc < input');
$filename1="error.txt";
if( filesize($filename1)==0)
{
    $File2 = "soln.txt"; 
    $Handle2 = fopen($File2, 'w');
            $soln="";
            fwrite($Handle2, $soln); 
            
    fclose($Handle2); 
    
echo($output);      
}
else {
header('Location: error.php');
}
