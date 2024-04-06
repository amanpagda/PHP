<?php

if($_SERVER["REQUEST_METHOD"]){
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "student";

    $connect = mysqli_connect($server, $username, $password, $database);

    // $name = $_POST['name'];
    // $email = $_POST['email'];
    // $pass = $_POST['password'];

    if(!$connect){
        die("connection not found!" . mysqli_connect_error());
    }else {
        // echo "connection success.";
    }

    // $sql = "SELECT * FROM `student-name` WHERE `password`='alish2636'";
    // $result = mysqli_query($connect, $sql);

    // $num = mysqli_num_rows($result);
    // echo "$num <br>";

   $sql = " DELETE FROM `student-name` WHERE `name` = 'Alish Pagda'";
   $result = mysqli_query($connect, $sql);
   
   $aff = mysqli_affected_rows($connect);
   echo "<br> number of affected rows : $aff<br>";

}

?>