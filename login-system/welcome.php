<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
    header("location: login.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Welcome -
        <?php echo $_SESSION['name'];?>
    </title>
</head>

<body>
    <?php include "navbar.php";?>
    <div class="container mt-4">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Well done!</h4>
            <p>Well Done -
                <?php echo $_SESSION['name'];?>
            </p>
            <hr>
            <p class="mb-0">You are Successfuly loggedin.</p>
        </div>
    </div>
</body>

</html>