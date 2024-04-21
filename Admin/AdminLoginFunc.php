<?php

    session_start();

    include "adminDBHconn.php";

    if(isset($_POST["adminUid"]) && isset($_POST["adminPwd"])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
        
        $adminUsername = validate($_POST['adminUid']);
        $adminPassword = validate($_POST['adminPwd']);

        if(empty($adminUsername)){
            header("Location: AdminLogin.php?error=User name is required");
            exit();
        }
        else if(empty($adminPassword)){
            header("Location: AdminLogin.php?error=Password is required");
            exit();
        }
        else{
            $sql = "SELECT * FROM admin WHERE adminUN = '$adminUsername' AND adminPwd = '$adminPassword'";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_assoc($result);

                if($row['adminUN'] === $adminUsername && $row['adminPwd'] === $adminPassword){
                    $_SESSION['adminUN'] = $row['adminUN'];
                    $_SESSION['adminName'] = $row['adminName'];
                    $_SESSION['adminId'] = $row['adminId'];

                    header("Location: AdminHome.php");
                    exit();
                }
                else{
                    echo '<script>alert("Invalid username or password");</script>';
                    header("Location: AdminLogin.php");
                    exit();
                }
            }
            else{
                header("Location: AdminLogin.php");
                echo '<script>alert("Invalid username or password");</script>';
                exit();
            }
        }
    }
    else{
        header("Location: AdminLogin.php?");
        echo '<script>alert("Invalid username or password");</script>';
        exit();
    }
?>