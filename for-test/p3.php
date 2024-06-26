<?php

if($_SERVER["REQUEST_METHOD"]=="POST") {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "student";

    $con = mysqli_connect($server, $username, $password, $database);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    if (!$con) {
        die("connection not found." . mysqli_connect_error());
    }else{
        $sql = " INSERT INTO `student-name` (`name`, `email`, `password`, `date`) VALUES ('$name', '$email', '$pass', current_timestamp())";
        $result = mysqli_query($con, $sql);

        if($result) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your massege posted.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Massege Error.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Project Form</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Get/Post</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../for-test/p3.php">Home</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class="container mt-4">
    <form action="../for-test/p3.php" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="name" class="form-control" id="name" name="name" placeholder="First Name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" id="pass">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>   
</body>
</html>