<?php 

$show = false;
$error = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'assets/db.php';
        $Username = $_POST['Username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $exit = false;

        if(($password === $cpassword) && $exit==false){
            $sql = "INSERT INTO `user` ( `username`, `password`, `date`) VALUES ('$Username', '$password', current_timestamp());";
            $result = mysqli_query($con, $sql);
            if ($result) {
                $show = true;   
            }
        }
        else {
            $error = "confirm password is not found.";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Signup</title>
</head>
<body>
    <?php require 'assets/nav.php' ?>

    <?php if($show){
    echo '<div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p>Your are sign in.</p>
    </div>';
    }

    if($error){
    echo '<div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Error!</h4>
        <p>Try again.</p>
    </div>';
    }
    ?>

    <div class="container">
        <h1 class="text-center">Signup to our website</h1>
    <form action="/php/singup.php" method="post">
  <div class="mb-3">
    <label for="Username">Username</label>
    <input type="text" class="form-control" name="Username" id="Username">
  </div>
  <div class="mb-3">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
  
  <button type="submit" class="btn btn-primary">Login</button>
</form>
    </div>
</body>
</html>