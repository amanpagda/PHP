<?php

include "data.php";
    
    if (isset($_POST['upload'])) {
        $img = $_FILES['profile']['tmp_name'];
        $img_name = $_FILES['profile']['name'];

        $uname = $_POST['name'];
        $path = pathinfo($img_name, PATHINFO_EXTENSION);
        $path_loca = 'location/'.$uname.'.'.$path;

        move_uploaded_file($img, $path_loca);

        if (($path!='png') && ($path!='jpg') && ($path!='jpeg') && ($path!='webp')) {
            echo "<script>alert('Invalid Image Extension')</script>";
            exit;
        } else {

            $sql = "INSERT INTO `watermark` (`name`, `profile`) VALUES ('$uname', '$path_loca')";
            if(mysqli_query($conn, $sql)){
                echo "<script>alert('Successful')</script>";
            }else{
                echo "<script>alert('Unsuccessful')</script>";
            }
            
        }
    }

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

<body style="background-image: url(assets/img\ \(4\).jpg);" class="text-white fw-bold">
    <h2 class="text-center bg-success text-white py-3">Upload Image.</h2>
    <div class="container">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label">Upload</label>
                <input type="file" class="form-control" id="profile" name="profile">
            </div>
            <button type="submit" name="upload" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>