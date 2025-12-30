<?php
// Database connection parameters
$servername = "localhost"; // Change this to your database server
$username = "root"; // Change this to your database username
$password = "13@2013july1504"; // Change this to your database password
$database = "payment_gateway"; // Change this to your database name

// Establish database connection
$conn = mysqli_connect('localhost', 'root', '13@2013july1504', 'payment_gateway');

// Check database connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $amount = $_POST['amount'];
    $currency = $_POST['currency'];
    $paymentMethod = $_POST['paymentMethod'];
    
    // Insert payment details into database
    $sql = "INSERT INTO payments (username, amount, currency, payment_method) VALUES ('$username', '$amount', '$currency', '$paymentMethod')";
    if (mysqli_query($conn, $sql)) {
        // Success message
        echo "<div style='text-align: center; background-color: #e97451; color: white; padding: 20px; border-radius: 10px;'>";
        echo "<p>Payment details successfully recorded in the database.</p>";
        echo "<a href='home.html' style='background-color: #e97451; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 20px;'>Go to Home</a>";
        echo "</div>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    // If the form is not submitted, display an error message
    echo "<h2>Error: Form not submitted</h2>";
}

// Close the database connection
mysqli_close($conn);
