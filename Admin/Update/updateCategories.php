<?php
    include '../others/menu.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css//AdminHome.css">
</head>
<body>
    <div class="main-content">
        <div class="wrapper">
            <h1>Update Category</h1>

            <br><br>

            <?php
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM meal_category WHERE categoryID = $id";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);

                    if($count == 1){
                        $row = mysqli_fetch_assoc($res);
                        $tittle = $row['categoryTittle'];
                        $currentImage = $row['ctgryImageName'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                    }
                    else{
                        $_SESSION['no-category-found'] = "<div class = 'error'>Category not found.</div>";
                        header("location: ../manageCategory.php");
                    }
                }
                else{
                    header("location: ../manageCategory.php");
                }
            ?>

            <form action="" method="post" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Tittle: </td>
                        <td>
                            <input type="text" name="tittle" value="<?php echo $tittle ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Current Image: </td>
                        <td>
                            <?php
                                if($currentImage != ''){
                                    ?>
                                        <img src="images/category/ <?php echo $currentImage; ?>" width="150px" alt="">
                                    <?php
                                }
                                else{
                                    echo "<div class = 'error'>Image not Added.</div>";
                                }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td>New Image: </td> 
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>

                    <tr>
                        <td>Featured: </td>
                        <td>
                            <input <?php if($featured == "Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes
                            <input <?php if($featured == "No"){echo "checked";} ?> type="radio" name="featured" value="No"> No
                        </td>
                    </tr>

                    <tr>
                        <td>Active: </td>
                        <td>
                            <input <?php if($active == "Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes
                            <input <?php if($active == "No"){echo "checked";} ?> type="radio" name="active" value="No"> No
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="hidden" name="currentImage" value="<?php echo $currentImage; ?>">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                        </td>
                    </tr>

                    
                </table>
            </form>

            <?php
                if(isset($_POST['submit'])){
                    $id = $_POST['id'];
                    $tittle = $_POST['tittle'];
                    $currentImage = $_POST['currentImage'];
                    $featured = $_POST['featured'];
                    $active = $_POST['active'];

                    if(isset($_FILES['image']['name'])){
                        $imageName = $_FILES['image']['name'];
                        if($imageName != ''){
                            $ext_parts = explode('.', $imageName);
                            $ext = end($ext_parts);
                            $image_name = "Food_Category_" . rand(000, 999) . '.' . $ext;
                            $source_path = $_FILES['image']['tmp_name'];
                            $destination_path = "../images/category/" . $image_name;
                            $upload = move_uploaded_file($source_path, $destination_path);
                            if($upload == false){
                                $_SESSION['upload'] = "<div class = 'error>Failed to upload Image. </div>";
                            }

                            if($currentImage != ''){
                                $removePath = "../images/category/". $currentImage;
                                $remove = unlink($removePath);

                                if($remove == false){
                                    $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current Image.</div>";
                                    die();
                                }
                            }

                            
                        }
                        else{
                            $imageName = $currentImage;
                        }
                    }
                    else{
                        $imageName = $currentImage;
                    }

                    $sql2 = "UPDATE meal_category SET categoryTittle = '$tittle', ctgryImageName = '$imageName', featured = '$featured', active = '$active' WHERE categoryID = $id";
                    $res2 = mysqli_query($conn, $sql2);

                    if($res2 == true){
                        $_SESSION['update'] = "<div class='sucess'>Category Updated Successfully.</div>";
                    }
                    else{
                        $_SESSION['update'] = "<div class='error'>Failed to Update Category.</div>";
                    }
                }

            ?>
        </div>
    </div>
</body>
</html>

<?php
    include '../others/footer.php';
?>