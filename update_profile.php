<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood_donation";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $contact = htmlspecialchars($_POST['contact']);
    $health_status = htmlspecialchars($_POST['health_status']);

    // Update query
    $sql = "UPDATE donors SET name=?, contact=?, health_status=? WHERE donor_id=?";  // Replace donor_id dynamically

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $name, $contact, $health_status, $donor_id);

    // Check if update is successful
    if ($stmt->execute()) {
        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
