<?php

    $serverName = "localhost";
    $uName = "root";
    $password = "";
    $dbName = "outer_clove";

    $conn =  mysqli_connect($serverName, $uName, $password, $dbName);

    if(!$conn){
        echo "Connection failed!";
    }
?>