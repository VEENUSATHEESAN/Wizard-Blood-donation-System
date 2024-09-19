<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['donor_id'])) {
    header("Location: login.html");
    exit();
}

// Database connection
$conn = new mysqli("localhost", "root", "", "blood_donation");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch blood banks from the database
$blood_banks = $conn->query("SELECT * FROM blood_banks");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Banks</title>
    <link rel="stylesheet" href="user_blood_banks.css">
</head>
<body>
    <div class="dashboard-container">
        <h2>Available Blood Banks</h2>
        <table class="blood-banks-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Contact Number</th>
                    <th>Available Blood Groups</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $blood_banks->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['location']); ?></td>
                    <td><?php echo htmlspecialchars($row['contact_number']); ?></td>
                    <td><?php echo htmlspecialchars($row['available_blood_groups']); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
