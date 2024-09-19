<?php
// Check for admin login
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
}

// Database connection
$conn = new mysqli("localhost", "root", "", "blood_donation");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $location = $_POST['location'];
    $conn->query("INSERT INTO events (name, date, location) VALUES ('$name', '$date', '$location')");
    header('Location: manage_events.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Event</title>
    <link rel="stylesheet" href="add_event.css">
</head>
<body>
    <h2>Add Event</h2>
    <form method="POST">
        <label for="name">Event Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="date">Event Date:</label>
        <input type="date" id="date" name="date" required>
        
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>
        
        <button type="submit" name="submit">Add Event</button>
    </form>
</body>
</html>
