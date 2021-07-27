<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../styles/index.css">
    </head>
    <body>
        <div class="center-v-h">
            <div class="card-login">
                <div class="container-main">
                    <input type="text" placeholder="username" class="input-login">
                    <input type="password" placeholder="password" class="input-login">
                    <hr>
                    <button onclick="login()" class="button-login"  type="submit">submit</button>
                    <br>
                    <button onclick="signup()" class="button-signup" type="submit">sign up</button>
                </div>
            </div>
        </div>
        <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <input type="text" placeholder="Name" class="input-signup">
            <input type="text" placeholder="Email" class="input-signup">
            <input type="text" placeholder="Password" class="input-signup">
            <br>
             <button class="button-signup" type="submit">submit</button>

        </div>
    </body>
    <script src="../scripts/index.js"></script>
</html>