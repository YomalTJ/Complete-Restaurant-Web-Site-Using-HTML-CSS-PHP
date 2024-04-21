<?php
    include './others/menu.php';
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <br /> <br />

        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION ['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['remove'])){
                echo $_SESSION ['remove'];
                unset($_SESSION['remove']);
            }

            if(isset($_SESSION['delete'])){
                echo $_SESSION ['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['no-category-found'])){
                echo $_SESSION ['no-category-found'];
                unset($_SESSION['no-category-found']);
            }

            if(isset($_SESSION['update'])){
                echo $_SESSION ['update'];
                unset($_SESSION['update']);
            }

            if(isset($_SESSION['upload'])){
                echo $_SESSION ['upload'];
                unset($_SESSION['upload']);
            }

            if(isset($_SESSION['failed-remove'])){
                echo $_SESSION ['failed-remove'];
                unset($_SESSION['failed-remove']);
            }
        ?>

        <a href="./addCategories.php" class="btn-primary">Add Categories</a>

        <br /> <br /> <br />

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Tittle</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Action</th>
            </tr>

            <?php
                $sql = "SELECT * FROM meal_category";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                $sn = 1;

                if($count > 0){
                    while($row = mysqli_fetch_assoc($res)){
                        $id = $row['categoryID'];
                        $tittle = $row['categoryTittle'];
                        $image_name = $row['ctgryImageName'];
                        $featured = $row['featured'];
                        $active = $row['active'];

                        ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $tittle; ?></td>
                                
                                <td>
                                    <?php 
                                        if($image_name != ''){
                                            ?>
                                                <img src="images/category/<?php echo $image_name; ?>" width="100px" alt="">

                                            <?php
                                        }
                                        else{
                                            echo "<div class = 'error'>Image not Added.</div>";
                                        }
                                    ?>
                                </td>

                                <td><?php echo $featured ?></td>
                                <td><?php echo $active ?></td>
                                <td>

                                    <a href="./Delete/deleteCategories.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Category</a>

                                </td>
                            </tr>
                        <?php
                    }
                }
                else{
                    ?>
                        <tr>
                            <td colspan="6"><div class="error">No Category Added.</div></td>
                        </tr>
                    <?php
                }
            ?>


        </table>

    </div>
</div>

<?php
    include './others/footer.php';
?>