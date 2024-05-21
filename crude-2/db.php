<?php 
// connection start
$server = "localhost";
$username = "root";
$password = "";
$database = "crude";

$con = mysqli_connect($server, $username, $password, $database);

if (!$con) {
    die("connection not found". mysqli_connect_error());
}

define("UPLOAD_SRC",$_SERVER['DOCUMENT_ROOT']."/php/crude-app/upload/");

define("FETCH_SRC", "http://127.0.0.1/php/crude-app/upload/");
// connection end

// insert query start


function image_uploade($img){
    $tmp_loc = $img["tmp_name"];
    $new_name = random_int(11111, 99999).$img['name'];

    $new_loc = UPLOAD_SRC.$new_name;

    if(!move_uploaded_file($tmp_loc, $new_loc)){
        header('location: form.php?alert=img_upload');
        exit;
    }else {
        return $new_name;
    }


}

function image_remove($img) {
    if(!unlink(UPLOAD_SRC.$img)) {
        header('location: form.php?alert=img_rem_fail');
        exit;
    }
}

if(isset($_POST['add'])){
    foreach ($_POST as $key => $value) {
        $_POST[$key] = mysqli_real_escape_string($con, $value);
    }

    $imgpath = image_uploade($_FILES['image']);

    $name = $_POST["name"];
    $price = $_POST["price"];
    $desc = $_POST["desc"];

    $sql = "INSERT INTO `crude`(`name`, `price`, `description`, `image`, `date`) VALUES ('$name','$price','$desc','$imgpath', current_timestamp())";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header('location: form.php?success=added');
    }else{
        header('location: form.php?alert=add_error');
    }
    

}

if (isset($_GET['rem']) && $_GET['rem']>0){
    
    $sql = "SELECT * FROM `crude` WHERE `id`='$_GET[rem]'";
    $result = mysqli_query($con, $sql);
    $a = mysqli_fetch_assoc($result);

    image_remove($a["image"]);

    $sql = "DELETE FROM `crude` WHERE `id`='$_GET[rem]'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header("location: form.php?success=removed");
    }else{
        header("location: form.php?Error=remove_error");
    }

}

if (isset($_POSt["update_product"])){

    $name = $_POST['editname'];
    $price = $_POST['editprice'];
    $desc = $_POST['editdesc'];
    $image = $_POST['editimage'];
}


// watermark in image

?>