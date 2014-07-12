 <?php

$c = $_POST["c"]; //TEXT FROM THE FIELD
//$ppath = $_POST["ppath"]; //TEXT FROM THE FIELD


$f = 'abc.c'; //FILE TO SAVE (FILENAME EDITABLE)
$o = fopen($f, 'w+'); //OPENS IT
$w = fwrite($o, $c); //SAVES FILES HERE
$r = fread($o, 100000); //READS HERE
fclose($o); //CLOSES AFTER IT SAVES



//DISPLAYS THE RESULTS
if($w){
    echo 'File saved';
} else {
    echo 'Error saving file';
}

?> 