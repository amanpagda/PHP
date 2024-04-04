<?php 

echo "welcome to our world.";
$d = date("dS F Y");
echo "<br> $d<br>";

$favCol = array('aman' => 'red', 'vivek' => 'green', 'shanu' => 'biue', 1=>'aman');
// echo $favCol[1];
foreach ($favCol as $key => $value) {
    echo "$key's favcolor is $value<br>";
}

?>