<?php

/*database credentials
$host = "localhost";
$user = "dosgood1";
$pass = "dosgood1";
$dbname = "dosgood1";
*/

//Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

//Check connection
if($conn->connect_error) {
    echo "Could not connect to server\n";
    die("Connection failed: " . $conn->connect_error);
}

//Create table if not done so
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    passwrd VARCHAR(255) NOT NULL
    )";

//Users data, replace tests with post variables once html page created
$firstname = "test2";//$_POST["firstname"];
$lastname = "test2";//$_POST["lastname"];
$email = "test2";//$_POST["eamil"];
$username = "test2";//$_POST["username"];
$passwd = "test2";//$_POST["password"];

// Inserting to the table
$sql = "INSERT INTO users (firstname, lastname, email, username, passwrd)
VALUES ('$firstname', '$lastname', '$email', '$username', '$passwd')";

//Confirmation message
if ($conn->query($sql) === TRUE) {
    echo "Data inserted into table successfully";
}
else {
    echo "Error creating table: " . $conn->error;
}
$conn->close();
?>