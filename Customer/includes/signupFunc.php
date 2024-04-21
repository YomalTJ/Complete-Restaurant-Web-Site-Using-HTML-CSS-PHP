<?php

            if(isset($_POST["submit"])){
                $fullName = $_POST["name"];
                $email = $_POST["email"];
                $password = $_POST["pwd"];
                $passwordRepeat = $_POST["pwdrepeat"];

                $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                $errors = array();

                if(empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)){
                    array_push($errors, "All fields are required");
                }

                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    array_push($errors, "Email is not valid");
                }

                if(strlen($password) < 8){
                    array_push($errors, "Password must be at least 8 characters long");
                }

                if($password != $passwordRepeat){
                    array_push($errors, "Password does not match");
                }

                require_once '../Customer/includes/dbh.php';
                $sql = "SELECT * FROM customers WHERE customerEmail = '$email'";
                $result = mysqli_query($conn, $sql);
                $rowCount = mysqli_num_rows($result);
                if($rowCount > 0){
                    array_push($errors, "Email already exists!");
                }

                if(count($errors) > 0){
                    foreach($errors as $error){
                        echo "<div class = 'alert alert danger'>$error</div>";
                    }
                }
                else{
                    $sql = "INSERT INTO customers (customerFname, customerEmail, customerPassword) VALUES ( ?, ?, ? )";
                    $stmt = mysqli_stmt_init($conn);
                    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                    if($prepareStmt){
                        mysqli_stmt_bind_param($stmt, "sss", $fullName, $email, $passwordHash);
                        mysqli_stmt_execute($stmt);
                        echo '<script>alert("You are Registered Successfully");</script>';
                    }
                    else{
                        die("Something went wrong!");
                    }
                }
            }

        ?>