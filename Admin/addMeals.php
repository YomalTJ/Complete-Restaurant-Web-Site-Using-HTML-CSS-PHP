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
    <div class="wrapper">
        <h1>Add Meals</h1>

        <br><br>

        <?php
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>  

        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Tittle: </td>
                    <td>
                        <input type="text" name="tittle" placeholder="Title of the Meal">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of The Meal"></textarea>
                    </td>

                    <tr>
                        <td>Price: </td>
                        <td>
                            <input type="number" name="price">
                        </td>
                    </tr>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category" >

                            <?php
                                $sql = "SELECT * FROM meal_category WHERE active='Yes'"; 
                                $res = mysqli_query($conn, $sql);
                                $count = mysqli_num_rows($res);

                                if($count > 0){
                                    while($row = mysqli_fetch_assoc($res)){
                                        $id = $row['categoryID'];
                                        $tittle = $row['categoryTittle'];

                                        ?>
                                            <option value="<?php echo $id; ?>"><?php echo $tittle; ?></option>
                                        <?php
                                    }
                                }
                                else{
                                    ?>
                                        <option value="0">No Category Found</option>
                                    <?php
                                }
                            ?>
                
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No 
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No 
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Meal" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
            if(isset($_POST['submit'])){
                 $tittle = $_POST['tittle'];
                 $description = $_POST['description'];
                 $price = $_POST['price'];
                 $category = $_POST['category'];

                 if(isset($_POST['featured'])){
                    $featured = $_POST['featured'];
                 }
                 else{
                    $featured = "No";
                 }

                 if(isset($_POST['active'])){
                    $active = $_POST['active'];
                 }
                 else{
                    $active = "No";
                 }

                 if(isset($_FILES['image']['name'])){
                    $imageName = $_FILES['image']['name'];

                    if($imageName != ''){
                        $fileParts = explode('.', $imageName);
                        $ext = end($fileParts);
                        $imageName = "Meal-Name-". rand(0000, 9999) . ".". $ext;
                        $src = $_FILES['image']['tmp_name'];
                        $dst =  '../images/meals/'. $imageName;
                        $upload = move_uploaded_file($src, $dst);

                        if($upload == false){
                            $_SESSION['upload'] = "<div class='error'>Failed to upload Image.</div>";
                            die();
                        }
                    }
                 }
                 else{
                    $imageName = "";
                 }

                 $stmt = $conn->prepare("INSERT INTO meals SET mealTittle = ?, mealDescription = ?, mealPrice = ?, meal_ImageName = ?, categoryId = ?, featured = ?, active = ?");
                $stmt->bind_param("ssdsiss", $tittle, $description, $price, $imageName, $category, $featured, $active);

                // Execute the statement
                $res2 = $stmt->execute();

                if ($res2) {
                    $_SESSION['add'] = "<div class='success'>Meal added Successfully.</div>";
                } else {
                    $_SESSION['add'] = "<div class='error'>Failed to add Meal.</div>";
                }

                $stmt->close();

            }
            else{
                
            }
        ?>
    </div>
</body>
</html>

<?php
    include './others/footer.php';
?>