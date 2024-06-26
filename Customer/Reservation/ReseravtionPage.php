<?php
    include './resMethods.php';
?>

<?php
    include '../includes/dbh.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Reservation Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./res.css">
    </head>
    <body>
        
        <section class = "banner">
            <div class="rtHome">
                <ul>
                    <li>
                        <a href="../CustomerPage.php">Home</a>
                    </li>
                </ul>
            </div>
            <h2>BOOK YOUR TABLE NOW</h2>
            <div class = "card-container">
                <div class = "card-img">
                    <!-- image here -->
                </div>

                <div class = "card-content">
                    <h3>Reservation</h3>
                    <form method="post" action="ReseravtionPage.php">
                        <div class = "form-row">
                            <select name = "days">
                                <option value = "day-select">Select Day</option>
                                <option value = "sunday">Sunday</option>
                                <option value = "monday">Monday</option>
                                <option value = "tuesday">Tuesday</option>
                                <option value = "wednesday">Wednesday</option>
                                <option value = "thursday">Thursday</option>
                                <option value = "friday">Friday</option>
                                <option value = "saturday">Saturday</option>
                            </select>

                            <select name = "hours">
                                <option value = "hour-select">Select Hour</option>
                                <option value = "10">10: 00</option>
                                <option value = "10">12: 00</option>
                                <option value = "10">14: 00</option>
                                <option value = "10">16: 00</option>
                                <option value = "10">18: 00</option>
                                <option value = "10">20: 00</option>
                                <option value = "10">22: 00</option>
                            </select>
                        </div>

                        <div class = "form-row">
                            <input type = "text" name="full_name" placeholder="Full Name">
                            <input type = "text" name="phone_number" placeholder="Phone Number">
                        </div>

                        <div class = "form-row">
                            <input type = "number" name="persons" placeholder="How Many Persons?" min = "1">
                            <input type = "submit" name="submit" value = "BOOK TABLE">
                        </div>
                    </form>
                </div>
            </div>
        </section>
        
    </body>
</html>
