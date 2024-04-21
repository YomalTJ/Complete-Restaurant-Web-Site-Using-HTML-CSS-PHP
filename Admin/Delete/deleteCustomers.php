<?php
    include '../config.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE FROM customers WHERE customerId = $id";

        $result = mysqli_query($conn, $sql);

        if($result){
            $_SESSION['delete'] = "<div class='success'>Customer deleted successfully.</div>";
            header('location: ../manageCustomers.php');
        }
        else{
            $_SESSION['delete'] = "<div class='error'>Failed to delete customer. Try again.</div>";
            header('location: ../manageCustomers.php');
        }
    }
    else{
        header('location: ../manageCustomers.php');
    }
?>
