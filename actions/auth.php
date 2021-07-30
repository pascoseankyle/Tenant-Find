<?php
    include_once "../config/database.php";
    $email = $_POST['em'];
    $password = $_POST['pw'];
    $sql = "SELECT * FROM `user_tb` WHERE `email` = '$email' && `password` = '$password'";
    $result = mysqli_query($conn, $sql); 
    if (mysqli_num_rows($result) === 1){
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            setcookie('id', $id, time()+86400,'/tenant-find/website/profile.php');
            setcookie('id', $id, time()+86400,'/tenant-find/website/home.php');
            setcookie('id', $id, time()+86400,'/tenant-find/website/post.php');
            setcookie('id', $id, time()+86400,'/tenant-find/website/messages.php');
            setcookie('id', $id, time()+86400,'/tenant-find/actions/post/add.php');
            header("Location: http://localhost:8080/tenant-find/website/profile.php");
        }
    }
    else{
        echo "no user found: wrong password or email or no account";
    }

?>