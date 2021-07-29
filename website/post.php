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
        <div class="div-post">
            <h1>Create Post</h1>
            <form action="../actions/post/add.php" method="POST" enctype="multipart/form-data">
                <input name="title" type="text" placeholder="Title" class="input-signup">
                <textarea name="content" type="text" placeholder="Content" class="input-signup"></textarea>
                <input name="photo" type="file" class="input-signup">
                <hr>
                <button type="submit">post</button>
            </form>
        </div>    
    </body>
    <script src="../scripts/index.js"></script> 
    <script src="https://kit.fontawesome.com/c4442c2032.js" crossorigin="anonymous"></script>
</html>