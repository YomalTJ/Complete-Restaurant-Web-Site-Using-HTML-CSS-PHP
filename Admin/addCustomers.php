<?php
    include './others/menu.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/AdminHome.css">
</head>
<body>
    <div class="main-content">
    <div class="wrapper">
        <h1>Add Customer</h1>

        <br><br>

        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter Name"></td>
                </tr>

                <tr>
                    <td>Email: </td>
                    <td><input type="text" name="email" placeholder="Enter Email"></td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Enter Password"></td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Customer" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>

<?php
    include './others/footer.php';
?>

<?php
    if(isset($_POST["submit"])){
        $fullName = $_POST['full_name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $sql = "INSERT INTO customers SET customerFname = '$fullName', customerEmail = '$email', customerPassword = '$password'";
        
        
        $result = mysqli_query($conn, $sql) or die(mysqli_error());

        if($result == TRUE){
            //echo "Data Inserted";
            $_SESSION['add'] = "Customer added Successfully";
        }
        else{
            //echo "Fail to insert data";
            $_SESSION['add'] = "Failed to add Customer";
        }
    }
?>