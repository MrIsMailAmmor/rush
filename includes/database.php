<?php
    $dbHost ="localhost";
    $dbUser= "root";
    $dbPass= "ss";
    $dbName = "login";


    $conn =  mysqli_connect($dbHost, $dbUser, $dbPass, $dbName, 3306);
    if (!$conn) {
        die("failed to connect to your database");
    }
    
    $sql = "SELECT * FROM login";
    $result= mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);

    if ($rowCount>0) {
        while ($row = mysqli_fetch_assoc($result)) {
           
        }
    } else {
        echo "no result found";
    }
    