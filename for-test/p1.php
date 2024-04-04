<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>functions</title>
</head>
<body>
    <?php
//    function proMark($markArr) {
//     $sum = 0;
//     foreach ($markArr as $value) {
//         $sum  += $value;
//     }
//     return $sum;
//    }

//    $aman = [94, 96, 93, 91, 65, 97];
//    $mark = proMark($aman);
//    echo "you goat $mark out of 600.";

    function proTipp($markArr) {
        $sum = 0;
        foreach ($markArr as $value) {
            $sum += $value;
        }
        return $sum;
    }

    $aman = [53, 65, 76, 98, 45, 89];
    $mark = proTipp($aman);

    $vivek = [63, 75, 76, 97, 95, 89];
    $vmark = proTipp($vivek);

    echo "you goat $mark out off 600. <br>";
    echo "you goat $vmark out off 600.";

    ?>
</body>
</html>