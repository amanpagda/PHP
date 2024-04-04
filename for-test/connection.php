<?php

$server = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($server, $username, $password);

if(!$conn) {
    die("connection was not found at all." . mysqli_connect_error());
}else{
    echo "connection success!";
}

?>