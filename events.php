<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood_donation";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch upcoming events
$sql = "SELECT * FROM blood_donation_events WHERE event_date >= CURDATE() ORDER BY event_date ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='event'>";
        echo "<h3>" . $row['event_name'] . "</h3>";
        echo "<p>Location: " . $row['event_location'] . "</p>";
        echo "<p>Date: " . $row['event_date'] . "</p>";
        echo "<p>Contact: " . $row['contact'] . "</p>";
        echo "<p>Email: " . $row['email'] . "</p>";
        echo "<button onclick='showRegistrationForm(" . $row['id'] . ")'>Register/Volunteer</button>";
        echo "</div>";
    }
} else {
    echo "No upcoming events found.";
}

$conn->close();
?>
