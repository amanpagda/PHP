<?php 
$server = "localhost";
$username = "root";
$password = "";
$database = "user";

$con = mysqli_connect($server, $username, $password, $database);
if (!$con) {
    die("error" . mysqli_connect_error());
}

?>