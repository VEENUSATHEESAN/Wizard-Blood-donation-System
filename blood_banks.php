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

// Get filter criteria from query params
$location = isset($_GET['location']) ? $_GET['location'] : '';
$blood_group = isset($_GET['blood_group']) ? $_GET['blood_group'] : '';

// Prepare the query with filters
$sql = "SELECT * FROM blood_banks WHERE 1=1";

if (!empty($location)) {
    $sql .= " AND location LIKE '%" . $conn->real_escape_string($location) . "%'";
}
if (!empty($blood_group)) {
    $sql .= " AND available_blood_groups LIKE '%" . $conn->real_escape_string($blood_group) . "%'";
}

$result = $conn->query($sql);

// Fetch data and display
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='blood-bank'>";
        echo "<h3>" . $row['name'] . "</h3>";
        echo "<p>Location: " . $row['location'] . "</p>";
        echo "<p>Available Blood Groups: " . $row['available_blood_groups'] . "</p>";
        echo "<p>Contact: " . $row['contact_number'] . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>No blood banks found matching the criteria.</p>";
}

$conn->close();
?>
