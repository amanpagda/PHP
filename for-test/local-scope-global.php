<?php

echo "<h2>welcome to local - scope - global.</h2><br>";

$a = 38;//global variables
$b = 40;//global variables

function locGlo() {
    global $a, $b;
    $a = 100;//local variables
    $b = 100;//local variables
    echo "aman you goat a $b marks out of 50.<br>";
    echo "om you goat a $a marks out of 50.<br>";
}
locGlo();
echo "$a and $b are full marks.";

echo var_dump($GLOBALS);

?>