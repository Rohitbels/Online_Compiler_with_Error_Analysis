<?php
include_once 'connection.php';
include_once 'delete_files_folder.php';
session_start();

$studentid = $_SESSION['sid'];
$dir = $_POST['folder'];
$path='project_folders/'.$studentid.'/';

    foreach($dir as $value) {

   $folder_path=$path.$value;

if(file_exists($folder_path)===TRUE)
{
    deleteDir($folder_path);
    mysqli_query($db_con,"delete from program where fname='$value' and sid='$studentid'");
   
    mysqli_query($db_con,"delete from folder where fname='$value'");
    header('Location:coding.php');
    
    }
else
    break;
  
        
        }  
            header('Location:coding.php');

            
?>
