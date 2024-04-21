<?php
    include '../others/menu.php';
?>

<?php
    include '../config.php';
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
    <div class="main-content">
        <div class="wrapper">
            <h1>Update Orders</h1>
            <br><br>

            <?php
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM orders WHERE orderId = $id";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);

                    if($count == 1){
                            $row = mysqli_fetch_assoc($res);
                            
                            $food = $row['orderMeal'];
                            $price = $row['orderPrice'];
                            $qty = $row['orderQty'];
                            $status = $row['orderStatus'];
                            $customer_name = $row['costomerName'];
                            $customer_contact = $row['customerContact'];
                            $customer_email = $row['customerEmail'];
                            $customer_address = $row['customerAddress'];
                        
                        }
                    else{
                        //header("Location: ./manageOrders.php");
                    }
                }
                else{
                    //header("Location: ./manageOrders.php");
                }
            ?>

            <form action="" method="post">
                <table class="tbl-30">
                    <tr>
                        <td>Food Name</td>
                        <td><b></b><?php echo $food; ?></b></td>
                    </tr>

                    <tr>
                        <td>Price</td>
                        <td><b>$<?php echo $price; ?></b></td>
                    </tr>

                    <tr>
                        <td>Qty</td>
                        <td>
                            <input type="number" name="qty" value="<?php echo $qty; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Status</td>
                        <td>
                            <select name="status">
                                <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
                                <option <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
                                <option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
                                <option <?php if($status=="Canselled"){echo "selected";} ?> value="Canselled">Canselled</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Customer Name: </td>
                        <td>
                            <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Customer Contact: </td>
                        <td>
                            <input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Customer Email: </td>
                        <td>
                            <input type="text" name="customer_email" value="<?php echo $customer_email; ?>">
                        </td>
                    </tr>
 
                    <tr>
                        <td>Customer Address: </td>
                        <td>
                            <textarea name="customer_address" cols="30" rows="5"><?php echo $customer_address; ?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="price" value="<?php echo $price; ?>">
                            <input type="submit" name="submit" value="Update Order" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>

            <?php
                if(isset($_POST['submit'])){
                    $id = $_POST['id'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];
                    $total = $price * $qty;
                    $status = $_POST['status'];
                    $customer_name = $_POST['customer_name'];
                    $customer_contact = $_POST['customer_contact'];
                    $customer_email = $_POST['customer_email'];
                    $customer_address = $_POST['customer_address'];

                    $sql2 = "UPDATE orders SET 
                                orderQty = $qty,
                                orderTotal = $total,
                                orderStatus = '$status',
                                costomerName = '$customer_name',
                                customerContact = '$customer_contact',
                                customerEmail = '$customer_email',
                                customerAddress = '$customer_address'
                                WHERE orderId = $id";

                    $res2 = mysqli_query($conn, $sql2);

                    if($res2 == true){
                        $_SESSION['update'] = "<div class='success'>Order updates Successfully.</div>";
                    }
                    else{
                        $_SESSION['update'] = "<div class='error'>Failed to Update.</div>";
                    }
                }
            ?>

        </div>
    </div>
</body>
</html> 

<?php
    include '../others/footer.php';
?>