<?php
    include_once "../config/database.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../styles/index.css">
    </head>
    <body>
        <nav>
            <!-- left -->
            <div class="left-nav" style="padding-left: 20px;">
                <h1>Tenant Find</h1>
            </div>
            <!-- middle -->
            <div class="middle-nav">
                <button class="home-buttons" onclick="home()"><i class="fas fa-home"></i></button>
                <button onclick="profile()" class="home-buttons"><i class="fas fa-users-cog"></i></button>
                <button onclick="messages()" class="home-buttons"><i class="fas fa-envelope"></i></button>
            </div>
            <!-- right -->
            <div class="right-nav"></div>
        </nav>
        <!-- left -->
        <div class="left">
        </div>
        <!-- middle -->
        <div class="div-center">
            <div class="card-image">
                <img class="image-profile" src="https://i.pinimg.com/originals/53/82/8c/53828c9c2f80269a0e82e0b0c18a65b1.jpg">
            </div>
            <div class="text-center">
                <?php 
                    $id = $_COOKIE['id'];
                    $sql = "SELECT * FROM `user_tb` WHERE `id` = '$id' ";
                    $result = mysqli_query($conn, $sql); 
                    if (mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<h2>".$row['name']."</h2>";          
                        
                ?>
                <div class="button-center"><button>edit</div>
                <hr>
                <?php
                    echo "<p><i class='fas fa-phone'></i> ".$row['mobile']."</p>";
                    echo "<p><i class='fas fa-envelope-open'></i> ".$row['email']."</p>";
                    echo "<p><i class='fas fa-location-arrow'></i> ".$row['city']."</p>";
                    }
                }
                ?>
            </div>
            <button onclick="logout()" class="logout"><i class="fas fa-sign-out-alt"></i> logout</button>
        </div>
    </body>
    <script src="../scripts/index.js"></script> 
    <script src="https://kit.fontawesome.com/c4442c2032.js" crossorigin="anonymous"></script>
</html>