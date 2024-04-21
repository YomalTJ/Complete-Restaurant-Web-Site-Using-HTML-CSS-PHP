<?php
    include './menu.php';
?>

<?php
    include './includes/dbh.php';
?>
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
                $sql = "SELECT * FROM meal_category WHERE active='Yes'";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count > 0){
                    while($row = mysqli_fetch_assoc($res)){
                        $id = $row['categoryID'];
                        $tittle = $row['categoryTittle'];
                        $image_name = $row['ctgryImageName'];

                        ?>
                            <a href="./categories-meals.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php
                                    if($image_name == ""){
                                        echo "<div class='error'>Category not found.</div>";
                                    }
                                ?>
                            <img src="images/meals-categories/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">

                            <h3 class="float-text text-white"></h3>
                            </div>
                            </a>
                        <?php
                    }
                }
                else{
                    echo "<div class='error'>Category not found.</div>";
                }
            ?>                    

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

<?php
    include './footer.php';
?>