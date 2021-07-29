<?php
    include_once "../../config/database.php";
    $name =$_POST['name'];
    $mobile =$_POST['mobile'];
    $email  =$_POST['email'];
    $password =$_POST['password'];
    $type =$_POST['type'];
    $city =$_POST['city'];
    $sql ="INSERT INTO `user_tb` (`id`, `name`, `mobile`, `email`, `password`, `type`, `created_at`, `city`) VALUES (NULL, '$name', '$mobile', '$email', '$password', '1', current_timestamp(), '$city');";
    mysqli_query($conn, $sql);
    header("Location: http://localhost:8080/tenant-find/index.php");
?>