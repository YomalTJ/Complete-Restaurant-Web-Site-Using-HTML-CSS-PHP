<?php
    include './others/menu.php';
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Reservations</h1>
        <br /> <br />


        <br /> <br /> <br />

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Day</th>
                <th>Hour</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Persons</th>
                <th>Date</th>
            </tr>

            <?php
                $sql = "SELECT * FROM reservation";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                $sn = 1;

                if($count > 0){
                    while($row = mysqli_fetch_assoc($res)){
                        $id = $row['resID'];
                        $resDay = $row['resDay'];
                        $resHour = $row['resHour'];
                        $name = $row['fullName'];
                        $contact = $row['persons'];
                        $resDate = $row['reservation_date'];

                        ?>
                             <tr>
                                <td><?php echo $sn++ ; ?></td>
                                <td><?php echo $resDay; ?></td>
                                <td><?php echo $resHour; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $contact; ?></td>
                                <td><?php echo $resDate; ?></td>
                                <td>
                                    <a href="./Delete/deleteReservations.php?id=<?php echo $id; ?>" class="btn-danger">Delete Reservations</a>
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