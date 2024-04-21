<?php
    include './includes/dbh.php';
?>

<?php
    include './process/menu.php';
?>

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                $sql2 = "SELECT * FROM meals WHERE active='Yes' AND featured='Yes'";
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

                                <a href="./orders.php" class="btn btn-primary">Order Now</a>
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

    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php
    include './process/footer.php';
?>