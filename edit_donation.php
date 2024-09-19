<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit();
}

// Database connection
$conn = new mysqli("localhost", "root", "", "blood_donation");

// Fetch the donation to edit
if (isset($_GET['id'])) {
    $donation_id = $_GET['id'];
    $donation = $conn->query("SELECT * FROM donations WHERE id='$donation_id'")->fetch_assoc();
}

// Handle form submission for updating
if (isset($_POST['edit_donation'])) {
    $donor_name = $_POST['donor_name'];
    $blood_group = $_POST['blood_group'];
    $donation_date = $_POST['donation_date'];

    $conn->query("UPDATE donations SET donor_name='$donor_name', blood_group='$blood_group', donation_date='$donation_date' WHERE id='$donation_id'");

    header('Location: manage_donations.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Donation</title>
    <link rel="stylesheet" href="edit_donation.css">
</head>
<body>
    <div class="container">
        <h2>Edit Donation</h2>
        <form method="POST" action="">
            <label for="donor_name">Donor Name:</label>
            <input type="text" name="donor_name" value="<?php echo $donation['donor_name']; ?>" required><br>

            <label for="blood_group">Blood Group:</label>
            <input type="text" name="blood_group" value="<?php echo $donation['blood_group']; ?>" required><br>

            <label for="donation_date">Donation Date:</label>
            <input type="date" name="donation_date" value="<?php echo $donation['donation_date']; ?>" required><br>

            <button type="submit" name="edit_donation" class="btn-edit">Update Donation</button>
        </form>
    </div>
</body>
</html>
