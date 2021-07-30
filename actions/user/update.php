<?php
    include_once "../../config/database.php";
    $id = $_POST['id']; 
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email  = $_POST['email'];
    $password = $_POST['password'];
    $type = $_POST['type'];
    $city = $_POST['city'];
    $photo = $_FILES['photo']['name'];
    $target = 'uploads/'.basename($_FILES['photo']['name']);
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {}
    $sql = "UPDATE `user_tb` SET `name`='$name',`mobile`='$mobile',`email`='$email',`password`='$password',`type`='$type',`city`='$city', `photo`='$photo' WHERE id =$id";
    mysqli_query($conn, $sql);
    header("Location: http://localhost:8080/tenant-find/website/profile.php");
?>