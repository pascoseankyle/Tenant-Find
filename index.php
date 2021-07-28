<?php
    if (isset($_COOKIE['id'])){
        unset($_COOKIE['id']);
    }
    header("Location: http://localhost:8080/tenant-find/website/login.php");
    die();
?>