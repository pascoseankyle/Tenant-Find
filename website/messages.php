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
            <h3 class="card-left-messages"><i class="fas fa-envelope"></i> Messages</h3>
            <div class="card-left" onclick="profile()">Profile</div>
        </div>
        <!-- middle -->
        <div class="middle">
            <?php
                include_once "../config/database.php";
                $id = $_COOKIE['id'];
                $sql = "SELECT message_tb.*, user_tb.name, user_tb.id FROM `message_tb` LEFT JOIN `user_tb` ON
                message_tb.sender = user_tb.id WHERE message_tb.receiver = '$id' ORDER BY message_tb.id DESC ";
                $result = mysqli_query($conn, $sql); 
                if (mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $array = array();
                    array_push($array, $row);
                    $data = json_encode($array);
                    echo"
                        <div class='card-items-sent'>
                            <h3><i class='fas fa-user-friends'></i> From: ".$row['name']."<h3>
                            <hr>
                            <h4>Subject: ".$row['subject']."</h4>
                            <p>Message: ".$row['message']."</p>
                            <div class='button-edit'> <button onclick='reply(".$data.",".$id.")'><i class='fas fa-share-square'></i> reply</button></div>
                        </div>";
                    }
                }
            ?>
        </div>
        <div id="messageModal" class="modal">
            <div class="msg-content">
                <span id="spanMessage" class="close">&times;</span>
                <h1><i class="fas fa-envelope"></i> Send Message </h1>
                <form action="../actions/message/add.php" method="POST">
                    <input name="subject" type="text" placeholder="Subject" class="input-signup" style="width:80%">
                    <textarea name="message" type="text" placeholder="message" class="input-signup" style="width:80%"></textarea>
                    <input id="sender" name="sender" type="hidden" class="input-signup" style="width:80%">
                    <input id="receiver" name="receiver" type="hidden" class="input-signup" style="width:80%">
                    <br>
                    <div class="button-edit">
                        <button type="submit"><i class="fas fa-share"></i> send</button>
                    <div>
                </form>
            </div>
        </div>
    </body>
    <script src="../scripts/index.js"></script> 
    <script src="../scripts/modals/message/index.js"></script>
    <script src="https://kit.fontawesome.com/c4442c2032.js" crossorigin="anonymous"></script>
</html>