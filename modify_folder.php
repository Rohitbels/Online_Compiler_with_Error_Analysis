<?php
include_once 'connection.php';

session_start();
$_SESSION['sid'];
$studentid = $_SESSION['sid'];

$dir = $_POST['folder'];    
$newname=$_POST['folder_name'];
$path='project_folders/'.$studentid.'/';
if(file_exists($path.$dir)===TRUE)
{
    rename($path.$dir, $path.$newname);
    $fpath=$path.$newname;
    $result = mysqli_query($db_con,"update folder set fname='$newname' where fname='$dir' and sid='$studentid'");
    $result = mysqli_query($db_con,"update folder set fpath='$fpath' where fname='$newname' and sid='$studentid'");
    
    $result = mysqli_query($db_con,"update program set fname='$newname' where fname='$dir' and sid='$studentid'");

//YET to do
//    mysqli_query($db_con,"update suggestion set ppath='$new_file' where ppath='$path' ");    

    header('Location:coding.php');
}
else
    header('Location:coding.php');
?>
