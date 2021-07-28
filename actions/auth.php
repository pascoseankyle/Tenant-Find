<?php
    include_once "../config/database.php";
?>

<?php
    if (isset($_COOKIE['id'])){
        unset($_COOKIE['id']);
    }

    $email = $_POST['em'];
    $password = $_POST['pw'];

    $sql = "SELECT * FROM `user_tb` WHERE `email` = '$email' && `password` = '$password' ";
    $result = mysqli_query($conn, $sql); 
    if (mysqli_num_rows($result) === 1){
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            setcookie('id', $id, time()+86400);
            $_SESSION['id'] = "$id";
            header("Location: http://localhost:8080/tenant-find/website/home.php");
        }
    }
    else{
        echo "no user";
    }
?>