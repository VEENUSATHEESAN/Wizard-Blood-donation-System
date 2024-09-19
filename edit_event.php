<?php
// Check for admin login
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
}

// Database connection
$conn = new mysqli("localhost", "root", "", "blood_donation");

if (isset($_GET['id'])) {
    $event_id = $_GET['id'];
    $result = $conn->query("SELECT * FROM events WHERE id='$event_id'");
    $event = $result->fetch_assoc();
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $location = $_POST['location'];
    $conn->query("UPDATE events SET name='$name', date='$date', location='$location' WHERE id='$event_id'");
    header('Location: manage_events.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Event</title>
    <link rel="stylesheet" href="edit_event.css">
</head>
<body>
    <h2>Edit Event</h2>
    <form method="POST">
        <label for="name">Event Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $event['name']; ?>" required>
        
        <label for="date">Event Date:</label>
        <input type="date" id="date" name="date" value="<?php echo $event['date']; ?>" required>
        
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" value="<?php echo $event['location']; ?>" required>
        
        <button type="submit" name="submit">Update Event</button>
    </form>
</body>
</html>
