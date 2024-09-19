<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin_dashboard.css">
</head>
<body>
    <h2>Welcome, Admin</h2>
    <nav>
        <ul>
            <li><a href="manage_donors.php">Manage Donors</a></li>
            <li><a href="manage_donations.php">Manage Donations</a></li>
            <li><a href="manage_blood_stocks.php">Manage Blood Stocks</a></li>
            <li><a href="manage_events.php">Manage Events</a></li>
            <li><a href="manage_blood_banks.php">Manage Blood Banks</a></li> <!-- Added Blood Bank Management -->
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</body>
</html>
