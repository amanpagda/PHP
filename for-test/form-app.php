<?php
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "notes";

  $insert = false;
  $conn = mysqli_connect($server, $username, $password, $database);

  if (!$conn) {
    die("Database not founded!" . mysqli_connect_error());
  }
  
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = $_POST["title"];
  $Description = $_POST["description"];

  $sql = "INSERT INTO `notes` (`Title`, `Description`, `date`) VALUES ('$title', '$Description', current_timestamp())";
  $result = mysqli_query($conn, $sql);

    
  if($result){
    $insert = true;
  }else{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Danger!</strong> Your massege not found.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
    <title>Form - App</title>
  </head>
  <body>

    <div class="modal fade" tabindex="-1" id="editModal" role="dialog" aria-labelledby="editModalLabel" >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Modal title</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
            <form action="/for-test/form-app.php" method="post">
              <div class="mb-3 from-group">
                  <label for="Title">Title</label>
                  <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp" placeholder="Title">
              </div>
              <div class="mb-3 from-group">
                  <label for="text">Description</label>
                  <textarea name="descriptionEdit" id="descriptionEdit" class="form-control" placeholder="Description" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Add Note</button>
          </form>    

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Form App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../for-test/form-app.php">Home</a>
        </li>
      </ul>
    </div>
  </div>
</nav>



<div class="container">
  <div class="row">
    <div class="col-4">
      <form action="../for-test/form-app.php" method="post">
          <div class="mb-3 from-group">
              <label for="Title">Title</label>
              <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Title">
          </div>
          <div class="mb-3 from-group">
              <label for="text">Description</label>
              <textarea name="description" id="description" class="form-control" placeholder="Description" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Add Note</button>
      </form>  
      
        <div class="container my-4">    
          <?php
          if($insert == 'true'){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your massege posted.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
          }
          ?>
    </div>
  </div>  
    
    <!-- php section -->
    
    <div class="col-8">
      <div class="container">
        <table class="table table-dark bg-dark" id="myTable">
          <thead>
            <tr>
              <th scope="col">S.No</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>

          <?php
            $sql = "SELECT * FROM `notes`";
            $result = mysqli_query($conn, $sql);
            $sno = 0;
            while ($row = mysqli_fetch_assoc($result)) {
              $sno = $sno + 1;
              echo "<tr>
              <th scope='row'>". $sno . "</th>
              <td>" . $row['Title'] . "</td>
              <td>" . $row['Description'] ."</td>
              <td><button class='btn edit btn-primary'>Edit</button> <button class='btn delete btn-primary'>Delete</button></td>
            </tr>";
            }
            
          ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
<script>let table = new DataTable('#myTable');</script>
<script>

let edits = document.getElementsByClassName('edit');
let myModal = document.getElementById('editModal');
Array.from(edits).forEach((element)=>{
  element.addEventListener('click', (e)=>{
    tr = e.target.parentNode.parentNode;
    title = tr.getElementsByTagName('td')[0].innerText;
    description = tr.getElementsByTagName('td')[1].innerText;
    titleEdit.value = title;
    descriptionEdit.value = description;
    myModal.toggle();
    
  })
})

</script>
  </body>
  </html>