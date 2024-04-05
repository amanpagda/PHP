<?php

if($_SERVER["REQUEST_METHOD"]){
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "";

    $connect = mysqli_connect($server, $username, $password, $database);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    if(!$connect){
        die("connection not found!" . mysqli_connect_error());
    }else {
        echo "connection success.";
    }

}

?>