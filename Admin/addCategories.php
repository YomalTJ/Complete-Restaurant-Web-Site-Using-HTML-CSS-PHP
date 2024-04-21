<?php
    include './others/menu.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="stylesheet" href="../css/AdminHome.css">
</head>
<body>
    <div class="main-content">
        <div class="wrapper">
            <h1>Add Category</h1>

            <br><br>

            <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['upload'])){
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
            ?>
            

            <form action="" method="post" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Title: </td>
                        <td>
                            <input type="text" name="title" placeholder="Category Title" required>
                        </td>
                    </tr>

                    <tr>
                        <td>Select Image: </td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>

                    <tr>
                        <td>Featured: </td>
                        <td>
                            <input type="radio" name="featured" value="Yes"> Yes
                            <input type="radio" name="featured" value="No" checked> No
                        </td>
                    </tr>

                    <tr>
                        <td>Active: </td>
                        <td>
                            <input type="radio" name="active" value="Yes"> Yes
                            <input type="radio" name="active" value="No" checked> No
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>

            <?php
                if(isset($_POST['submit'])){
                    $title = $_POST['title'];
                    $featured = isset($_POST['featured']) ? $_POST['featured'] : 'No';
                    $active = isset($_POST['active']) ? $_POST['active'] : 'No';

                    /*print_r($_FILES['image']);
                    die();*/

                    if(isset($_FILES['image']['name'])){
                        $image_name = $_FILES['image']['name'];
                        
                        if($image_name != ''){
                            $ext_parts = explode('.', $image_name);
                            $ext = end($ext_parts);
                            $image_name = "Food_Category_" . rand(000, 999) . '.' . $ext;
                            $source_path = $_FILES['image']['tmp_name'];
                            $destination_path = "../images/category/". $image_name;
                            $upload = move_uploaded_file($source_path, $destination_path);

                            if($upload == false){
                                $_SESSION['upload'] = "<div class = 'error>Failed to upload Image. </div>";
                            }
                        }
                    }
                    else{
                        $image_name = "";
                    }

                    $sql = "INSERT INTO meal_category (categoryTittle, ctgryImageName, featured, active) VALUES ('$title', '$image_name', '$featured', '$active')";

                    $result = mysqli_query($conn, $sql);

                    if($result){
                        $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
                    }
                    else{
                        $_SESSION['add'] = "<div class='error'>Failed to Add Category.</div>";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>

<?php
    include './others/footer.php';
?>
