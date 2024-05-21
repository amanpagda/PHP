<?php

// connection start
$server = "localhost";
$username = "root";
$password = "";
$database = "crude";

$con = mysqli_connect($server, $username, $password, $database);

if (!$con) {
    die("connection not found" . mysqli_connect_error());
}


// insert query start.

if (isset($_POST['add'])) {

    $name = $_POST["name"];
    $price = $_POST["price"];
    $desc = $_POST["description"];
    $img = $_FILES["image"]["name"];

        if (file_exists("upload/" . $_FILES["image"]["name"])) {
            $filename = $img;
            header('location: form.php?already=exists_file');
        } else {
            $sql = "INSERT INTO `crude`(`name`, `price`, `description`, `image`, `date`) VALUES ('$name','$price','$desc','$img', current_timestamp())";
            $result = mysqli_query($con, $sql);

            if ($result) {
                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
                header('location: form.php?success=added');
            } else {
                header('location: form.php?alert=add_error');
            }
        }
}

// update query start.

if (isset($_POST["update"])) {

    $id = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $desc = $_POST["description"];

    $new_img = $_FILES['image']['name'];
    $old_img = $_POST['image_old'];

    if($new_img != ''){
        $update_filename =  $_FILES['image']['name'];
    }else{
        $update_filename = $_POST['image_old'];
    }

    
    if (file_exists("upload/" . $_FILES["image"]["name"])) {
        $filename = $_FILES['image']['name'];
        header('location: form.php?already=exists_file');
    } else {
        $sql = "UPDATE `crude` SET `name`='$name', `price`='$price', `description`='$desc', `image`='$update_filename' WHERE id='$id'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            if($_FILES['image']['name'] != ''){
                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
                unlink("upload/". $old_img);
            }
            header('location: form.php?success=Update');
        }else{
            header('location: form.php?Error=Update');
        }

    }



}
?>