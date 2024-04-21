
<?php
    include './includes/dbh.php';
?>

<?php
    include './menu.php';
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="./mealSearch.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

<?php
    if(isset($_SESSION['order'])){
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
                $sql = "SELECT * FROM meal_category WHERE active='Yes' AND featured='Yes'";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count > 0){
                    while($row = mysqli_fetch_assoc($res)){
                        $id = $row['categoryID'];
                        $title = $row['categoryTittle'];
                        $image_name = $row['ctgryImageName'];

                        ?>
                            <a href="./categories-meals.php?category_id=<?php echo$id; ?>">
                            <div class="box-3 float-container">

                            <?php
                                if($image_name == ""){
                                    echo "<div class='error'>Image not Available</div>";
                                }
                                else{
                                    ?>
                                        <img src="images/meals-categories/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>

                            <h3 class="float-text text-white">Pizza</h3>
                            </div>
                            </a>
                        <?php
                    }
                }
            ?>



            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                $sql2 = "SELECT * FROM meals WHERE active='Yes' AND featured='Yes' LIMIT 6";
                $res2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($res2);

                if($count2 > 0){
                    while($row = mysqli_fetch_assoc($res2)){
                        $id = $row['meal_ID'];
                        $title = $row['mealTittle'];
                        $price = $row['mealPrice'];
                        $description = $row['mealDescription'];
                        $image_name = $row['meal_ImageName'];

                        ?>
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php
                                if($image_name == ""){
                                    echo "<div class'error'>Image not available.</div>";
                                }
                                else{
                                    ?>
                                    <img src="images/meals/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
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

                                <a href="./orders.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>
                <?php   
                    }
                }
                else{
                    echo "<div class='error'>Meal not Available.</div>";
                }
                ?>

            
            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="./meals.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php
    include './footer.php';
?>