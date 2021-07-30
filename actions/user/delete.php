<?php
    include_once "../../config/database.php";
    $id = $_POST['id2'];
    $sql = "DELETE FROM `user_tb` WHERE id =$id";
    mysqli_query($conn, $sql);
    $sql = "DELETE FROM `post_tb` WHERE `user_id` =$id";
    mysqli_query($conn, $sql);
    $sql = "DELETE FROM `following_tb` WHERE `follower` =$id";
    mysqli_query($conn, $sql);
    $sql = "DELETE FROM `message_tb` WHERE `sender` =$id";
    mysqli_query($conn, $sql);
    header("Location: http://localhost:8080/tenant-find/index.php");
?>