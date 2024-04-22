<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "contact";

$conn = mysqli_connect($server, $username, $password, $database);

if(!$conn){
    echo 'connection not found' . mysqli_connect_error();
}

?>