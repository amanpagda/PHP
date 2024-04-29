<?php
include "data.php";


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Forum</title>
</head>

<body>
    <?php include "nav.php" ?>
    <?php 
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `cat_forum` WHERE cat_sno=$id;";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['title'];
        $desc = $row['descr'];

    }
    ?>
    <div class="container mt-3">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading"><?php echo $title; ?>.</h4>
            <p><?php echo $desc; ?></p>
            <hr>
            <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
            
        </div>
    </div>

    <div class="container">
        <h2 class="fw-bold">Discussions.</h2>
        <!-- <?php
            $id = $_GET['nameid'];
            $sql = "SELECT * FROM `cat_forum` WHERE cat_id=$id;";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['cat_sno'];
                $title = $row['title'];
                $descr = $row['descr'];

                echo
                '<div class="media mt-4">
                    <div class="media-body">
                        <img src="img (4).jpg" width="150px" alt="image" class="mr-3 me-3 mt-1" style="float:left">
                        <h4 class="mt-0"><a href="thread.php">' . $title . '</a></h4>
                        <p>' . $descr . '</p>
                    </div>
                </div>';
            }
        ?> -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>