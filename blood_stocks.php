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

// Fetch all blood stocks from the database
$blood_stocks = $conn->query("SELECT * FROM blood_stocks");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Stocks</title>
    <link rel="stylesheet" href="blood_stocks.css">
</head>
<body>
    <div class="dashboard-container">
        <h2>Available Blood Stocks</h2>
        <table class="blood-stocks-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Blood Group</th>
                    <th>Available Units</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $blood_stocks->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['blood_group']); ?></td>
                    <td><?php echo htmlspecialchars($row['available_units']); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
