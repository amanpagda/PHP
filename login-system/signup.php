<?php
$reset = false;
$insert = false;
//SELECT * FROM `user`
if($_SERVER['REQUEST_METHOD']=='POST'){
    include "dbconn.php";
    $name = $_POST['name'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];

    $exitsql = "SELECT * FROM `users` WHERE name = '$name'";
    $result = mysqli_query($conn, $exitsql);
    $numexit = mysqli_num_rows($result);
    if($numexit > 0){
        $reset = "Name allready exists.";
    }else{
        if (($pass == $cpass)) {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`name`, `password`, `date`) VALUES ('$name', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $insert = true;
                header("location: login.php");
            }
        }else{
            $reset = "please check your password.";
        }   
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Signup</title>
</head>

<body>
    <?php include "navbar.php";?>

    <div class="container mt-4">
        <?php
            if ($insert) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> You insert the value in database.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            if ($reset) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>  '. $reset .' 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            
        ?>
        <?php
           
            
        ?>
        <h2 class="text-center mb-3">Signup to our Website.</h2>
        <form action="signup.php" method="post">
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
            </div>
            <button type="submit" class="btn btn-primary">SignUp</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
</body>

</html>