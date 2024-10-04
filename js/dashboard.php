<?php
$servername = "localhost";  // Or your database host
$username = "root";         // Database username
$password = "";             // Database password
$dbname = "my_database";    // Name of your database

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
