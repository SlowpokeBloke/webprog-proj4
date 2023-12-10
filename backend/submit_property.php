<?php
// $host = "localhost";
// $user = "dosgood1";
// $pass = "dosgood1";
// $dbname = "dosgood1";
 
// If upload button is clicked ...
if (isset($_POST['submit'])) {
 
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../images/" . $filename;
 
    $db = mysqli_connect($host, $user, $pass, $dbname);
 
    // Get all the submitted data from the form
    $sql = "INSERT INTO img (img_name, img_type) VALUES ('$filename', '?')";
 
    // Execute query
    mysqli_query($db, $sql);
 
    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }
}
?>
