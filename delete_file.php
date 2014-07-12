<?php
include_once 'connection.php';
session_start();
$studentid = $_SESSION['sid'];
$dir = $_POST['folder'];


    foreach($dir as $value) {

$path='project_folders/'.$studentid.'/';

list($folder, $file) = explode('/', $value);

    if($value!=='not')
{
   $folder_path=$path.$folder.'/'.$file;
    if(file_exists($folder_path)===TRUE)
    {
    unlink($folder_path);
    $result = mysqli_query($db_con,"delete from program where pname='$file' and fname='$folder' and sid='$studentid'");
 
   header('Location:coding.php');
    
    }
}
else
    break;
  
        
        }  
     //       header('Location:coding.php');

?>
