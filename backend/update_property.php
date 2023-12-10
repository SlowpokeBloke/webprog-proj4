<?php
    $host = "localhost";
    $user = "mcoca1";
    $pass = "mcoca1";
    $dbname = "mcoca1";
    
    //Create connection
    $conn = new mysqli($host, $user, $pass, $dbname);
    
    //Check connection
    if($conn->connect_error) {
        echo "Could not connect to server\n";
        die("Connection failed: " . $conn->connect_error);
    } 
    $stmt = $conn->prepare("INSERT INTO property (detail, sqft, acreage, rooms, baths, bedrms, yr, yard, parking, price)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("si", $detail, $sqft, $acreage, $rooms, $baths, $bedrooms, $year, $yard, $parking, $price);
?>