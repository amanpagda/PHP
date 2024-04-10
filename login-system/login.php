<?php
$reset = false;
$login = false;
//SELECT * FROM `user`
if($_SERVER['REQUEST_METHOD']=='POST'){
    include "dbconn.php";
    $name = $_POST['name'];
    $pass = $_POST['password'];
        
        $sql = "Select * from users where name='$name' AND password='$pass'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $name;
            header("location: welcome.php");
        }
        else{
            $reset = "Please try again.";
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
    <title>Login Form</title>
</head>

<body>
    <?php include "navbar.php";?>

    <div class="container mt-4">
        <?php
            if ($login) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> You are loggedin now.
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
        <h2 class="text-center mb-3">Login to our Website.</h2>
        <form action="login.php" method="post">
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
</body>

</html>