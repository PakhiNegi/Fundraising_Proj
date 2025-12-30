<?php
// Database connection parameters
$servername = "localhost"; // Change this to your database server
$username = "root"; // Change this to your database username
$password = "root1504sudh@"; // Change this to your database password
$database = "user_registration"; // Change this to your database name

// Establish database connection
$conn = mysqli_connect('localhost', 'root', 'root1504sudh@', 'user_registration');

// Check database connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Generate a random salt value
$salt = generateSalt(); // Assuming you have a function to generate a salt value

// Hash the password using the salt
$passwordHash = hashPassword($password, $salt); // Assuming you have a function to hash the password with the salt

// Check if the email already exists in the database
$sql = "SELECT * FROM reg WHERE email='$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo "Email already exists. Please use a different email.";
} else {
    // Insert user data into the database along with the salt
    $sql = "INSERT INTO reg (username, email, password, salt) VALUES ('$username', '$email', '$passwordHash', '$salt')";
    if (mysqli_query($conn, $sql)) {
        // Registration successful message
        echo "<div style='text-align: center; color: #e97451;'>Registration successful!</div>";
        // Link to home.html
        echo "<div style='text-align: center; margin-top: 20px;'><a href='home.html' style='color: #e97451;'>Home</a></div>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);

// Function to generate a random salt value
function generateSalt() {
    return bin2hex(random_bytes(16)); // Generate a 16-byte random salt value
}

// Function to hash the password with the salt
function hashPassword($password, $salt) {
    return hash('sha256', $password . $salt); // Hash the password with SHA-256 algorithm and the salt
}
