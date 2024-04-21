<?php
    include './others/menu.php';
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Orders</h1>

        <br /> <br />

        <?php
            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
        ?>
        <br><br>

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Food</th>
                <th>Price</th>
                <th>Qty.</th>
                <th>Total</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Customer Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            
            <?php
                $sql = "SELECT * FROM orders";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                $sn = 1;

                if($count > 0){
                    while($row = mysqli_fetch_assoc($res)){
                        $id = $row['orderId'];
                        $food = $row['orderMeal'];
                        $price = $row['orderPrice'];
                        $qty = $row['orderQty'];
                        $total = $row['orderTotal'];
                        $order_date = $row['orderDate'];
                        $status = $row['orderStatus'];
                        $customer_name = $row['costomerName'];
                        $customer_contact = $row['customerContact'];
                        $customer_email = $row['customerEmail'];
                        $customer_address = $row['customerAddress'];

                        ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $food; ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $qty; ?></td>
                                <td><?php echo $total; ?></td>
                                <td><?php echo $order_date; ?></td>
                                <td>
                                    <?php
                                        if($status=="Ordered"){
                                            echo "<label>$status</label>";
                                        }
                                        elseif($status=="Delivery"){
                                            echo "<label style='color: orange'>$status</label>";
                                        }
                                        elseif($status=="Delivered "){
                                            echo "<label style='color: green'>$status</label>";
                                        }
                                        elseif($status=="Cancelled "){
                                            echo "<label style='color: red'>$status</label>";
                                        }
                                    ?>
                                </td>
                                <td><?php echo $customer_name; ?></td>
                                <td><?php echo $customer_contact; ?></td>
                                <td><?php echo $customer_email; ?></td>
                                <td><?php echo $customer_address; ?></td>
                                <td>
                                    <a href="#" class="btn-danger">Delete Order</a>
                                </td>
                            </tr>
                        <?php
                    }
                }
                else{
                    echo "<tr><td colspan='12' class='error'>Orders not Available.</td></tr>";
                }
            ?>

            

        </table>


    </div>
</div>

<?php
    include './others/footer.php';
?>