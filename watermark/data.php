<?php

$conn = mysqli_connect("localhost", "root", "", "watermark");

if(mysqli_connect_error()){
    echo "database cannot connected.";
}
?>