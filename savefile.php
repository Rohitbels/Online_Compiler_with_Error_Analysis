 <?php

$ppath = $_POST['p'];//TEXT FROM THE FIELD
$content = $_POST['data'];//TEXT FROM THE FIELD


$o = fopen($ppath, 'w+'); //OPENS IT
$w = fwrite($o, $content); //SAVES FILES HERE
$r = fread($o, 100000); //READS HERE
fclose($o); //CLOSES AFTER IT SAVES



//DISPLAYS THE RESULTS
if($w){
    echo 'File saved';
} else {
    echo 'Error saving file';
}

?> 