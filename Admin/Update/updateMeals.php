<?php
    include '../others/menu.php';
?>

<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql2 = "SELECT * FROM meals WHERE meal_ID = $id";
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($res2);
        $title = $row2['mealTittle'];
        $description = $row2['mealDescription'];
        $price = $row2['mealPrice'];
        $current_image = $row2['meal_ImageName']; 
        $current_category = $row2['categoryId']; 
        $featured = $row2['featured']; 
        $active = $row2['active'];
    }
    else{
        header ("../manageMeals.php");
    }
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
    <h1>Update Meals</h1>
    <br><br>

    <form action="" method="post" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
                <td>Title: </td>
                    <td>
                    <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
             </tr>

             <tr>
                <td>Description:</td>
                <td>
                    <textarea name="description"  cols="30" rows="5"><?php echo $description; ?></textarea>
                </td>
             </tr>

             <tr>
                <td>Price: </td>
                <td>
                    <input type="number" name="price" value="<?php echo $price; ?>">
                </td>
             </tr>

             <tr>
                <td>Current Image: </td>
                <td>
                    <?php
                        if($current_image == ""){
                            echo "<div class='error'>Image not Available.</div>";
                        }
                        else{
                            ?>
                                <img src="../images/meals/<?php echo $current_image; ?>" width="150px">
                            <?php 
                        }
                    ?>
                </td>
             </tr>

             <tr>
                <td>Select New Image:</td>
                <td>
                    <input type="file" name="image">
                </td>
             </tr>

             <tr>
                <td>Category: </td>
                <td>
                    <select name="category" >

                    <?php
                        $sql = "SELECT * FROM meal_category WHERE active = 'Yes'";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);

                        if($count > 0){
                            while($row = mysqli_fetch_assoc($res)){
                                $category_tittle = $row['categoryTittle'];
                                $category_id = $row['categoryID'];

                                //echo "<option value='$category_id'>$category_tittle</option>";

                                ?>
                                    <option <?php if($current_category==$category_id){echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_tittle; ?></option>
                                <?php

                                
                            }
                            
                        }
                        else{
                            echo "<option value='0'>Category Not Available.</option>";
                        }
                    ?>
                    
                    </select>
                </td>
             </tr>

             <tr>
                <td>Featured: </td>
                <td>
                    <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes
                    <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No"> No

                </td>
             </tr>

             <tr>
                <td>Active: </td>
                <td>
                    <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes
                    <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No"> No
                </td>
             </tr>

             <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                    <input type="submit" name="submit" value="Update Meal" class="btn-secondary">
                </td>
             </tr>
        </table>
    </form>

    <?php
        if(isset($_POST['submit'])){
            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $current_image = $_POST['current_image'];
            $category = $_POST['category'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];

            if(isset($_FILES['image']['name'])){
                $image_name = $_FILES['image']['name'];

                if($image_name != ""){ 
                    $ext = end(explode('.', $image_name));
                    $image_name = "Meal-Name-". rand(0000, 9999).'.'. $ext;

                    $src_path = $_FILES['image']['tmp_name'];
                    $dest_path = "../images/meals/". $image_name;

                    $upload = move_uploaded_file($src_path, $dest_path);

                    if($upload == false){
                        $_SESSION['upload'] = "<div class='error'>Failed to upload New Image.</div>";
                        die();
                    }

                    if($current_image != ""){
                        $remove_path = "../images/meals/". $current_image;
                        $remove = unlink($remove_path);

                        if($remove == false){
                            $_SESSION['remove-failed'] = "<div class='error'>Faile to remove current Image.</div>";
                            die();
                        }
                    }
                }
                else{
                    $image_name = $current_image;
                }
            }
            else{
                $image_name = $current_image;
            }

            $sql3 = "UPDATE meals SET mealTittle = '$title', mealDescription = '$description', mealPrice = '$price', meal_ImageName = '$image_name', categoryId = '$category', featured = '$featured', active =  '$active' WHERE meal_ID = $id";

            $res3 = mysqli_query($conn, $sql3);

            if($res3 == true){
                $_SESSION['update'] = "<div class='success'>Meal updated successfully.</div>";
            }
            else{
                $_SESSION['update'] = "<div class='error'>Failed to update Meal..</div>";
            }
        }
    ?>
</body>
</html>

<?php
    include '../others/footer.php';
?>