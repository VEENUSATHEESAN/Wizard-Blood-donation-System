<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit();
}

// Handle form submission
if (isset($_POST['add_donation'])) {
    $donor_name = $_POST['donor_name'];
    $blood_group = $_POST['blood_group'];
    $donation_date = $_POST['donation_date'];

    $conn = new mysqli("localhost", "root", "", "blood_donation");

    $conn->query("INSERT INTO donations (donor_name, blood_group, donation_date) 
                  VALUES ('$donor_name', '$blood_group', '$donation_date')");

    header('Location: manage_donations.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Donation</title>
    <link rel="stylesheet" href="add_donation.css">
</head>
<body>
    <div class="container">
        <h2>Add New Donation</h2>
        <form method="POST" action="">
            <label for="donor_name">Donor Name:</label>
            <input type="text" name="donor_name" required><br>

            <label for="blood_group">Blood Group:</label>
            <input type="text" name="blood_group" required><br>

            <label for="donation_date">Donation Date:</label>
            <input type="date" name="donation_date" required><br>

            <button type="submit" name="add_donation" class="btn-add">Add Donation</button>
        </form>
    </div>
</body>
</html>
