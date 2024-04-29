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

    <!-- carousel start -->

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img (2).jpg" style="height: 550px;" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img (3).jpg" style="height: 550px;" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img (4).jpg" style="height: 550px;" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- carousel end -->

    <!-- card start -->





    <div class="container mt-4">
        <div class="row">
            <?php
            $sql = "SELECT * FROM `login`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['sno'];
                $name = $row['name'];
                $desc = $row['description'];
                echo '<div class="col-lg-4 mt-4">
                    <div class="card" style="width: 18rem;">
                        <img src="https://source.unsplash.com/500x400/?' . $name . ', code, programer" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><a href="threads.php?nameid=' . $id . '">' . $name . '</a></h5>
                            <p class="card-text">' . $desc . '</p>
                            <a href="threads.php?nameid=' . $id . '" class="btn btn-primary">Viwe Threads</a>
                        </div>
                    </div>
                </div>';
            }
    ?>
        </div>
    </div>
    <!-- card end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>