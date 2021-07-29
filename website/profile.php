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
        <div class="left-profile">
            <h2><i class="fas fa-users"></i> Following</h2>
                    <?php
                        include_once "../config/database.php";
                        $id = $_COOKIE['id'];
                        $sql = "SELECT following_tb.*, user_tb.name, user_tb.id FROM `following_tb` LEFT JOIN `user_tb` ON
                        following_tb.following = user_tb.id WHERE following_tb.follower = '$id'";
                        $result = mysqli_query($conn, $sql); 
                        if (mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<div class='card-following-items'><b>".$row['name']."<b></div>";
                        }
                    }
                    ?>
                <a href="https://www.facebook.com/">more..</a>
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
                <div class="button-edit"><button><i class="fas fa-user-edit"></i> edit</button></div>
                <hr>
                <?php
                    echo "<p><i class='fas fa-phone'></i> ".$row['mobile']."</p>";
                    echo "<p><i class='fas fa-envelope-open'></i> ".$row['email']."</p>";
                    echo "<p><i class='fas fa-location-arrow'></i> ".$row['city']."</p>";
                    }
                }
                ?>
            </div>
            <form action ="../actions/logout.php" method="POST">
                <button type="submit"  class="logout"><i class="fas fa-sign-out-alt"></i> logout</button>
            </form>
        </div>
        <!-- right -->
        <div class="right-profile">
        <h2><i class="fas fa-laptop-house"></i> Posts </h2>
            <?php
                $sql = "SELECT * FROM `post_tb` WHERE 1";
                $result = mysqli_query($conn, $sql); 
                if (mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                    $array = array();
                    array_push($array, $row);
                    $data = json_encode($array);
                    echo "
                    <div class='card-items'>
                        <h4>Sean Kyle Pasco</h4>
                        <h2>".$row['title']."</h2>
                        <p>".$row['content']."</p>
                        <img class='image' src='../actions/post/uploads/".$row['photo']."'>
                        <br>
                        <br>
                        <br>
                        <div class='button-item'> 
                            <button onclick='rent(".$data.",".$id.")'><i class='fas fa-users-cog'></i> rent </button>  
                            <button onclick='view(".$data.")'><i class='fas fa-eye'></i> view </button>  
                            <form action='../actions/following/add.php' method='POST' style='float:left'>
                                <input name='following' type='hidden' value='".$row['user_id']."'>
                                <input name='follower' type='hidden' value='".$id."'>
                                <button type='submit'><i class='as fa-arrow-circle-up'></i> follow </button> 
                            </form>
                        </div>
                    </div> 
                    ";
                    }
                }
            ?>
        </div>
    </body>
    <script src="../scripts/index.js"></script> 
    <script src="https://kit.fontawesome.com/c4442c2032.js" crossorigin="anonymous"></script>
</html>