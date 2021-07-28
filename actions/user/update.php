<?php
    include_once "../../config/database.php";
?>
<?php
    $name = $_POST['name'];
    $mobile = $_POST['content'];
    $email  = $_POST['email'];
    $password = $_POST['password'];
    $type = $_POST['type'];
    $city = $_POST['city'];
    $sql = "INSERT INTO `user_tb`(`name`, `mobile`, `email`, `password`, `type`, `created_at`, `city`) 
    VALUES ('$name','$mobile','$email','$password','$type',TIMESTAMP,'$city')";
    mysqli_query($conn, $sql);
    header("Location: http://localhost:8080/tenant-find/index.php");
?>