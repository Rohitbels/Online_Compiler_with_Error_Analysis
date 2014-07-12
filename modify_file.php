<?php
include_once 'connection.php';
session_start();
$_SESSION['sid'];
$studentid = $_SESSION['sid'];

$dir = $_POST['file'];    
$new_file_name=$_POST['rename'];

list($part1, $part2) = explode('/', $dir);
$path='project_folders/'.$studentid.'/'.$dir;

$new_file_name1=$new_file_name.'.c';
$new_file='project_folders/'.$studentid.'/'.$part1.'/'.$new_file_name1;
//echo $new_file;

if(file_exists($path)===TRUE)
{
        $fsrc = fopen($path,'r');
        $fdest = fopen($new_file,'w+');
        $len = stream_copy_to_stream($fsrc,$fdest);
        fclose($fsrc);
        fclose($fdest); 
        unlink($path);
    mysqli_query($db_con,"update program set pname='$new_file_name1' where fname='$part1' and sid='$studentid' and pname='$part2'");
    mysqli_query($db_con,"update program set ppath='$new_file' where pname='$new_file_name1' ");
    mysqli_query($db_con,"update suggestion set ppath='$new_file' where ppath='$path' ");
    header('Location:coding.php');
}


?>
