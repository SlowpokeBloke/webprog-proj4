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

$sql = "CREATE TABLE IF NOT EXISTS user (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    passwrd VARCHAR(255) NOT NULL
    )";
if ($conn->query($sql) === TRUE) {
    echo "Tables created successfully";
}
else {
    echo "Error creating table: " . $conn->error;
}

/** create properties table if not exist
 */
$sql = "CREATE TABLE IF NOT EXISTS property (
    id INT NOT NULL UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    prop_description VARCHAR,
    sqft INT(6),
    acreage DECIMAL,
    rooms INT(6),
    baths DECIMAL,
    bedrms INT(6),
    year INT(6),
    yard BOOLEAN,
    parking INT,
    price DECIMAL,
    )";
if ($conn->query($sql) === TRUE) {
    echo "Tables created successfully";
}
else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS addr (
    id INT NOT NULL,
    prop_id INT NOT NULL,
    street VARCHAR NOT NULL.
    city VARCHAR NOT NULL,
    state VARCHAR NOT NULL,
    zip INT NOT NULL,
    FOREIGN KEY (prop_id) REFERENCES property(id)
    )";
if ($conn->query($sql) === TRUE) {
    echo "Tables created successfully";
}
else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS img (
    id INT NOT NULL,
    prop_id INT NOT NULL,
    img_name VARCHAR NOT NULL,
    img_type VARCHAR NOT NULL,
    FOREIGN KEY (prop_id) REFERENCES property(id)
    )";
if ($conn->query($sql) === TRUE) {
    echo "Tables created successfully";
}
else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS owner (
    user_id INT NOT NULL,
    prop_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (prop_id) REFERENCES property(id)
)";

// Inserting to the table
// $sql = "INSERT INTO property (firstname)
// VALUES ('$prop_address', '$prop_description')";

//Confirmation message
if ($conn->query($sql) === TRUE) {
    echo "Tables created successfully";
}
else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>