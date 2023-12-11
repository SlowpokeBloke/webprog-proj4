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
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sidiibid", $detail, $sqft, $baths, $bedrooms, $year, $yard, $parking, $price);
    // $stmt = $conn->prepare("INSERT INTO property (detail, sqft, acreage, rooms, baths, bedrms, yr, yard, parking, price)
    // VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    // $stmt->bind_param("sididiibid", $detail, $sqft, $acreage, $rooms, $baths, $bedrooms, $year, $yard, $parking, $price);

    $detail = $_POST["facilities"];
    $sqft = $_POST["floor-plan"];
    //$acreage = $_POST[""];
    //$rooms = $_POST[""];
    $baths = $_POST["baths"];
    $bedrooms = $_POST["bedrooms"];
    $year = $_POST["age"];
    $yard = $_POST["garden"];
    $parking = $_POST["parking"];
    $price = $_POST["property-value"];
    $stmt->execute();

    echo "Property data created successfully";

    $stmt->close();
    $conn->close();
    header("Location: ../frontend/seller.html");
    exit();
?>