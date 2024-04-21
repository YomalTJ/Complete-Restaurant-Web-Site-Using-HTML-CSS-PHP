<?php
    include '../includes/dbh.php';
?>

<?php
    if(isset($_POST['submit'])){
        $day = $_POST['days'];
        $hour = $_POST['hours'];
        $full_name = $_POST['full_name'];
        $phone_number = $_POST['phone_number'];
        $persons = $_POST['persons'];
        
        // SQL query to insert data into the reservation table
        $sql = "INSERT INTO reservation (resDay, resHour, fullName, phoneNumber, persons) VALUES ('$day', '$hour', '$full_name', '$phone_number', $persons)";
        
        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Reservation Added Successfully");</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        // Close the database connection
        $conn->close();
    }
    
?>