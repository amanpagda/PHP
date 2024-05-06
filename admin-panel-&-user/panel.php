<?php
include ("db.php");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Register</title>
</head>

<body style="background-image: url(assets/image.jpg);" class="fw-bold text-white mt-4">
    <div class="container">
        <h2 class="text-center fw-bold">Register Now</h2>
        <?php
        if($insert == 'true'){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successfull!</strong> Well done.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        if($reset == 'true'){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Please try Again.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        
        ?>
        <form method="post" action="panel.php">
            <div class="mb-3">
                <label class="form-label">Username.</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Username">
            </div>
            <div class="mb-3">
                <label class="form-label">Password.</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
            </div>
            <div class="mb-3">
                <label class="form-label">Your Role.</label>
                <select class="form-select" name="role" aria-label="Default select example">
                    <option selected>Select Your Role.</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">File.</label>
                <input type="file" class="form-control" id="file" name="file" placeholder="Select Your File">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
    <script src="panel.js"></script>
</body>

</html>