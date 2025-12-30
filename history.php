<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect the user to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Retrieve the logged-in username from the session
$username = $_SESSION['username'];

// Replace with your actual database credentials for payment_gateway
$servername = "localhost";
$db_username = "root";
$db_password = "13@2013july1504";
$dbname = "payment_gateway";

// Create connection
$conn = new mysqli('localhost', 'root', '13@2013july1504', 'payment_gateway');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user's transaction history
$sql = "SELECT * FROM payments WHERE username = '$username'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Transaction History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: auto;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #e97451;
            color: white;
        }
        #container {
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>

<div id="container">
    <h2>Transaction History</h2>
    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Date</th><th>Amount</th><th>Currency</th><th>Payment Method</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["created_at"] . "</td>";
            echo "<td>" . $row["amount"] . "</td>";
            echo "<td>" . $row["currency"] . "</td>";
            echo "<td>" . $row["payment_method"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No transactions found.";
    }
    $conn->close();
    ?>
</div>

</body>
</html>

