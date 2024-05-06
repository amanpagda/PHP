<?php
    
$server = "localhost";
$username = "root";
$password = "";
$database = "adminpanel";
$insert = false;

$conn = mysqli_connect($server, $username, $password, $database);

if(!$conn) {
    die("connection was not found at all." . mysqli_connect_error());
}
$insert = false;
$reset = false;


if($_SERVER['REQUEST_METHOD']=='POST'){
    $uname = $_POST['name'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "INSERT INTO `admin`(`name`, `password`, `role`, `date`) VALUES ('$uname','$password','$role',current_timestamp())";
    $result = mysqli_query($conn, $sql);

    if($result){
        $insert = true;
    } else{
        $reset = true;
    }
}
?>