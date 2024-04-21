<?php
    include '../Admin/others/menu.php';
?>

<?php
    include './config.php';
?>

    <div class="main-content">
        <div class="wrapper">

        <h1>ADMIN DASHBOARD</h1>

            <div class="col-4 text-center">
                <?php
                    $sql = "SELECT * FROM meal_category";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res); 
                ?>
                <h1><?php echo $count; ?></h1>
                <br>
                Categories
            </div>

            <div class="col-4 text-center">
                <?php
                    $sql2 = "SELECT * FROM meals";
                    $res2 = mysqli_query($conn, $sql2);
                    $count2 = mysqli_num_rows($res2); 
                ?>
                <h1><?php echo $count2; ?></h1>
                <br>
                Foods
            </div>

            <div class="col-4 text-center">
                <?php
                    $sql3 = "SELECT * FROM orders";
                    $res3 = mysqli_query($conn, $sql3);
                    $count3 = mysqli_num_rows($res3); 
                ?>
                <h1><?php echo $count3; ?></h1>
                <br>
                Total Orders
            </div>

            <div class="col-4 text-center">
                <?php
                    $sql4 = "SELECT SUM(orderTotal) AS Total FROM orders";
                    $res4 = mysqli_query($conn, $sql4);
                    $row4 = mysqli_fetch_assoc($res4);
                    $total_rev = $row4['Total'];
                ?>
                <h1>$<?php echo $total_rev; ?></h1>
                <br>
                Revenue Generated
            </div>

            <div class="clearfix"></div>

        </div>
    </div>

<?php
    include '../Admin/others/footer.php';
?>