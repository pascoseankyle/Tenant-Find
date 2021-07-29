<?php
    include_once "../../config/database.php";
    $subject =$_POST['subject'];
    $message =$_POST['message'];
    $sender =$_POST['sender'];
    $receiver =$_POST['receiver'];
    $sql ="INSERT INTO `message_tb` (`id`, `subject`, `message`, `sender`, `receiver`) VALUES (NULL, '$subject', '$message', ' $sender', '$receiver');";
    mysqli_query($conn, $sql);
    header("Location: http://localhost:8080/tenant-find/website/home.php");
?>