<?php
    include_once "../../config/database.php";
    $title = $_POST['title'];
    $content = $_POST['content'];
    $id = $_COOKIE['id'];
    $photo = $_FILES['photo']['name'];
    $target = 'uploads/'.basename($_FILES['photo']['name']);
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {}
    $sql = "INSERT INTO `post_tb` (`id`, `title`, `content`, `photo`, `created_at`, `user_id`) VALUES (NULL, '$title', '$content', '$photo', current_timestamp(), '$id');";
    mysqli_query($conn, $sql);
    header("Location: http://localhost:8080/tenant-find/website/post.php");
?>