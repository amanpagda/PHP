<?php

header('content-type: image/jpeg');

$sourceImg = 'image.jpg';
$mywatermark = imagecreatefromjpeg('logo.jpeg');
$width = imagesx($mywatermark);
$height = imagesy($mywatermark);

$image = imagecreatefromjpeg($sourceImg);
$imagesize = getimagesize($sourceImg);

$x = $imagesize[0] - $width - 20;
$y = $imagesize[1] - $height - 40;

imagecopy($image, $mywatermark, $x, $y, 0, 0, $width, $height);

imagejpeg($image, time() .'.jpeg');
imagejpeg($image);


imagedestroy($image);
imagedestroy($mywatermark);


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Title</title>
</head>

<body>

<h1 class="bg-success text-white text-center py-3">Image Table</h1>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include "data.php";
                $sql = "SELECT * FROM `watermark`"; 
                $result = mysqli_query($conn, $sql);
                while($i = mysqli_fetch_assoc($result)){
                    echo "
                    <tr>
                        <td>$i[sno]</td>
                        <td>$i[name]</td>
                        <td><img src='$i[profile]' width='100px'></td>
                    </tr>
                    ";
                }
                
                ?>
                
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>