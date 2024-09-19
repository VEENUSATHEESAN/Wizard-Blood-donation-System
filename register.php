<?php
session_start();

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood_donation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $age = intval($_POST['age']);
    $blood_group = htmlspecialchars(trim($_POST['blood_group']));
    $contact = htmlspecialchars(trim($_POST['contact']));
    $health_status = htmlspecialchars(trim($_POST['health_status']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $confirm_password = htmlspecialchars(trim($_POST['confirm_password']));

    // Check if password and confirm password match
    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the donor into the database
    $stmt = $conn->prepare("INSERT INTO donors1 (name, age, blood_group, contact, health_status, email, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sisssss", $name, $age, $blood_group, $contact, $health_status, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "Donor registration successful!";
        header("Location: login.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
