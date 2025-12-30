<?php
session_start();

// Database connection parameters
$servername = "localhost"; // Change this to your database server
$username_db = "root"; // Change this to your database username
$password_db = "root1504sudh@"; // Change this to your database password
$database = "user_registration"; // Change this to your database name

// Establish database connection
$conn = mysqli_connect('localhost', 'root', 'root1504sudh@', 'user_registration');

// Check database connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];

// Retrieve user data from the database based on the provided username
$sql = "SELECT * FROM reg WHERE username='$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // User found, fetch the row
    $row = mysqli_fetch_assoc($result);
    
    // Verify the password
    $storedPassword = $row['password'];
    $salt = $row['salt'];
    
    // Hash the entered password with the retrieved salt
    $hashedPassword = hashPassword($password, $salt);
    
    // Compare the hashed passwords
    if ($hashedPassword === $storedPassword) {
        // Login successful, display success message and home link
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        echo "<div style='text-align: center; background-color: #f2f2f2; border: 2px solid #e97451; padding: 20px; margin: 20px auto; color: #e97451;'>Login successful!</div>";
        echo "<div style='text-align: center; margin-top: 20px;'><a href='home.html' style='color: #e97451;'>Home</a></div>";
        // Exit to prevent further execution of the script
        exit();
    } else {
        // Invalid username or password
        echo "<div style='text-align: center; background-color: #e97451; border: 2px solid #f2f2f2; padding: 20px; margin: 20px auto; color: #fff;'>Invalid username or password.</div>";
    }
} else {
    // Invalid username or password
    echo "<div style='text-align: center; background-color: #e97451; border: 2px solid #f2f2f2; padding: 20px; margin: 20px auto; color: #fff;'>Invalid username or password.</div>";
}

// Close the database connection
mysqli_close($conn);

// Function to hash the password with the salt
function hashPassword($password, $salt) {
    return hash('sha256', $password . $salt); // Hash the password with SHA-256 algorithm and the salt
}
