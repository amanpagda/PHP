<?php
//INSERT INTO `login` (`sno`, `name`, `email`, `password`, `date`) VALUES (NULL, 'pagda aman', 'aman@thi.com', 'aman263612', current_timestamp());
$server = "localhost";
$username = "root";
$password = "";
$database = "website";

$conn = mysqli_connect($server, $username, $password, $database);

if(!$conn){
    die("connection not found!" . mysqli_connect_error());
}

?>