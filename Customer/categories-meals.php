<?php
    include './menu.php';
?>

<?php
    include './includes/dbh.php';
?>

<?php

    if(isset($_GET['category_id'])){
        $category_id = $_GET['category_id'];
        $sql = "SELECT categoryTittle FROM meal_category WHERE categoryID = $category_id";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        $category_title = $row['categoryTittle'];
    }
    else{
        /*header('Location: CustomerPage.php');
        exit();*/
    }
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
        <?php if (isset($category_title)): ?>
            <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>
        <?php else: ?>
            <h2>Category not specified</h2>
            <!-- You may want to redirect the user or handle this case differently -->
        <?php endif; ?>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                $sql2 = "SELECT * FROM meals WHERE categoryId = $category_id";
                $res2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($res2);
                
                if($count2 > 0){
                    while($row2 = mysqli_fetch_assoc($res2)){
                        $id = $row2['meal_ID'];
                        $title = $row2['mealTittle'];
                        $price = $row2['mealPrice'];
                        $description = $row2['mealDescription'];
                        $image_name = $row2['meal_ImageName'];
                        
                        ?>
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php
                                        if($image_name == ""){
                                            echo "<div class='error'>Image not Available.</div>";
                                        }
                                        else{
                                             ?> 
                                                <img src="./images/meals/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
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

    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php
    include './footer.php';
?>