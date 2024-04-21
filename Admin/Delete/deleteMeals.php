<?php

    include '../config.php';

    if(isset($_GET['id']) && isset($_GET['image_name'])){
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != ''){
            $path = "../images/meals/". $image_name;
            $remove = unlink($path);

            if($remove == false){
                $_SESSION['upload'] =  "<div class='error'>Failed to remove Image file.</div>";
                die();
            }
        }
        $sql = "DELETE FROM meals WHERE meal_ID = $id";
        $res = mysqli_query($conn, $sql);

        if($res == true){
            $_SESSION['delete'] = "<div class='success'>Meal deleted Succesfully.</div>";
        }
        else{
            $_SESSION['delete'] = "<div class='success'>Failed to delete Meal.</div>";
        }
    }
    else{
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
    }
?>