<?php
//
//DELETE FROM `panel` WHERE `panel`.`sno` = $sno;

  $server = "localhost";
  $username = "root";
  $pass = "";
  $database = "submit";

  $conn = mysqli_connect($server, $username, $pass, $database);

  if(!$conn){
      die("connection not found." . mysqli_connect_error());
  }

  $insert = false;

  if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $sql = "DELETE FROM `panel` WHERE `panel`.`sno` = $sno";
    $result = mysqli_query($conn, $sql);
  }
  if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
    if (isset($_POST['snoEdit'])) {
        $sno = $_POST['snoEdit'];
        $name = $_POST['nameEdit'];
        $email = $_POST['emailEdit'];
        $pass = $_POST['passwordEdit'];

      $sql = "UPDATE `panel` SET `name` = '$name', `email` = '$email', `password` = '$pass' WHERE `panel`.`sno` = $sno";
      $result = mysqli_query($conn, $sql);

    }else{

      $name = $_POST['name'];
      $email = $_POST['email'];
      $pass = $_POST['pass'];

      $sql = "INSERT INTO `panel` (`name`, `email`, `password`, `date`) VALUES ('$name', '$email', '$pass', current_timestamp())";
      $result = mysqli_query($conn, $sql);

      if($result) {
          $insert = true;
      }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>Document</title>
</head>

<body style="background-color: rgb(80, 80, 80);" class="fw-bold text-white">


  <!-- Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" class="text-dark">
          <h5 class="modal-title text-dark" id="editModalLabel">Edit Modal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="panel.php" method="post" class="text-dark">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" class="form-control" name="nameEdit" id="nameEdit">
            </div>
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" class="form-control" name="emailEdit" id="emailEdit">
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" class="form-control" id="passwordEdit" name="passwordEdit">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- modal end -->


  <!-- navbar start -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="panel.php">Home</a>
          </li>
      </div>
    </div>
  </nav>
  <!-- navbar end -->

  <!-- form start -->
  <!-- <div class="container mt-3">
    <form action="panel.php" method="post">
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name">
      </div>
      <div class="mb-3">
        <label class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" id="email">
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" id="pass" name="pass">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div> -->
  <!-- form end -->

  <!-- Table start -->
  <div class="container mt-3">
    <table class="table table-dark bg-dark" id="myTable">
      <thead>
        <tr>
          <th scope="col">Numbers</th>
          <th scope="col">Names</th>
          <th scope="col">Emails</th>
          <th scope="col">Passwords</th>
          <th scope="col">Edit / Delete</th>
        </tr>
      </thead>
      <tbody>

        <?php
                $sql = "SELECT * FROM `panel`";
                $result = mysqli_query($conn, $sql);
                $sno = 0;
                while ($a = mysqli_fetch_assoc($result)) {
                    $sno += 1; 
                    echo " <tr>
                    <th scope='row'>". $sno ."</th>
                    <td>". $a["name"] ."</td>
                    <td>". $a["email"] ."</td>
                    <td>". $a["password"] ."</td>
                    <td><button class='btn edit btn-primary' id=". $a['sno'] .">Edit</button> <button class='btn delete btn-primary' id=d". $a['sno'] .">Delete</button></td>
                  </tr>";
                }
            ?>

      </tbody>
    </table>
  </div>
  <!-- Table end -->



  <!-- script section -->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
  <script src="panel.js"></script>
</body>

</html>