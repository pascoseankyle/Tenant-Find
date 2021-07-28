<?php
    if (isset($_COOKIE['id'])){
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
            <div onclick="post()" class="card-left"><i class="fas fa-plus-circle"></i> Post</div>
            <div onclick="profile()" class="card-left"><i class="fas fa-users-cog"></i> Sean Kyle Pasco</div>
            <div onclick="messages()" class="card-left"><i class="fas fa-money-check-alt"></i> Interactions</div>
        </div>
        <!-- middle -->
        <div class="middle">
            <div class="card-items">
                <h3>Sean Kyle Pasco</h3>
                <h2>Title Haws Title</h2>
                <p>My Champaca Family
                Stay Safe and Healthy
                Always Pray for our Country
                God Bless Us! 😘❤️😘
                Sweet Dreams! ❤️😘❤️
                </p>
                <img class="image" src="https://static.dezeen.com/uploads/2020/02/house-in-the-landscape-niko-arcjitect-architecture-residential-russia-houses-khurtin_dezeen_2364_hero-1704x959.jpg">
                <br>
                <br>
                <br>
                <div class="button-item"> 
                    <button><i class="fas fa-users-cog"></i> rent </button>  
                    <button><i class="fas fa-eye"></i> view </button>  
                    <button><i class="fas fa-arrow-circle-up"></i> follow </button> 
                </div>
            </div>
        </div>
        <!-- right -->
        <div class="right">
            <div class="card-right">
                <img class="card-right-item" src="https://media.tenor.com/images/753d41416e880fe4451a1c3a7483bf71/tenor.gif">
            </div>
            <div class="card-following">
                <h2><i class="fas fa-users"></i> Following</h2>
                <div class="card-following-items"><b>Sean Kyle Pasco<b></div>
                <a href="https://www.facebook.com/">add following..</a>
            </div>
        </div>
    </body>
    <script src="../scripts/index.js"></script> 
    <script src="https://kit.fontawesome.com/c4442c2032.js" crossorigin="anonymous"></script>
<?php
    }
    else {
        header("Location: http://localhost:8080/tenant-find/website/login.php");
    }
?>
</html>