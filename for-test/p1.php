<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP_Loops</title>
</head>
<body>
    <?php
    $age = 70;

    // if($age>=25) {
    //     echo "you can drink alcohol.";
    // }elseif($age>=65){
    //     echo "you can not drink alcohol.";
    // }else{
    //     echo "nikkal";
    // }
    
    switch($age){
        case $age<=12:
            echo "you are just 12 years old.";
            break;
        case $age<=25:    
            echo "you are 25 years old.";
            break;
        case $age<=65;
            echo "you are very old.";    
    }

    // $a = 1;

    // while($a<=50){
    //     echo $a;
    //     echo "<br>";
    //     $a++;
    // }

    // for ($a=1; $a <= 50 ; $a++) { 
    //     echo $a;
    //     echo "<br>";
    // }

    $i = 1;

    do {
        echo $i;
        echo "<br>";
        $i++;
    } while ($i <= 10);


    $arr = array("bmw", "volvo", "tesla", "ford", "toyota");
    foreach ($arr as $arr => $value) {
        echo "$value <br>";
    }


    ?>
</body>
</html>