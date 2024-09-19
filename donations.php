<?php
session_start();

// Check if the donor is logged in
if (!isset($_SESSION['donor_id'])) {
    header("Location: login.html");
    exit();
}

// Database connection
$conn = new mysqli("localhost", "root", "", "blood_donation");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch donations for the logged-in donor from the database
$donor_id = $_SESSION['donor_id'];
$donations = $conn->query("SELECT * FROM donations");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Donations</title>
    <link rel="stylesheet" href="donations.css">
</head>
<body>
    <div class="dashboard-container">
        <h2>My Donation History</h2>
        <table class="donations-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Donor Name</th>
                    <th>Blood Group</th>
                    <th>Donation Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $donations->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['donor_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['blood_group']); ?></td>
                    <td><?php echo htmlspecialchars($row['donation_date']); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
