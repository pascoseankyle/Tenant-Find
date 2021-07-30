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
        </div>
        <!-- middle -->
        <div class="div-center">
            <div class="text-center">
                <?php 
                    $id = $_COOKIE['id'];
                    $sql = "SELECT * FROM `user_tb` WHERE `id` = '$id' ";
                    $result = mysqli_query($conn, $sql); 
                    if (mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            $array = array();
                            array_push($array, $row);
                            $data = json_encode($array);
                            echo "<div class='card-image'>
                                <img class='image' src='../actions/user/uploads/".$row['photo']."'>
                            </div>";
                            echo "<h2>".$row['name']."</h2>"; 
                            echo "<div class='button-edit'><button onclick='userModal(".$data.")'><i class='fas fa-user-edit'></i> edit</button></div>";         
                        
                ?>
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
                $sql = "SELECT * FROM `post_tb` WHERE `user_id` = '$id' ";
                $result = mysqli_query($conn, $sql); 
                if (mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                    $array = array();
                    array_push($array, $row);
                    $data = json_encode($array);
                    echo "
                    <div class='card-items'>
                        <h2>".$row['title']."</h2>
                        <p>".$row['content']."</p>
                        <img class='image' src='../actions/post/uploads/".$row['photo']."'>
                        <br>
                        <br>
                        <br>
                        <div class='button-item'> 
                            <button onclick='postModal(".$data.")'><i class='fas fa-eye'></i> view </button>  
                        </div>
                    </div> 
                    ";
                    }
                }
            ?>
        </div>
        <!-- modals -->
        <div id="editProfileModal" class="modal">
            <div class="modal-content">
                <span id="span-profile"class="close">&times;</span>
                <h4> Edit Profile </h4>
                <form action="../actions/user/update.php" method="POST" enctype="multipart/form-data">
                    <input id="id" name="id" type="hidden" placeholder="Name" class="input-signup">
                    <input id="name" name="name" type="text" placeholder="Name" class="input-signup">
                    <input id="mobile" name="mobile" type="number" placeholder="Mobile" class="input-signup">
                    <input id="email" name="email" type="text" placeholder="Email" class="input-signup">
                    <input id="password" name="password" type="text" placeholder="Password" class="input-signup">
                    <select id="type" name="type" class="input-signup">
                        <option value="0">Landlord</option>
                        <option value="1">Tenant</option>
                    </select>
                    <input name="photo" type="file" class="input-signup">
                    <input id="city" name="city" type="text" placeholder="City" class="input-signup">
                    <br>
                    <div class="button-edit"><button type="submit">save</button></div>
                    <hr>                    
                </form>
                <form action="../actions/user/delete.php" method="POST">
                    <input id="id2" name="id2" type="hidden" placeholder="Name" class="input-signup">
                    <button class="logout" type="submit">delete</button>
                </form>
            </div>
        </div>
        <div id="editPostModal" class="modal">
            <div class="modal-content">
                <span id="span-post"class="close">&times;</span>
                <h4> Edit Post </h4>
                <form action="../actions/post/update.php" method="POST">
                    <input id="idPost" name="idPost" type="hidden" placeholder="Name" class="input-signup">
                    <input id="titlePost" name="titlePost" type="text" placeholder="Name" class="input-signup">
                    <input id="contentPost" name="contentPost" type="text" placeholder="Name" class="input-signup">
                    <br>
                    <div class="button-edit"><button type="submit">save</button></div> 
                    <hr>
                </form>
                <form action="../actions/post/delete.php" method="POST">
                    <input id="idPost2" name="idPost2" type="hidden" placeholder="Name" class="input-signup">
                    <button class="logout" type="submit">delete</button>
                </form>
            </div>
        </div>
    </body>
    <script src="../scripts/index.js"></script> 
    <script src="../scripts/modals/profile/user/edit.js"></script> 
    <script src="../scripts/modals/profile/post/edit.js"></script> 
    <script src="https://kit.fontawesome.com/c4442c2032.js" crossorigin="anonymous"></script>
</html>