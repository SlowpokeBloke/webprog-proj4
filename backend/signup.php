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
$conn->query($sql);

//Users data, replace tests with post variables once html page created
$firstname = $_POST["first-name"];
$lastname = $_POST["last-name"];
$email = $_POST["email"];
$username = $_POST["username"];
$passwd = $_POST["password"];
$hash = password_hash($passwd, PASSWORD_DEFAULT);

// Inserting to the table
$sql = "INSERT INTO users (firstname, lastname, email, username, passwrd)
VALUES ('$firstname', '$lastname', '$email', '$username', '$hash')";

//Confirmation message
if ($conn->query($sql) === TRUE) {
    echo "Data inserted into table successfully";
}
else {
    echo "Error creating table: " . $conn->error;
}
$conn->close();
?>
