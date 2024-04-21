<?php
    include '../config.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE FROM reservation WHERE resID = $id";

        $result = mysqli_query($conn, $sql);

        if($result){
            $_SESSION['delete'] = "<div class='success'>Reservations deleted successfully.</div>";
            header('location: ../manageReservations.php');
        }
        else{
            $_SESSION['delete'] = "<div class='error'>Failed to delete Reservations. Try again.</div>";
            header('location: ../manageReservations.php');
        }
    }
    else{
        header('location: ../manageReservations.php');
    }
?>
