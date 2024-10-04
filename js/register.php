<?php
// Include the database configuration file
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form inputs
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize input to prevent SQL Injection
    $username = mysqli_real_escape_string($conn, $username);

    // Check if the username already exists
    $check_query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($result) > 0) {
        // Username already exists
        echo "Username already taken. Please choose another.";
    } else {
        // Validate password (optional: check length, complexity, etc.)
        if (strlen($password) < 6) {
            echo "Password must be at least 6 characters long.";
        } else {
            // Hash the password for security
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert the new user into the database
            $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

            if (mysqli_query($conn, $query)) {
                echo "Registration successful! You can now log in.";
                // Optionally, you can redirect to the login page
                // header("Location: login.html");
                // exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }
}
?>
