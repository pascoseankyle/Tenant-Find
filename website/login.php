<?php
     if (isset($_COOKIE['id'])){
        unset($_COOKIE['id']);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../styles/index.css">
    </head>
    <body>
        <div class="center-v-h">
            <div class="card-login">
                <div class="container-main">
                    <form action="auth.php" method="POST">
                        <input name="em"type="text" placeholder="username" class="input-login">
                        <input name="pw" type="password" placeholder="password" class="input-login">
                        <hr>
                        <button class="button-login" type="submit">submit</button>
                        <br>
                        <button onclick="signup()" class="button-signup" type="button">sign up</button>
                    </form> 
                </div>
            </div>
        </div>
        <div id="myModal" class="modal">
        <div class="modal-content">
            <form action="../actions/user/add.php" method="POST">
                <span class="close">&times;</span>
                <input name="name" type="text" placeholder="Name" class="input-signup">
                <input name="mobile" type="number" placeholder="Mobile" class="input-signup">
                <input name="city" type="text" placeholder="City" class="input-signup">
                <input name="email" type="text" placeholder="Email" class="input-signup">
                <input name="password" type="password" placeholder="Password" class="input-signup">
                <select name="type" class="input-signup">
                    <option value="0">Landlord</option>
                    <option value="1">Tenant</option>
                </select>
                <br>
                <button class="button-signup" type="submit">submit</button>
            </form>
        </div>
    </body>
    <script src="../scripts/index.js"></script>
</html>