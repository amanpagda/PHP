<?php include ("data.php"); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Title</title>
</head>

<body style="background-color:rgb(43, 9, 77)">

    <!-- Button trigger modal -->
    <div class="container">
        <div class="d-flex align-items-center justify-content-between bg-dark text-white p-3 my-4">
            <h2><i class="fa-solid fa-chart-simple"></i> Product Store.</h2>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Add Product
            </button>
        </div>
    </div>

    <!-- Modal start -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="data.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Name</span>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Price</span>
                            <input type="number" class="form-control" name="price" min="1" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Description</span>
                            <textarea class="form-control" name="description" required></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="image" accept=".jpg, .png, .jpeg, .svg"
                                required>
                            <label class="input-group-text">Images</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" name="add">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal end -->

     <!-- table start -->
     <div class="container">
        <table class="table table-dark text-white fw-bold">
            <thead>
                <tr class="align-middle text-center">
                    <th width="10%" scope="col">#</th>
                    <th width="15%" scope="col">Name</th>
                    <th width="15%" scope="col">Price($)</th>
                    <th width="20%" scope="col">Description</th>
                    <th width="20%" scope="col">Images</th>
                    <th width="20%" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $con = mysqli_connect("localhost", "root", "", "crude");
                $sql = "SELECT * FROM `crude`";
                $result = mysqli_query($con, $sql);
                $i = 0;
                if(mysqli_num_rows($result) > 0){
                    $i += 1;
                    foreach($result as $row){
                        ?>
                        <tr class="align-middle text-center">
                            <td><?php echo $i;?></td>
                            <td><?php echo $row["name"];?></td>
                            <td><?php echo $row["price"];?></td>
                            <td><?php echo $row["description"];?></td>
                            <td><img src="<?php echo 'upload/'.$row["image"];?>" alt="image" width="150px"></td>
                            <td> 
                                <a href=<?php echo "info.php?id=$row[id]"?> class='btn btn-primary'>
                                    Edit
                                </a>
                                <button onclick="confirm_rem($row[id])" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php
                    }
                }

                ?>

            </tbody>
        </table>
    </div>
    <!-- table end -->

   <!-- Modal start -->
   <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="data.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Name</span>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Price</span>
                            <input type="number" class="form-control" name="price" min="1" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Description</span>
                            <textarea class="form-control" name="desc" required></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="image" accept=".jpg, .png, .jpeg, .svg"
                                required>
                            <label class="input-group-text">Images</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" name="add">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal end -->
    

    
    <script src="pan.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script>

        let table = new DataTable('#myTable');

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>