<?php

function displaySymbol($symbols){
    echo "<img src='../labs/lab2/img/$symbols.png' width='70'/>";
}
$symbols = array("lemon", "orange", "cherry");
$symbols[] = "grapes";//adds element at the end of the array
//$symbol[2] = "seven"; // replacing value
array_push ($symbols, "seven");// adds element at the end of the array

displaySymbol($symbols[4]);
for($i=0; $i<count($symbols);$i++){
    displaySymbol($symbols[$i]);
}
sort($symbols); // sorts elements in ascneding order
print_r($symbols);
shuffle($symbols);
echo"<hr>";
print_r($symbols);
echo"<hr>";

$lastSymbol = array_pop($symbols); // retrieves and Removes last element in a  array


foreach($symbols as $s){
    displaySymbol($s);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> PHP Arrays </title>
    </head>
    <body>
        
        
        
        
    </body>
</html>