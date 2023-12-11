<?php
//Create connection
$conn = new mysqli($host, $user, $pass, $dbname);
    
//Check connection
if($conn->connect_error) {
     echo "Could not connect to server\n";
     die("Connection failed: " . $conn->connect_error);
}

$id = $_SESSION["user_id"];
$sql = "SELECT property.id, property.detail, property.sqft, property.baths, property.bedrms, property.yr, property.yard, property.parking, property.price
FROM property WHERE owner = '$id'";
$data = array(
    'name' => 'John',
    'age' => 30,
    'city' => 'New York'
);

$json = json_encode($data);
echo "<script>var data = $json;</script>";
?>