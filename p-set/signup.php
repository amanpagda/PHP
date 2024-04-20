<?php
  $insert = false;
  $reset = false;
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "db.php";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $exitsql = "SELECT * FROM `login` WHERE name = '$name'";
    $result = mysqli_query($conn, $exitsql);
    $ai = mysqli_num_rows($result);
    if($ai > 0){
      $reset = "name allready exists.";
    }else{
      $sql = "INSERT INTO `login` (`name`, `email`, `password`, `date`) VALUES ('$name', '$email', '$pass', current_timestamp())";
      $result = mysqli_query($conn, $sql);

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
    <title>SignUp Form</title>
</head>
<body style="background-color: rgb(31, 34, 52);color: white;">
    <?php include "nav.php";?>

    <div class="container mt-4 fw-bold">
      <?php
        if ($insert) {
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> You are success fully loggedin now. 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        if ($reset) {
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Error</strong> '. $reset .' 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
      ?>
        <form action="signup.php" method="post">
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" maxlength="8" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
          </form>
    </div>

</body>
</html>