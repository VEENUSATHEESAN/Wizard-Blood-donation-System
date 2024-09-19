<?php
// Check for admin login
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
}

// Database connection
$conn = new mysqli("localhost", "root", "", "blood_donation");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $blood_group = $_POST['blood_group'];
    $available_units = $_POST['available_units'];

    // Insert new blood stock into the database
    $stmt = $conn->prepare("INSERT INTO blood_stocks (blood_group, available_units) VALUES (?, ?)");
    $stmt->bind_param("si", $blood_group, $available_units);
    $stmt->execute();
    $stmt->close();

    header('Location: manage_blood_stocks.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Blood Stock</title>
    <link rel="stylesheet" href="add_blood_stock.css">
</head>
<body>
    <h2>Add Blood Stock</h2>
    <form method="POST">
        <label for="blood_group">Blood Group:</label>
        <input type="text" name="blood_group" id="blood_group" required>
        <br>
        <label for="available_units">Available Units:</label>
        <input type="number" name="available_units" id="available_units" required>
        <br>
        <button type="submit">Add Blood Stock</button>
    </form>
    <a href="manage_blood_stocks.php">Back to Manage Blood Stocks</a>
</body>
</html>
