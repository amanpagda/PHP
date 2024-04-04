<?php

echo "this is Multi-Dimensional Array <br>";

$aman = array(
    array(1,2,3,4,5),
    array(2,2,7,8,9),
    array(10,12,9,8,5)
);

for($i=0; $i < count($aman); $i++) { 
    for ($j=0; $j < count($aman[$i]); $j++) { 
        echo $aman[$i][$j];
        echo " ";
    }
    echo "<br>";
}

?>