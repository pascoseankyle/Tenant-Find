<?php
    include_once "../../config/database.php";
    $name =$_POST['name'];
    $mobile =$_POST['mobile'];
    $email  =$_POST['email'];
    $password =$_POST['password'];
    $type =$_POST['type'];
    $city =$_POST['city'];
    $photo = $_FILES['photo']['name'];
    $target = 'uploads/'.basename($_FILES['photo']['name']);
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {}
    $sql ="INSERT INTO `user_tb` (`id`, `name`, `mobile`, `email`, `password`, `type`, `created_at`, `city`,`photo`) VALUES (NULL, '$name', '$mobile', '$email', '$password', '1', current_timestamp(), '$city', '$photo');";
    mysqli_query($conn, $sql);
    header("Location: http://localhost:8080/tenant-find/index.php");
?>