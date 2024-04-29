<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "forum";

$conn = mysqli_connect($server, $username, $password, $database);

if(!$conn){
    die("connection not founde" . mysqli_connect_error($conn));
}

?>