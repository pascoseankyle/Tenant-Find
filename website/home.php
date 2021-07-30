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
                <button onclick="home()" class="home-buttons"><i class="fas fa-home"></i></button>
                <button onclick="profile()" class="home-buttons"><i class="fas fa-users-cog"></i></button>
                <button onclick="messages()" class="home-buttons"><i class="fas fa-envelope"></i></button>
            </div>
            <!-- right -->
            <div class="right-nav"></div>
        </nav>
        <!-- left -->
        <div class="left">
            <form action="../actions/post.php" method="POST">
                <button type="submit" class="card-left"><i class="fas fa-plus-circle"></i> Post</button>
            </form>
            <form action="../actions/profile.php" method="POST">
                <button type="submit" class="card-left"><i class="fas fa-users-cog"></i> <?php
                    include_once "../config/database.php";
                     $id = $_COOKIE['id'];
                     $sql = "SELECT * FROM `user_tb` WHERE `id` = '$id' ";
                     $result = mysqli_query($conn, $sql); 
                     if (mysqli_num_rows($result) > 0){
                         while($row = mysqli_fetch_assoc($result)){
                             echo $row['name'];
                        }
                    }
                ?></button>
            </form>
            <form action="../actions/messages.php" method="POST">
                <button type="submit" class="card-left"><i class="fas fa-money-check-alt"></i> Messages</button>
            </form>
        </div>
        <!-- middle -->
        <div class='middle'>
            <?php
                $sql = "SELECT post_tb.*, user_tb.* FROM `post_tb` INNER JOIN user_tb ON post_tb.user_id = user_tb.id WHERE 1 ORDER BY post_tb.id DESC";
                $result = mysqli_query($conn, $sql); 
                if (mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                    $array = array();
                    array_push($array, $row);
                    $data = json_encode($array);
                    echo "
                    <div class='card-items'>
                        <h4>".$row['name']."</h4>
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
        <!-- right -->
        <div class="right">
            <div class="card-right" onclick="toAd()">
                <img class="card-right-item"  onclick="toAd()" src="https://media.tenor.com/images/753d41416e880fe4451a1c3a7483bf71/tenor.gif">
            </div>
            <div class="card-following">
                <h2><i class="fas fa-users"></i> Following</h2>
                    <?php
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
        </div>
        <!-- modals -->
        <div id="viewModal" class="modal">
            <div class="post-content">
                <span id="span-post"class="close">&times;</span>
                <h1 id="title"></h1>
                <p id="content"></p>
                <img id="image" class="image" src="../actions/post/uploads/">
                <br>
            </div>
        </div>
        <div id="messageModal" class="modal">
            <div class="msg-content">
                <span id="rent-span" class="close">&times;</span>
                <h1><i class="fas fa-envelope"></i> Send Message </h1>
                <form action="../actions/message/add.php" method="POST">
                    <input name="subject" type="text" placeholder="Subject" class="input-signup" style="width:80%">
                    <textarea name="message" type="text" placeholder="message" class="input-signup" style="width:80%"></textarea>
                    <input id="sender" name="sender" type="hidden" class="input-signup" style="width:80%">
                    <input id="receiver" name="receiver" type="hidden" class="input-signup" style="width:80%">
                    <br>
                    <button class="button-signup" type="submit"><i class="fas fa-share"></i> submit</button>
                </form>
            </div>
        </div>
    </body>
    <script src="../scripts/index.js"></script> 
    <script src="../scripts/modals/home/index.js"></script>
    <script src="https://kit.fontawesome.com/c4442c2032.js" crossorigin="anonymous"></script>
</html>