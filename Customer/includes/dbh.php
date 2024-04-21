<?php

    $hostName = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "outer_clove";
    
    $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
    
    if (!$conn) {
        die("Something went wrong;");
    }

?>