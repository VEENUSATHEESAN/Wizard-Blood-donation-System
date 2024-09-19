<?php
// Check for admin login
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
}

// Database connection
$conn = new mysqli("localhost", "root", "", "blood_donation");

// Fetch events from the database
$events = $conn->query("SELECT * FROM events");

if (isset($_POST['delete'])) {
    $event_id = $_POST['event_id'];
    $conn->query("DELETE FROM events WHERE id='$event_id'");
    header('Location: manage_events.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Events</title>
    <link rel="stylesheet" href="manage_events.css">
</head>
<body>
    <h2>Manage Events</h2>
    <a href="add_event.php">Add Event</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Event Name</th>
            <th>Date</th>
            <th>Location</th>
            <th>Actions</th>
        </tr>
        <?php while($row = $events->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['location']; ?></td>
            <td>
                <a href="edit_event.php?id=<?php echo $row['id']; ?>" class="edit-link">Edit</a>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="event_id" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="delete">Delete</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
