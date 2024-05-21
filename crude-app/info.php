<?php 
include ("data.php"); 
?>
<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Edit Form</title>
</head>

<body style="background-color:rgb(43, 9, 77)">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between bg-dark text-white p-3 my-4">
            <h2><i class="fa-solid fa-chart-simple"></i> Product Store.</h2>
            <a type="button" class="btn btn-success" href="form.php">
                Back
            </a>
        </div>
    </div>

    <div class="container">
        

        <!-- php form -->
        <?php
        $con = mysqli_connect("localhost", "root", "", "crude");
        $id = $_GET["id"];
        $sql = "SELECT * FROM `crude` WHERE id='$id'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result)) {
            foreach ($result as $row) {
                ?>
                <!-- php form end -->
                <form action="form.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo "$row[id]"; ?>">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Name</span>
                        <input type="text" class="form-control" value="<?php echo "$row[name]"; ?>" name="name" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Price</span>
                        <input type="number" class="form-control" value="<?php echo "$row[price]"; ?>" name="price" min="1"
                            required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Description</span>
                        <textarea class="form-control text-dark" name="description"
                            required><?php echo "$row[description]"; ?></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" name="image" accept=".jpg, .png, .jpeg, .svg">
                        <label class="input-group-text">Images</label>
                        <input type="hidden" name="image_old" value="<?php echo "$row[image]"; ?>">
                    </div>
                    <img class="mb-3" src="<?php echo "upload/$row[image]"; ?>" alt="image" width="200px">
                    <div class="footer">
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                    </div>
                </form>

                <?php
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>