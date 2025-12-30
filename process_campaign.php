<?php

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $cause = $_POST["cause"];
    $proofs = $_POST["proofs"];
    $backers = $_POST["backers"];
    $moneyTarget = $_POST["moneyTarget"];

    // Handle uploaded image file
    $imageFileName = $_FILES["image"]["name"];
    $imageTmpName = $_FILES["image"]["tmp_name"];
    $imageFileType = strtolower(pathinfo($imageFileName, PATHINFO_EXTENSION));

    // Handle uploaded document file
    $documentFileName = $_FILES["document"]["name"];
    $documentTmpName = $_FILES["document"]["tmp_name"];
    $documentFileType = strtolower(pathinfo($documentFileName, PATHINFO_EXTENSION));

    // Check if all required fields are filled
    if (empty($cause) || empty($proofs) || empty($backers) || empty($moneyTarget)) {
        // Handle missing fields
        echo "Please fill in all required fields.";
    } else {
        // Process the form data further (e.g., save to database, send email, etc.)
        // For demonstration purposes, let's just display the form data
        echo "Cause: " . $cause . "<br>";
        echo "Proofs: " . $proofs . "<br>";
        echo "Backers: " . $backers . "<br>";
        echo "Money Target: " . $moneyTarget . "<br>";

        // Move uploaded files to desired directory (e.g., upload/ folder)
        move_uploaded_file($imageTmpName, "upload/" . $imageFileName);
        move_uploaded_file($documentTmpName, "upload/" . $documentFileName);

        echo "Image uploaded: " . $imageFileName . "<br>";
        echo "Document uploaded: " . $documentFileName . "<br>";
    }
} else {
    // Redirect to the form page if accessed directly
    header("Location: reqcamp.html");
    exit();
}
