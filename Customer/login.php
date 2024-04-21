<?php
        require_once './includes/loginFun.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap">
    <link rel="stylesheet" href="./css/customerLogin.css">
</head>
<body>
    <form action="login.php" method="post">
    
    <div class="borderAll">
        <div class="rtHome">
                <ul>
                    <li>
                        <a href="./customerIndex.php">Home</a>
                    </li>
                </ul>
            </div>
        
            <div class="loginDiv">
                    <h1>Login</h1>

                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="text" id="fname" name="uid" placeholder="Email">
                </div>

                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="password" id="lname" name="pwd" placeholder="Password">
                </div>

                <button class="btnLogin" name="submit" type="submit">Login</button>

                <div class="login">
                    <p class="newReg">New Here? <a class="reg" href="signup.php">Register.</a></p>
                </div>
            </div>
        
        </div>
    </form>
</body>
</html>