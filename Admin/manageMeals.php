<?php
    include './others/menu.php';
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Meals</h1>
        <br /> <br />

        <a href="./addMeals.php" class="btn-primary">Add Meals</a>

        <br /> <br /> <br />

        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            
            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            if(isset($_SESSION['unauthorize'])){
                echo $_SESSION['unauthorize'];
                unset($_SESSION['unauthorize']);
            }

            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
        ?>

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Tittle</th>
                <th>Price</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Action</th>
            </tr>

            <?php
                $sql = "SELECT * FROM meals";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                $sn = 1;

                if($count > 0){
                    while($row = mysqli_fetch_assoc($res)){
                        $id = $row['meal_ID'];
                        $tittle = $row['mealTittle'];
                        $price = $row['mealPrice'];
                        $imageName = $row['meal_ImageName'];
                        $featured = $row['featured'];
                        $active = $row['active'];

                        ?>
                             <tr>
                                <td><?php echo $sn++ ; ?></td>
                                <td><?php echo $tittle; ?></td>
                                <td>$<?php echo $price; ?></td>
                                <td>
                                    <?php
                                        if($imageName == ''){
                                            echo "<div class='error'>Image not added.</div>";
                                        }
                                        else{
                                            ?>
                                                <img src="images/meals/<?php echo $imageName; ?>" width="100px" alt="">
                                            <?php
                                        }
                                    ?>
                                </td>
                                <td><?php echo $featured; ?></td>
                                <td><?php echo $active; ?></td>
                                <td>
                                    <a href="./Delete/deleteMeals.php?id=<?php echo $id; ?>&image_name=<?php echo $imageName; ?>" class="btn-danger">Delete Meal</a>
                                </td>
                            </tr>
                        <?php
                    }
                }
                else{
                    echo "<tr> <td colspan='7' class='error'>Meal not Added yet. </tr>";
                }
            ?>

            

        </table>

    </div>
</div>

<?php
    include './others/footer.php';
?>