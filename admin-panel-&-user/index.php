<?

include ("db.php");

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Form Edit/Delete</title>
</head>

<body class="bg-dark">


<!-- table section start -->
    <div class="container">
        <a href="panel.php" class="btn btn-primary mt-3 text-center">Insert</a>
        <!-- Table start -->
        <div class="container mt-3">
            <table class="table table-light bg-light" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">Numbers</th>
                        <th scope="col">Names</th>
                        <th scope="col">Passwords</th>
                        <th scope="col">Role</th>
                        <th scope="col">Photos</th>
                        <th scope="col">Edit / Delete</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                // $sql = "SELECT * FROM `panel`";
                // $result = mysqli_query($conn, $sql);
                // $sno = 0;
                // while ($a = mysqli_fetch_assoc($result)) {
                //     $sno += 1; 
                //     echo " <tr>
                //     <th scope='row'>". $sno ."</th>
                //     <td>". $a["name"] ."</td>
                //     <td>". $a["email"] ."</td>
                //     <td>". $a["password"] ."</td>
                //     <td><button class='btn edit btn-primary' id=". $a['sno'] .">Edit</button> <button class='btn delete btn-primary' id=d". $a['sno'] .">Delete</button></td>
                //   </tr>";
                // }
            ?>

                </tbody>
            </table>
        </div>
        <!-- Table end -->
    </div>
<!-- table section end -->


    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
  <script src="panel.js"></script>
</body>

</html>