<?php
    include '../config.php';

    if(isset($_GET['id']) AND isset($_GET['image_name'])){
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != ""){
            $path = "../images/category/". $image_name;
            $remove = unlink($path);

            if($remove == false){
                $_SESSION['remove'] = "<div class = 'error'>Failed to remove Category Image.</div>";
                header("location: ../manageCategory.php");
                die();
            }
        }

        $sql = "DELETE FROM meal_category WHERE categoryID = $id";
        $res = mysqli_query($conn, $sql);

        if($res == true){
            $_SESSION['delete'] = "<div class = 'success'>Category Deleted Successfully.</div>";
            header("Location: ../manageCategory.php");
        }
        else{
            $_SESSION['delete'] = "<div class = 'error'>Failed to delete Category.</div>";
            header("Location: ../manageCategory.php");
        }
    }
    else{
        header("Location: ../manageCategory.php");
    }
?>