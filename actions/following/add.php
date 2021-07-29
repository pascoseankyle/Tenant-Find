<?php
    include_once "../../config/database.php";
    $follower =$_POST['follower'];
    $following =$_POST['following'];
    $sql ="INSERT INTO `following_tb`(`id`, `following`, `follower`) VALUES (NULL,'$following','$follower')";
    mysqli_query($conn, $sql);
    header("Location: http://localhost:8080/tenant-find/website/home.php");
?>