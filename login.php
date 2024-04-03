<?php 

$login = false;
$error = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'assets/db.php';
        $Username = $_POST['Username'];
        $password = $_POST['password'];
        $exit = false;

            $sql = "Select * form users where username='$username' AND password='$password'";
            $result = mysqli_query($con, $sql);
            $num = mysqli_num_rows($result);
            if ($num == 1) {
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $Username;

            }
        else {
            $error = "Try again.";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <?php require 'assets/nav.php' ?>

    <?php if($show){
    echo '<div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p>Your accout now created and you can login.</p>
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
    <form action="/php/login.php" method="post">
  <div class="mb-3">
    <label for="Username">Username</label>
    <input type="text" class="form-control" name="Username" id="Username">
  </div>
  <div class="mb-3">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
  <div class="mb-3">
    <label for="password">confirm Password</label>
    <input type="password" class="form-control" name="cpassword" id="cpassword">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</body>
</html>