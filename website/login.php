<?php
  $login = false;
  $reset = false;
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "data.php";
    $name = $_POST['name'];
    $pass = $_POST['password'];

    $exsql = "Select * from website where name='$name' AND password='$pass'";
    $result = mysqli_query($conn, $exsql);
    $num = mysqli_num_rows($result);
    if($num == 1){
      $login = true;
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['name'] = $name;
      header('location: home.html');
    }else{
      $reset = "please try again.";
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
<body style="background-image: url(assets/img\ \(4\).jpg);color: white;">
    <?php include "nav.php";?>

    <div class="container mt-4 fw-bold">
      <?php
        if ($login) {
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your information inserted now. 
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
        <form action="login.php" method="post">
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
          </form>
    </div>

</body>
</html>