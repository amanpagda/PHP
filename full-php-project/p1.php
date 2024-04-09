<?php
    
$server = "localhost";
$username = "root";
$password = "";
$database = "notes";
$insert = false;

$conn = mysqli_connect($server, $username, $password, $database);

if(!$conn) {
    die("connection was not found at all." . mysqli_connect_error());
}

if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $sql = "DELETE FROM `login` WHERE `login`.`sno` = $sno";
    $result = mysqli_query($conn, $sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['snoedit'])) {
        $sno = $_POST['snoedit'];
        $name = $_POST['nameEdit'];
        $email = $_POST['emailEdit'];
        $pass = $_POST['passwordEdit'];

        $sql = "UPDATE `login` SET `name` = '$name', `email` = '$email', `password` = '$pass' WHERE `login`.`sno` = $sno";
        $result = mysqli_query($conn, $sql);
        
    }else{
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $sql = "INSERT INTO `login` (`name`, `email`, `password`, `date`) VALUES ('$name', '$email', '$pass', current_timestamp())";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $insert = true;
        }
    }
}
?>