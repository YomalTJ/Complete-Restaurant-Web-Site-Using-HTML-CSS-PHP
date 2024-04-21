<?php
    include './others/menu.php';
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Customers</h1>

        <br />
        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <br><br><br>

        <a href="./addCustomers.php" class="btn-primary">Add Customers</a>

        <br /> <br /> <br />

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>

            <?php
                $sql = "SELECT * FROM customers";

                $result = mysqli_query($conn, $sql);

                if($result == TRUE){
                

                    $count = mysqli_num_rows($result);
                    $sn = 1;

                    if($count > 0){
                        while($rows = mysqli_fetch_assoc($result)){

                            //$id = $rows['customerId '];
                            $fullName = $rows['customerFname'];
                            $email = $rows['customerEmail'];

                            ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $fullName; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td>
                                        <a href="./Delete/deleteCustomers.php?id=<?php echo $rows['customerId']; ?>" class="btn-danger">Delete Customer</a>
                                    </td>
                                </tr>
                            <?php
                        }
                    }
                    else{

                    }
                }
            ?>

        </table>
    </div>
</div>

<?php
    include './others/footer.php';
?>