
    <?php
        require_once './includes/signupFunc.php';
    ?>

        <link rel="stylesheet" href="./css/customerSignup.css">
    <form action="signup.php" method="post">
        <div>
                <div class="rtHome">
                    <ul>
                        <li>
                            <a href="./customerIndex.php">Home</a>
                        </li>
                    </ul>
                </div>
        <h1>Register</h1>
            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="text" id="fname" name="name" placeholder="Name">
            </div>

            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="text" id="fname" name="email" placeholder="Email">
            </div>

            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="text" id="lname" name="pwd" placeholder="Password">
            </div>

            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="text" id="lname" name="pwdrepeat" placeholder="Repeat Password">
            </div>

            <button class="btnReg" name="submit" type="submit">Register</button>

            <div class="login">
                <p>Already have an account?<a href="login.php"> Log in.</a></p>
            </div>
            
        </div>
    </form>
    
  
     