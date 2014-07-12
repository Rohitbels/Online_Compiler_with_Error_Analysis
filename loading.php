<?php
$file = $_POST['file_name'];
$f = fopen($file, "r");
while ( $line = fgets($f, 1000) ) {
print $line;
}
session_start();
$_SESSION['filename']=$file;
?>