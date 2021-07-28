<?php
    include_once "../../config/database.php";
?>
<?php
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_COOKIE['id'];
    $file = $_FILES['photo'];
    $fileName = $_FILES['photo']['name'];
    $fileTmpName = $_FILES['photo']['tmp_name'];
    $fileSize = $_FILES['photo']['size'];
    $fileType = $_FILES['photo']['type'];
    $fileError = $_FILES['photo']['error'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    if (in_array($fileActualExt, $allowed)){
        if($fileError === 0 ){
            if($fileSize < 1000000){
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            }
            else {
                echo "file too big";
            }
        }
    }
    else {
        echo "no post";
    }
    $sql = "INSERT INTO `post_tb`(`title`, `content`, `photo`, `created_at`, `user_id`) 
    VALUES ('$title','$content','$fileTmpName', TIMESTAMP,'$user_id')";
    mysqli_query($conn, $sql);
    header("Location: http://localhost:8080/tenant-find/website/home.php");
?>