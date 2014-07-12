<?php
include_once 'connection.php';
session_start();
$studentid = $_SESSION['sid'];
$dir=$_POST['folder'];
$path='project_folders/'.$studentid.'/'.$dir;
if(is_dir($path)===FALSE)
{
    mkdir($path);
    mysqli_query($db_con,'insert into folder (sid,fname,fpath) values("'.$studentid.'","'.$dir.'","'.$path.'")') or die('unable to connet');
    header('Location:coding.php');
}
else
header('Location:coding.php');
?>
