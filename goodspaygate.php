<?php
session_start();

// Include database connection code
$servername = "localhost";
$username = "root";
$password = "root1504sudh@";
$database = "goodsdon";

// Create connection
$conn = new mysqli('localhost', 'root', 'root1504sudh@', 'goodsdon');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form submitted, process donation and payment
    
    // Get form data
    $username = $_SESSION['username']; // Get username from session
    $total_amount = $_POST['total_amount'];
    $product = ""; // Define product variable
    $quantity = 0; // Define quantity variable
    $payment_method = ""; // Define payment_method variable

    // Insert donation record into donation history table
    $sql = "INSERT INTO goodpayments (username, product_name, quantity, amount, method)
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssids", $username, $product, $quantity, $total_amount, $payment_method);
    $stmt->execute();
    $stmt->close();
    
    // Redirect to payment gateway with parameters
    $user_id = ""; // Define user_id variable
    header("Location: payment_gateway.php?user_id=$user_id&total_amount=$total_amount");
    exit();
}
