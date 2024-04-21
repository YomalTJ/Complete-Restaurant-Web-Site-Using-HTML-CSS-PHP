<?php

        if(isset($_POST["submit"])){
            $email = $_POST["uid"];
            $password = $_POST["pwd"];
            require_once "../Customer/includes/dbh.php";
            $sql = "SELECT * FROM customers where customerEmail = '$email'";
            $result = mysqli_query($conn, $sql);
            $customer = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if($customer){
                if(password_verify($password, $customer["customerPassword"])){
                    session_start();
                    $_SESSION["customer"] = "yes";
                    header("Location: CustomerPage.php");
                    die();
                }
                else{
                    echo '<script>alert("Invalid username or password");</script>';
                    echo '<script>window.location.href="./login.php";</script>';
                    exit();
                    //echo "<div class = 'alert alert - danger'>Password does not match</div>";
                }
            }
            else{
                echo '<script>alert("Invalid username or password");</script>';
            }
        }
    
?>