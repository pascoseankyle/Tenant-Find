<?php
    include_once "../../config/database.php";
    $id = $_POST['idPost']; 
    $title = $_POST['titlePost'];
    $content = $_POST['contentPost'];
    $sql = "UPDATE `post_tb` SET `title`='$title',`content`='$content' WHERE id=$id";
    mysqli_query($conn, $sql);
    header("Location: http://localhost:8080/tenant-find/website/profile.php");
?>