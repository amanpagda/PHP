<?php
//INSERT INTO `connection` (`sno`, `name`, `password`, `date`) VALUES (NULL, 'java', 'java302', current_timestamp());
if($_SERVER['REQUEST_METHOD']='POST'){
    include "assets/data.php";
    $name = $_POST['name'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];

    $exitsql = "SELECT * FROM `connection` WHERE name = '$name'";
    $result = mysqli_query($conn, $exitsql);
    $numexit = mysqli_num_rows($result);
    if($numexit > 0){
        $reset = "Name allready exists.";
    }else{
        if (($pass == $cpass)) {
            $sql = "INSERT INTO `connection` (`name`, `password`, `date`) VALUES ('$name', '$pass', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $insert = true;
                header("location: loginpage.php");
            }
        }else{
            $reset = "please check your password.";
        }   
    }

}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Sign-Up Page</title>
</head>

<body style="background-image:url(assets/img\ \(1\).jpg);opacity: 90%;" class="text-white">

    <div class="container">
        <h2 class="text-center fw-bold mt-3">Login Now.</h2>
        <form class="mt-5" method="post" action="signuppage.php">
            <div class="mb-3 fw-bold ">
                <label class="form-label">Username</label>
                <input type="name" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3 fw-bold ">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3 fw-bold ">
                <label class="form-label">Confirm Password</label>
                <input type="cpassword" class="form-control" id="cpassword" name="cpassword">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>