<?php
    include_once "../../config/database.php";
    $id = $_POST['idPost2'];
    $sql = "DELETE FROM `post_tb` WHERE id =$id";
    mysqli_query($conn, $sql);
    header("Location: http://localhost:8080/tenant-find/website/profile.php");
?>