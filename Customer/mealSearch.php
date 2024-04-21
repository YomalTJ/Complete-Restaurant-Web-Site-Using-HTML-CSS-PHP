<?php
    include './process/menu.php';
?>

<?php
    include './includes/dbh.php';
?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php
                $search = $_POST['search'];

            ?>
            
            <h2>Foods on Your Search <a href="#" class="text-white"><?php echo $search; ?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                
                if (isset($_POST['search'])) {
                    $search = $_POST['search'];
                    $sql = "SELECT * FROM meals WHERE mealTittle LIKE '%$search%' OR mealDescription LIKE '%$search%'";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);

                    if ($count > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            $id = $row['meal_ID'];
                            $title = $row['mealTittle'];
                            $price = $row['mealPrice'];
                            $description = $row['mealDescription'];
                            $image_name = $row['meal_ImageName'];

                            ?>
                                <div class="food-menu-box">
                                    <div class="food-menu-img">
                                        <?php
                                            if ($image_name == "") {
                                                echo "<div class='error'>Image not Available</div>";
                                            } else {
                                                ?>
                                                    <img src="./images/meals/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                                <?php
                                            }
                                        ?>
                                        
                                    </div>

                                    <div class="food-menu-desc">
                                        <h4><?php echo $title; ?></h4>
                                        <p class="food-price">$<?php echo $price; ?></p>
                                        <p class="food-detail">
                                            <?php echo $description; ?>
                                        </p>
                                        <br>

                                        <a href="#" class="btn btn-primary">Order Now</a>
                                    </div>
                                </div>
                            <?php
                        }
                    } else {
                        echo "<div class='error'>Meal not found.</div>";
                    }
                } else {
                    echo "<div class='error'>Search key is not set in \$_POST.</div>";
                }
            ?>

            
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php
    include './process/footer.php';
?>