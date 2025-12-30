<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") 

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "13@2013july1504";
    $database = "edprofile";

    // Create connection
    $conn = new mysqli('localhost', 'root', '13@2013july1504', 'edprofile');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
// Retrieve form data
$username = $_POST['username'];
$contact = $_POST['contact'];
$contactType = $_POST['contactType'];

// Process form data (for demonstration, just echoing back the data)
echo "Username: $username, Contact: $contact, Contact Type: $contactType";

// Handle profile picture upload
if ($_FILES['profilePic']['error'] === UPLOAD_ERR_OK) {
    $tmp_name = $_FILES["profilePic"]["tmp_name"];
    $name = basename($_FILES["profilePic"]["name"]);
    move_uploaded_file($tmp_name, "uploads/$name"); // Save uploaded file to a directory
    echo "Profile picture uploaded successfully.";
} else {
    echo "Error uploading profile picture.";
}

// Retrieve and process other form data (username, contact, etc.) as needed

