<?php
include_once 'connection.php';

session_start();
$_SESSION['sid'];
$studentid = $_SESSION['sid'];

$dir = $_POST["file"];    
$new_file_name=$_POST['file_name'];
   $code="#include<stdio.h> \nint main()\n{\n\n}";
    
if(!empty($new_file_name))
{
$path='project_folders/'.$studentid.'/'.$dir.'/'.$new_file_name.'.c';
$r=mysqli_query($db_con,"SELECT * FROM program WHERE ppath='$path'");
$ans=  mysqli_fetch_array($r);
        
if(!$ans)
{
    $my_file=$path;
    $new_file_name=$new_file_name.'.c';
    $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
    fwrite($handle, $code);
    mysqli_query($db_con,'insert into program (sid,pname,ppath,fname) values("'.$studentid.'","'.$new_file_name.'","'.$path.'","'.$dir.'")') or die('unable to connect');
    header('Location:coding.php');
}
 else 
header('Location:coding.php');


}
 else 
header('Location:coding.php');
?>
